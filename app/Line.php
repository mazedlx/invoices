<?php

namespace App;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $guarded = [];

    public function getAmountAttribute()
    {
        return $this->time * $this->rate;
    }

    public function getRateInEurosAttribute()
    {
        return number_format($this->rate / 100, 2, ',', '.');
    }

    public function getAmountInEurosAttribute()
    {
        return number_format($this->amount / 10000, 2, ',', '.');
    }

    public function getTimeInHoursAttribute()
    {
        return number_format($this->time / 100, 2, ',', '.');
    }

    public function invoice()
    {
        $this->belongsTo(Invoice::class);
    }
}
