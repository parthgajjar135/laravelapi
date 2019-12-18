<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'od_id';

    protected $fillable = [
       'ord_id',
       'product_id',
       'product_qty',
       'product_price'
   ];
}
