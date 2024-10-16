<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsModel;
class Cart extends Model
{
    use HasFactory;
    // protected $table='carts';
    protected $fillable = ['user_id', 'product_id', 'quantity'];
    // Mối quan hệ giữa Cart và User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mối quan hệ giữa Cart và Product
    public function product()
    {
        return $this->belongsTo(ProductsModel::class);
    }
}
