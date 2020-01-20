<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comentario extends Model
{
    protected $table = 'comentarios';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario', 'id_pelicula','texto','fecha',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at',
    ];

    /**
    * Get the user associated with the comment.
    */
    public function user()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }

    /**
    * Get the film associated with the comment.
    */
    public function film()
    {
        return $this->belongsTo(Pelicula::class,'id_pelicula');
    }

}


