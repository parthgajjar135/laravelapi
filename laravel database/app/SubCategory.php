<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $primaryKey = 'subcat_id';

    protected $fillable = [
       'subcat_name',
       'cat_id',
       'subcat_active'
   ];
}
