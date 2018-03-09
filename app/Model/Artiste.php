<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artiste extends Model
{
	use Sluggable;

    protected $fillable = [
    	'artiste_name', 'biography',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'artiste_name'
            ]
        ];
    }
    public function approve()
    {
    	return $this->hasMany('App\Model\Approve');
    }
}
