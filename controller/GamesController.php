<?php
/*
//require the needed model(s).
require_once "./model/Result.php";
require_once "./model/Player.php";

    //get all the distinct teams
    $teams= array();
    $teams= Result::select('team_1')->distinct()->orderBy('team_1', 'asc')->get();
    
    //get all distinct events
    $events = array();
   $events=Player::select('event_id', 'event_name')->distinct()->get() ;*/ 

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/Result.php';
require_once __DIR__ . '/../model/Player.php';
require_once __DIR__ . '/../model/Teamanalytic.php';
class GamesController extends Controller {
  public function index() {
       $teams= Result::select('team_1')->distinct()->orderBy('team_1', 'asc')->get();
    $this->set('teams', $teams);
   $events=Player::select('event_id', 'event_name')->distinct()->get();
   $this -> set('events', $events);
        //analytics
     //check if was submitted
     if(!empty($_POST['action'])){
      //check which one
      if($_POST['action']=== 'add_team'){
         $newTeamanalytic= new Teamanalytic;
         $newTeamanalytic->search = $_POST['team'];
         date_default_timezone_set('Europe/Brussels');
         $newTeamanalytic->date = date("Y-m-d");
         
         //test
         $errors = Teamanalytic::validate($newTeamanalytic);
         //$teams->contains(strval($_POST['team']))== true
         $test= Result::where('team_1', $_POST["team"])->count();
         if (empty($errors) && $test >0) {
       
          //insert the new show
          $newTeamanalytic->save();
         }
         
         else {
          $this->set('errors', $errors);
        }
        
      }
     }
     //end analytics

     //og code
   

     if(!empty($_POST['team'])){
   $selectedMatches= array();
            //if statements depending of what is filled in in the form
            //both filled in
            
            
            if(!empty($_POST["team"])&& !empty($_POST["event"])){
              $selectedMatches= Result::where('team_1',$_POST["team"])->orWhere('team_2',$_POST["team"])->where('event_id', $_POST["event"])->get();
           }
           //only team filled in
           else if(!empty($_POST["team"])&& empty($_POST["event"])){
              $selectedMatches= Result::where('team_1',$_POST["team"])->orWhere('team_2',$_POST["team"])->get();
           }
           //only event filled in
           else if(empty($_POST["team"]) && !empty($_POST["event"])){
              $selectedMatches= Result::where('event_id', $_POST["event"])->get();
           }
           else if(empty($_POST["team"]) && empty($_POST["event"])){
              echo '<p class="error">Please fill in at least one field</p>';
           }
    $this -> set('selectedMatches', $selectedMatches);  
    }


    //end og code  
    }
  
}