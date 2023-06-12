<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre_c
 * @property $apellido
 * @property $direccion
 * @property $correo
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{

    static $rules = [
		'nombre_c' => 'required',
		'apellido' => 'required',
		'direccion' => 'required',
		'correo' => 'required',
		'telefono' => 'required',
        'nit' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_c','apellido','direccion','correo','telefono','nit'];



}
