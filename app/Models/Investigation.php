<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;

  // Specificarea tabelei asociate (opțional, doar dacă numele diferă de cel implicit)
  protected $table = 'investigations';

  // Câmpurile care pot fi completate în mod masiv
  protected $fillable = ['name', 'summary', 'person_id', 'conclusion', 'submission_date'];

  // Relația cu modelul Person
  public function person()
  {
      return $this->belongsTo(Person::class);
  }

  // Relația cu fișierele asociate
  public function files()
  {
      return $this->hasMany(File::class);
  }

}
