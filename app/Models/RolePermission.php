<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

 // Specificarea tabelei asociate (opțional, doar dacă numele tabelei diferă de cel implicit)
 protected $table = 'role_permissions';

 // Definează relația cu rolurile și permisiunile
 public function role()
 {
     return $this->belongsTo('App\Models\Role', 'role_id');
 }

 public function permission()
 {
     return $this->belongsTo('App\Models\Permission', 'permission_id');
 }

}
