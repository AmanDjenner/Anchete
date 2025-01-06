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
        'email',
        'password',
        'institution_id',
        'division_id',
        'role_id',
        "permission_id"
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
        'password' => 'hashed',
    ];


    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

 // Relațiile cu alte tabele
//  public function institution()
//  {
//      return $this->belongsTo('App\Models\Institution');
//  }

//  public function division()
//  {
//      return $this->belongsTo('App\Models\Division');
//  }

//  public function role()
//  {
//      return $this->belongsTo('App\Models\Roles');
//  }

//  public function permissions()
//  {
//      return $this->belongsToMany(Permission::class, 'user_permissions');
//  }
//  public function permissions()
//  {
//      return $this->hasOne(Role::class, 'id', 'role_id')->with('permissions');
//  }

 public function permissions()
{
    return $this->hasManyThrough(Permission::class, Roles::class, 'id', 'id', 'role_id', 'id');
}

}
