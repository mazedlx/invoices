<?php

namespace App;

use App\Company;
use App\Customer;
use App\Line;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    protected $casts = [
        'paid' => 'boolean',
    ];

    protected $dates = [
        'date',
    ];

    protected $with = [
        'lines',
    ];

    public function getRecipientAttribute()
    {
        return implode('<br>', [
            $this->company,
            $this->customer,
            $this->zip . ' ' . $this->city,
            $this->address,
        ]);
    }

    public function getAmountInEurosAttribute()
    {
        return number_format($this->lines->reduce(function ($amount, $line) {
            return $amount + $line->amount / 10000;
        }), 2, ',', '.');
    }

    public function getAmountAttribute()
    {
        return $this->lines->reduce(function ($amount, $line) {
            return $amount + $line->amount / 10000;
        });
    }

    public function getDateFormattedAttribute()
    {
        return $this->date->format('d.m.Y');
    }

    public static function generateNumber($date)
    {
        $date = Carbon::createFromFormat(strlen($date) == 10 ? 'Y-m-d' : 'Y-m-d H:i:s', $date);

        return $date->year . '-' . str_pad(Invoice::whereBetween('date', [
            $date->startOfYear()->format('Y-m-d H:i:s'),
            $date->endOfYear()->format('Y-m-d H:i:s')
        ])->count() + 1, 2, '0', STR_PAD_LEFT);
    }

    public function lines()
    {
        return $this->hasMany(Line::class);
    }

    public static function totalsByYear()
    {
        return Invoice::latest()->get()->mapWithKeys(function ($invoice) {
            return [$invoice->date->format('Y-m-d') => $invoice->amount];
        })->groupBy(function ($invoice, $key) {
            return substr($key, 0, 4);
        })->mapWithKeys(function ($year, $key) {
            return [
                $key => $year->reduce(function ($carry, $item) {
                    return $carry + $item;
                })
            ];
        })->toArray();
    }
}
