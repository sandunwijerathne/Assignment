<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $object_id
 * @property integer $term_taxonomy_id
 * @property integer $term_order
 */
class Termrelation extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'wp_term_relationships';

    /**
     * @var array
     */
    protected $fillable = ['term_order'];
}
