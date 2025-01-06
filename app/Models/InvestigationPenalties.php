<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestigationPenalties extends Model
{
    use HasFactory;


    // Specificarea tabelei asociate (opțional, doar dacă numele diferă de cel implicit)
    protected $table = 'investigation_penalties';

    // Câmpurile care pot fi completate în mod masiv
    protected $fillable = ['investigation_id', 'penalty_id'];

    // Relația cu modelul Investigation
    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }

    // Relația cu modelul Penalty
    public function penalty()
    {
        return $this->belongsTo(Penalty::class);
    }
    
}
