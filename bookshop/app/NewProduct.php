<?php

namespace App;
use App\Publisher;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class NewProduct extends Model
{
    protected $table ='books';
    public $primarykey = 'id';
    public $timestamps = false;
    public function getName(){
        $name = Publisher::find($this->publisher_id);
        return $name;
    }
   public function getCate(){
       $cate = Category::find($this->cate_id);
       return $cate->cate_name;
   }

}
