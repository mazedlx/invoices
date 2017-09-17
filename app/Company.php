<?php

namespace App;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
