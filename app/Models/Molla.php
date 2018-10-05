<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * App\Models\Molla
 *
 * @property int $id
 * @property string $fullname
 * @property string $email
 * @property string $password
 * @property string|null $phone
 * @property string|null $phone1
 * @property string|null $avatar
 * @property string|null $about
 * @property string $gender
 * @property string|null $birth_date
 * @property int|null $belief_id
 * @property int|null $verified
 * @property int|null $experience
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Belief|null $belief
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $services
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereBeliefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla wherePhone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Molla whereVerified($value)
 * @mixin \Eloquent
 */
class Molla extends Authenticatable
{

    use CrudTrait;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'mollas';

    protected $fillable = [
        'full_name','email', 'phone' , 'password', 'extra_phone', 'avatar', 'about',
        'gender', 'birth_date', 'belief_id', 'verified', 'experience'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


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
        return $this->belongsToMany(Service::class, 'molla_service');
    }

    public function belief() {
        return $this->belongsTo(Belief::class);
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
