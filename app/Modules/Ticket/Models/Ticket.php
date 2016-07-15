<?php

namespace App\Modules\Ticket\Models;

use Illuminate\Database\Eloquent\Model;

use App\Modules\Ticket\Models\Importance;



// Generalmente cada vez que creamos una clase tenemos que indicar el espacio de nombres
// dónde la estamos creando y suele coincidir con el nombre del directorio.
// El nombre del namespace debe comenzar por UNA LETRA MAYÚSCULA.

// Para más información ver contenido clase Model.php (CTRL + P en Sublime) de Eloquent para ver los atributos disponibles.
// Documentación completa de Eloquent ORM en: http://laravel.com/docs/5.0/eloquent

class Ticket extends Model
{
    // Nombre de la tabla.
    protected $table="tickets";

    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = array('name','text','description', 'importance_id', 'type_id', 'section_id');

    // Aquí ponemos los campos que no queremos que se devuelvan en las consultas.

     protected $hidden = ['created_at','updated_at'];

    // Definimos a continuación la relación de esta tabla con otras.
    // Ejemplos de relaciones:
    // 1 usuario tiene 1 teléfono         ->hasOne() Relación 1:1
    // 1 teléfono pertenece a 1 usuario   ->belongsTo() Relación 1:1 inversa a hasOne()
    // 1 post tiene muchos comentarios    ->hasMany() Relación 1:N
    // 1 comentario pertenece a 1 post    ->belongsTo() Relación 1:N inversa a hasMany()
    // 1 usuario puede tener muchos roles ->belongsToMany()
    //


    public function user()

    {
        return $this->belongsTo('App\Modules\Ticket\Models\Type');
    }


    public function importance()
    {
        return $this->belongsTo(Importance::class);
    }





}
