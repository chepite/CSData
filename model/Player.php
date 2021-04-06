<?php

use \Illuminate\Database\Eloquent\Model;

class Player extends Model {
  public $timestamps = false;
  protected $table = 'players';

  public function result(){
    return $this->belongsTo(Result::class);
  }
}
