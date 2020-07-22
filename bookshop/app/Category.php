<?php

namespace App;
use App\NewProduct;
use App\Slide;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table ='category';
   public $timestamps = FALSE;
   public $fillable =['id','cate_name','status'];
}
