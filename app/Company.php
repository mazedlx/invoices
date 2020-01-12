<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function getTotalAttribute()
    {
        return self::invoices()
            ->get()
            ->reduce(function ($carry, $invoice) {
                return $carry + $invoice->amount;
            });
    }
}
