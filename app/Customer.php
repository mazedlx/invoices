<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

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
                return $carry + ($invoice->amount * 100);
            });
    }
}
