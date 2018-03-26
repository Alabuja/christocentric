<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Model\Approve;

class Artiste extends Model
{
	use Sluggable;
    //use SearchableTrait;

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
