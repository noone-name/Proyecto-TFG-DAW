<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoiments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_solicitante',
        'user_id_solicitado',
        'title_appoiment',
        'start_date',
        'end_date',
        'checkbox_time',
        'description',
        'is_active',
        'status',

    ];


    public function users_appo()
    {
        return $this->belongsTo(User::class,'user_id_solicitado');
    }

    public function users_solicitante()
        {
            return $this->belongsTo(User::class,'user_id_solicitante');
        }

    public function users_solicitado()
        {
            return $this->belongsTo(User::class,'user_id_solicitado');
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
