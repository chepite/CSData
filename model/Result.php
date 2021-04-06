<?php

use \Illuminate\Database\Eloquent\Model;

class Result extends Model {
  public $timestamps = false;
  protected $table = 'results';

  public function economy(){
    return $this->belongsTo(Economy::class);
  }
  public function player(){
    return $this->hasMany(Player::class);
  }

}
