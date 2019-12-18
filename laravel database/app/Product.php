<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
       'product_name',
       'product_details',
       'product_price',
       'product_qty',
       'subcat_id',
       'product_image'
   ];
}
