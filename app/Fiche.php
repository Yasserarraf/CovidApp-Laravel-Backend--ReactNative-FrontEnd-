<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    protected $fillable = ['userp_id','question_nb','question','reponse'];



    public function userp()
    {
      return $this->belongsTo(Userp::class);
    }
    public function question(){
      return $this->hasMany(Question::class);
    }
}
