<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPicture()
    {
        if (isset($this->name) && strstr($this->name, 'https')) {
            return $this->name;
        } else {
            return '/storage/'.$this->name;
        }
    }
}
