<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

 // Specificarea tabelei asociate (opțional, doar dacă numele tabelei diferă de cel implicit)
 protected $table = 'user_permissions';

 // Relațiile cu alte tabele
 public function user()
 {
     return $this->belongsTo('App\Models\User', 'user_id');
 }

 public function permission()
 {
     return $this->belongsTo('App\Models\Permission', 'permission_id');
 }

 public function role()
 {
     return $this->belongsTo('App\Models\Role', 'role_id');
 }

}
