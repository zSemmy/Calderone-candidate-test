<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $fillable = 
    [
        'customer_id',
        'title',
        'description',
        'cost',
        'tag_id',
    ];

    protected $hidden =
    [
        'customer_id',
        'tag_id',
    ];

    public function customer()
    {
        return $this->withTrashed()->belongsTo(Customer::class);
    }
}
