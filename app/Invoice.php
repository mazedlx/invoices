<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'company_id' => 'integer',
        'customer_id' => 'integer',
        'date' => 'datetime:Y-m-d',
        'paid' => 'boolean',
    ];

    protected $with = [
        'company',
        'customer',
        'lines',
    ];

    public static function generateNumber($date)
    {
        $date = Carbon::createFromFormat(10 === mb_strlen($date) ? 'Y-m-d' : 'Y-m-d H:i:s', $date);

        return $date->year . '-' . str_pad(self::whereBetween('date', [
            $date->startOfYear()->format('Y-m-d H:i:s'),
            $date->endOfYear()->format('Y-m-d H:i:s'),
        ])->count() + 1, 2, '0', \STR_PAD_LEFT);
    }

    public static function totalsByYear()
    {
        return self::orderBy('date', 'desc')->get()->mapWithKeys(function ($invoice) {
            return [$invoice->date->format('Y-m-d') => $invoice->amount];
        })->groupBy(function ($invoice, $key) {
            return mb_substr($key, 0, 4);
        })->mapWithKeys(function ($year, $key) {
            return [
                $key => $year->reduce(function ($carry, $item) {
                    return $carry + ($item * 100);
                }),
            ];
        })->toArray();
    }

    public static function rankedCustomers()
    {
        return Customer::all()->sortByDesc(function ($customer) {
            return $customer->total;
        });
    }

    public static function rankedCompanies()
    {
        return Company::all()->sortByDesc(function ($company) {
            return $company->total;
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function lines()
    {
        return $this->hasMany(Line::class);
    }

    public function scopeUnpaid($query)
    {
        return $query->where('paid', '=', 0);
    }

    public function getRecipientAttribute()
    {
        return implode('<br>', [
            optional($this->company)->name,
            optional($this->customer)->name,
            $this->address,
            $this->zip . ' ' . $this->city,
        ]);
    }

    public function getAmountInEurosAttribute()
    {
        return number_format($this->lines->reduce(function ($amount, $line) {
            return $amount + $line->amount;
        }), 2, ',', '.');
    }

    public function getAmountAttribute()
    {
        return $this->lines->reduce(function ($amount, $line) {
            return $amount + $line->amount / 100;
        });
    }

    public function getDateFormattedAttribute()
    {
        return $this->date->format('d.m.Y');
    }
}
