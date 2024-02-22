<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function getTotalAttribute()
    {
        return $this->invoices()
            ->get()
            ->reduce(function ($carry, $invoice) {
                return $carry + ($invoice->amount * 100);
            });
    }

    public function getTotalInEurosAttribute()
    {
        return number_format($this->getTotalAttribute(), 2, ',', '.');
    }
}
