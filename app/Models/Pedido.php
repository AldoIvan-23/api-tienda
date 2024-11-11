<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'total', 'fecha_pedido'];

    //un pedido pertenece a un usuario
    public function usuario(){
        return $this->belongTo(Usuario::class);
    }

    //Un pedido puede tener muchos productos (relacion muchos a muchos)
    public function productos(){
        return $this->belongsToMany(Producto::class, 'detalle_pedido')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}

