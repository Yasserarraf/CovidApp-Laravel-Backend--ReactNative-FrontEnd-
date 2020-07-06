<?php

namespace App;
use App\Fiche;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $fillable = ['fiche_id','question_nb','question','reponse'];
  public function fiche(){
    return $this->hasMany(Fiche::class);
  }
}
