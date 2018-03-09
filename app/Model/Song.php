<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Song extends Model
{
    protected $fillable = [
    	'user_id', 'song_title','artiste_name', 'lyrics', 'download_link',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
