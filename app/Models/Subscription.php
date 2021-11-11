<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Subscription
 * @package App\Models
 * @version November 10, 2021, 10:11 pm UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\Website $website
 * @property integer $user_id
 * @property integer $website_id
 */
class Subscription extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'subscriptions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'website_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'website_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'website_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function website()
    {
        return $this->belongsTo(\App\Models\Website::class, 'website_id', 'id');
    }
}
