<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $table = 'tracks';

    protected $fillable = [
        'user_id','title','genre','permalink','publisher_permalink','license','artwork_url','stream_url','duration',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
