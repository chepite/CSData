<?php

use \Illuminate\Database\Eloquent\Model;

class Economy extends Model {
  public $timestamps = false;
  protected $table = 'economy';

  public function result(){
    return $this->belongsTo(Result::class);
  }
}