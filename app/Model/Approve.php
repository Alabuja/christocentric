<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Artiste;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;

class Approve extends Model
{
	use Sluggable;
    use Searchable;
    
    protected $fillable = [
    	'artiste_id', 'song_name', 'download_link', 'lyrics', 'song_image', 'file_url'
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
                'source' => 'song_name'
            ]
        ];
    }

    public function artiste()
    {
    	return $this->belongsTo('App\Model\Artiste', 'artiste_id');
    }
}
