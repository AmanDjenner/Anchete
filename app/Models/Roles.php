<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

     // Specificarea tabelei asociate (opțional, doar dacă numele tabelei diferă de cel implicit)
     protected $table = 'roles';

     // Câmpurile care pot fi completate în mod masiv
     protected $fillable = ['name'];

     // Definează relația cu relația de rol-permisiune
    //  public function rolePermissions()
    //  {
    //      return $this->hasMany('App\Models\RolePermission', 'role_id');
    //  }
    public function permissions()
{
    return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
}

}
