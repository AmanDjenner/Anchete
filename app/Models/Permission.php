<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
 // Specificarea tabelei asociate (opțional, doar dacă numele tabelei diferă de cel implicit)
 protected $table = 'permissions';

 // Câmpurile care pot fi completate în mod masiv
 protected $fillable = ['name'];

}
