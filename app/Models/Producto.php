<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'precio_provee', 'precio_suge', 'stock', 'proveedor_id'];
}
