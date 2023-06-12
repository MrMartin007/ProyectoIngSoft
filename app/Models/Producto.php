<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $precio
 * @property $cantidad
 * @property $foto
 * @property $marcas_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{

    static $rules = [
		'nombre' => 'required',
		'precio' => 'required',
		'cantidad' => 'required',
        'foto' => 'required',
        'marcas_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','precio','cantidad','foto','marcas_id'];


    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_id');
        return $this->hasOne('App\Models\Marca', 'id', 'marcas_id');
    }


}
