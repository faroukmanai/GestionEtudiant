<?php

namespace App\Models;
use App\Models\Etudiant;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title_fr', 'content_fr','title_en', 'content_en', 'etudiant_id'];
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
