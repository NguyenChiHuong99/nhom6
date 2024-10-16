<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = ['name', 'description', 'price', 'categories_id', 'img','quantity'];
    public function scopeTrendingProducts($query){
        return $query->where('trending','=','1')->limit(8);
    }
    public static function getProductsByCategory($category_id)
    {
        return self::where('categories_id', $category_id);
    }
    public static function searchProductByName($keyword)
    {
        return self::where('name', 'like', '%' . $keyword . '%');
    }
    public static function ViewPr(){
        return self::where('view','>','0');
    }

}
