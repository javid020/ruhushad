<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceImages
 *
 * @property int $id
 * @property int $service_id
 * @property string $image
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Service $services
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServiceImages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServiceImages whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServiceImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServiceImages whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServiceImages whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ServiceImages whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceImages extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = ['service_id', 'image'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function services() {
        return $this->belongsTo(Service::class);
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
