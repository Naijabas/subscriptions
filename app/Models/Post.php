<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Post
 * @package App\Models
 * @version November 10, 2021, 9:49 pm UTC
 *
 * @property \App\Models\Website $website
 * @property integer $website_id
 * @property string $title
 * @property string $description
 */
class Post extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'posts';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'website_id',
        'title',
        'description',
        'notified'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'website_id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'website_id' => 'required',
        'title' => 'required',
        'description' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function website()
    {
        return $this->belongsTo(\App\Models\Website::class, 'website_id', 'id');
    }
}
