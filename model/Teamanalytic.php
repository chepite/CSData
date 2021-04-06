<?php

use \Illuminate\Database\Eloquent\Model;

class Teamanalytic extends Model {
  protected $table = 'team_analytics';
  public $timestamps = false;
  public static function validate($data){
    $errors= [];
    if(empty($data['search'])){
      $errors[]= 'Please fill in the team field';
    }
    //checks if the team that the users give in even exists
    //$test= Result::select('team_1')->get()->contains($data['search']);
    /*$test= Result::select('team_1')->get()->contains($data['search']);
    if($test == false){
      $errors[]= 'no such team in database';
   }*/
    return $errors;
  }
}
