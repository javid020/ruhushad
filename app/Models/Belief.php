<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Belief
 *
 * @property int $id
 * @property string $name
 * @property string|null $info
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Molla[] $mollas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Belief whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Belief whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Belief whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Belief whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Belief whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Belief whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Belief extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = ['name', 'info'];


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

    public function mollas() {
        return $this->hasMany(Molla::class);
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
