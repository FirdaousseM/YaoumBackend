<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['titre','contenu','ordre_doc', 'id_module'];

    public function scopeOrdreDuDoc($query){
        return $query->orderBy('ordre_doc');
    }
}
