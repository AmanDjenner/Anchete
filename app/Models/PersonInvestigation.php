<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonInvestigation extends Model
{
    use HasFactory;


 // Specificarea tabelei asociate (opțional, doar dacă numele tabelei diferă de cel implicit)
 protected $table = 'person_investigations';

 // Câmpurile care pot fi completate în mod masiv
 protected $fillable = ['name', 'summary', 'persons_investigations', 'conclusion', 'submission_date'];

 // Definează relația cu tabelul de investigații principale
 public function investigation()
 {
     return $this->belongsTo('App\Models\Investigation', 'persons_investigations');
 }

//     public function investigations()
// {
//     return $this->hasMany(Investigation::class);
// }
}
