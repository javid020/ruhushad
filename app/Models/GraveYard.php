<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GraveYard
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property string|null $about
 * @property string|null $belediyye
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GraveYard whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GraveYard whereBelediyye($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GraveYard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GraveYard whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GraveYard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GraveYard whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GraveYard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GraveYard whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GraveYard extends Model
{

    use CrudTrait;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = ['name', 'location', 'about', 'belediyye'];


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
