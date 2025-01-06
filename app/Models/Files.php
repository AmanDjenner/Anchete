<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    // Specificarea tabelei asociate (opțional, doar dacă numele diferă de cel implicit)
    protected $table = 'files';

    // Câmpurile care pot fi completate în mod masiv
    protected $fillable = ['name', 'investigation_id', 'doc_file_path'];

    // Relația cu modelul Investigation
    public function investigation()
    {
        return $this->belongsTo(Investigation::class);
    }
}
