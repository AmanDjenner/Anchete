<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    use HasFactory;

    protected $fillable = ['investigation_id', 'user_id'];

    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }

    // Relația cu modelul User
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
