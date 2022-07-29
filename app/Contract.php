<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contract extends Model
{

    use SoftDeletes;

    protected $fillable =
    [
        'customer_id',
        'order_id',
    ];

    protected $hidden =
    [
        'customer_id',
        'order_id',
    ];

    public function customer()
    {
        return $this->withTrashed()->belongsTo(Customer::class);
    }

    public function order()
    {
        return $this->withTrashed()->belongsTo(Order::class);
    }
}
