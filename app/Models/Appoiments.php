<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoiments extends Model
{
    use HasFactory;


    public function lawyer()
    {
        return $this->belongsToMany(Role::class, 'appoiments', 'user_id_cliente', 'user_id_abogado');
    }

    public function client()
    {
        return $this->belongsToMany(Role::class, 'appoiments', 'user_id_abogado', 'user_id_cliente');
    }

}



/*

Tendrás que declarar explícitamente las llaves foráneas de la tabla pivot.

Cambié el nombre de la relación por uno más descriptivo, así es más fácil de leer para tí y otros programadores.

public function seguidos()
{
    return $this->belongsToMany(User::class, 'user_user', 'user_id', 'user_id_seguido');
}
Y para declarar la relación inversa:

public function seguidores()
{
    return $this->belongsToMany(User::class, 'user_user', 'user_id_seguido', 'user_id');
}
Luego podrás relacionar los usuarios:

$usuario_seguido->seguidores()->attach($usuarioId);
Y obtener los resultados:

$seguidores = $user->seguidores;

$seguidos = $user->seguidos;
*/