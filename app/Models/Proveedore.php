<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $marcas_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Marca $marca
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{

    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'marcas_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','marcas_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_id');
        return $this->hasOne('App\Models\Marca', 'id', 'marcas_id');
    }


}
