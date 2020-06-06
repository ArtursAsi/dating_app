<?php

namespace App;

use App\Mail\YouHaveAMatch;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'bio',
        'email',
        'password',
        'gender',
        'location',
        'age',
        'profile_picture',
        'min_age',
        'max_age',
        'looking_for'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function setAgeAttribute($age)
    {
        $this->attributes['age'] = Carbon::now()->parse($age)->age;
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function scopeWithoutAuthUser($query)
    {
        $query->where('id', '!=', auth()->id());
    }

    public function interests()
    {
        return $this->hasMany(Interest::class);
    }

    public function scopeFilterInterests($query)
    {
        $interests = $this->interests()->pluck('interest_to');

        $query->where('id', '!=', $this->id)
            ->whereNotIn('id', $interests->all());
    }

    public function scopeLookingAge($query)
    {
        $min = $this->min_age;
        $max = $this->max_age;
        if (isset($min) && isset($max)) {
            $query->whereBetween('age', [$min, $max]);
        }
    }

    public function scopeLookingGender($query)
    {
        if (isset($this->looking_for)) {
            $query->where('gender', '=', $this->looking_for);
        }
    }


    public function interestsBy()
    {
        return $this->hasMany(Interest::class, 'interest_to', 'id');
    }


    public function scopeMatch($query, $id)
    {

        return $query->whereHas('interests', function ($query) use ($id) {
            $query->where('interest_to', $id)->where('interest_type', 'like');
        })->whereHas('interestsBy', function ($query) use ($id) {
            $query->where('user_id', $id)->where('interest_type', 'like');
        });
    }

    public function dislikeDelete()
    {
        DB::table('interests')->where('interest_to', $this->id)->where('interest_type', 'dislike')->delete();

    }


    public function getPicture()
    {

        if (isset($this->profile_picture) && strstr($this->profile_picture, 'https')) {
            return $this->profile_picture;
        } elseif (isset($this->profile_picture)) {
            return '/storage/' . $this->profile_picture;
        } elseif ($this->gender === 'male') {
            return '/storage/pictures/default_male.jpg';
        } else {
            return '/storage/pictures/default_female.jpeg';
        }


    }

    public function matchWith(User $user)
    {
        return $this->interests()
            ->where('interest_type', 'like')
            ->where('interest_to', $user->id)
            ->exists();
    }

    public function minMaxAge(int $min, int $max)
    {
        if ($min < $max) {
            return true;
        }
    }


}
