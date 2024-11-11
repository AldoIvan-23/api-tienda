<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria_id'];

    public function categoria(){
        return $this->belongTo(Categoria::class);
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class, 'detalle_pedido')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}   
