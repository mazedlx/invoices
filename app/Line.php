<?php

namespace App;

use App\Casts\Hundred;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Line extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'time' => Hundred::class,
        'rate' => Hundred::class,
    ];

    public static function transpose(Request $request)
    {
        return collect($request->only([
            'tasks',
            'rates',
            'times',
        ]))->transpose()->filter(function ($line) {
            return $line[0] && $line[1] && $line[2];
        })->map(function ($line) {
            return new self([
                'task' => $line[0],
                'rate' => $line[1] * 100,
                'time' => $line[2] * 100,
            ]);
        });
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getAmountAttribute()
    {
        return $this->time * $this->rate;
    }

    public function getRateInEurosAttribute()
    {
        return number_format($this->rate, 2, ',', '.');
    }

    public function getRateAsFloatAttribute()
    {
        return number_format($this->rate, 2);
    }

    public function getAmountInEurosAttribute()
    {
        return number_format($this->amount, 2, ',', '.');
    }

    public function getTimeInHoursAttribute()
    {
        return number_format($this->time, 2, ',', '.');
    }

    public function getTimeAsFloatAttribute()
    {
        return number_format($this->time, 2);
    }
}
