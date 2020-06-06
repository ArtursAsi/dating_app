<?php

namespace App;

use App\Mail\YouHaveAMatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Interest extends Model
{
    protected $fillable = ['interest_to', 'interest_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
