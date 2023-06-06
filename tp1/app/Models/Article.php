<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory; 
    protected $fillable = [
        'id',
        'titre',
        'contenu',
        'date',
        'langue',
        'etudient_id',
    ];


    use HasFactory;
    public function etudient()
    {

        return $this->hasOne('App\Models\Etudient', 'id', 'etudient_id');
    }

}