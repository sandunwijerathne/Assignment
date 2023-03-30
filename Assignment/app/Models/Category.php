<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $term_id
 * @property string $name
 * @property string $slug
 * @property integer $term_group
 */
class Category extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'wp_terms';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'term_id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'term_group'];
}
