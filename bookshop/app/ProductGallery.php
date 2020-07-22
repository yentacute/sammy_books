<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NewProduct;
class ProductGallery extends Model
{
    protected $table='image';
    public $timestamps = true;
    public function getName()
    {
        $book = NewProduct::all();
        return $book->title;
        dd($book->title);die;
    }
}
