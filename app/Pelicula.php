<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pelicula extends Model
{
    protected $table = 'peliculas';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descripcion','fecha','cat_id','imagen','posicion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'trailer','updated_at',
    ];

    /**
    * Get the category associated with the film.
    */
    public function cat()
    {
        return $this->belongsTo(Categoria::class);
    }


    /**
    * Get the comments associated with the film.
    */
    public function comentarios()
    {
        return $this->hasMany(Comentario::class,'id_pelicula');
    }

}
