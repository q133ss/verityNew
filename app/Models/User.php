<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'patronymic',
        'email',
        'password',
        'city',
        'socials',
        'photo',
        'note'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getSocials()
    {
        return json_decode($this->socials, true);
    }

    public function getSocial($value)
    {
        $socials = $this->getSocials();
        return $socials[$value] ?? null;
    }

    /**
     * @return string
     */
    public function getFio() : string
    {
        return $this->lastname.' '.$this->name.' '.$this->patronymic;
    }

    public function scopeWithSearchFio($query, $request)
    {
        return $query->where('name', 'LIKE', '%'.$request.'%')
            ->orWhere('lastname', 'LIKE', '%'.$request.'%')
            ->orWhere('patronymic', 'LIKE', '%'.$request.'%');
    }

    public function scopeWithSearchCity($query, $city)
    {
        return $query->where('city', 'LIKE', '%'.$city.'%');
    }

    public function getContributors()
    {
        return $this->hasMany(Contributor::class, 'recommender_id', 'id')
            ->orderBy('created_at','DESC');
    }

    public function addStat($field)
    {
        if($this->stat != null){
            $this->stat->add($field);
        }else{
            UserStat::create([
                'user_id' => $this->id,
                $field => 1
            ]);
        }
    }

    public function getStat($field)
    {
        return $this->hasOne(UserStat::class, 'user_id', 'id')->pluck($field)->first();
    }
}
