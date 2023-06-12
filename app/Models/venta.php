<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $total
 * @property $created_at
 * @property $updated_at
 * @property $cliente_id
 *
 * @property Cliente $cliente
 * @property VentasProduct[] $ventasProducts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class, 'ventas_products')->withPivot('cantidad');


    }

    static $rules = [
        'cliente_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['total','cliente_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventasProducts()
    {
        return $this->hasMany('App\Models\VentasProduct', 'venta_id', 'id');
    }


}

