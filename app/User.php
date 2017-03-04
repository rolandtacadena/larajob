<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name',
        'company_tagline',
        'company_web_url',
        'company_logo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user has many jobs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Create Job based on form data.
     *
     * @param $body
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createJobFromForm($body)
    {
        return $this->jobs()->create([
            'type_id'       => $body['type'],
            'title'         => $body['title'],
            'description'   => $body['description'],
            'how_to_apply'  => $body['how_to_apply'],
            'location'      => $body['location']
        ]);
    }
}
