<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestigationStatut extends Model
{
    use HasFactory;

      // Specificarea tabelei asociate (opțional, doar dacă numele tabelei diferă de cel implicit)
      protected $table = 'investigation_statuts';

      // Câmpurile care pot fi completate în mod masiv
      protected $fillable = [
          'investigation_id',
          'status',
          'assigned_to',
          'committee_date',
          'committee_member_id',
          'ordin_file_path',
          'process_verbal_file_path',
          'penalty_id',
          'investigation_penalty_id'
      ];

      // Relația cu modelul Investigation
      public function investigation()
      {
          return $this->belongsTo(Investigation::class);
      }

      // Relația cu modelul CommitteeMember
      public function committeeMember()
      {
          return $this->belongsTo(CommitteeMember::class);
      }

      // Relația cu modelul Penalty
      public function penalty()
      {
          return $this->belongsTo(Penalty::class);
      }

      // Relația cu modelul InvestigationPenalty
      public function investigationPenalty()
      {
          return $this->belongsTo(InvestigationPenalty::class);
      }
}
