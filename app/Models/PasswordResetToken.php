<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    // Specificarea tabelei asociate (opțional, doar dacă numele tabelei diferă de cel implicit)
    protected $table = 'password_reset_tokens';

    // Câmpurile care pot fi completate în mod masiv
    protected $fillable = ['email', 'token', 'created_at'];
}
