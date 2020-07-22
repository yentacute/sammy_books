<?php

namespace App;
use App\NewProduct;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table ='slide';
    public $primarykey = 'id';
    public $timestamps = FALSE;
    public $fillable =['id','name','image','id_book','status'];
        public function getBook(){
        $name = NewProduct::find($this->id_book);
        return $name;
    }
}
