<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Website
 * @package App\Models
 * @version November 10, 2021, 8:40 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $url
 */
class Website extends Model
{


    public $table = 'websites';




    public $fillable = [
        'name',
        'email',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'url' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     **/
    public function post()
    {
        return $this->hasMany(\App\Models\Post::class, 'website_id');
    }


}
