<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'ord_id';

    protected $fillable = [
       'user_id',
       'ord_status',
       'ship_name',
       'ship_no',
       'ship_address'
   ];
}
