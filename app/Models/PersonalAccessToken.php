<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory;

    protected $table = 'personal_access_tokens';

    // Câmpurile care pot fi completate în mod masiv
    protected $fillable = ['name', 'token', 'abilities', 'last_used_at', 'expires_at'];

    // Definează relația polimorfă
    public function tokenable()
    {
        return $this->morphTo();
    }

}
