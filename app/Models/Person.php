<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 *
 * @property $id
 * @property $type_doc
 * @property $number_doc
 * @property $lastnames
 * @property $names
 * @property $birthdate
 * @property $email
 * @property $phone
 * @property $country
 * @property $created_at
 * @property $updated_at
 *
 * @property Country $country
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Person extends Model
{
    
    static $rules = [
		'type_doc' => 'required',
		'number_doc' => 'required',
		'lastnames' => 'required',
		'names' => 'required',
		'birthdate' => 'required',
		'phone' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type_doc','number_doc','lastnames','names','birthdate','email','phone','country'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id', 'country');
    }
    

}
