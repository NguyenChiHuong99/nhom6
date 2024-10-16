<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $primaryKey='id';
    public function scopeDanhmuc($query){
        return $query->get();
    }
    
}
