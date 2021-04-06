<?php
/*



     $Match= Result::where('match_id',$_GET["match"])->where('_map', $_GET["map"])->first();
     $players= array();
     $players= Player::where('match_id',$_GET["match"])->get();
    //filter players in two teams
    $team1 = array();
    $team2= array();
    foreach($players as $player){
        if($players[0]->team == $player->team){
            array_push($team1, $player);
        }
        else{
            array_push($team2, $player);
        }
    }
     //getting the abbreviation of the map
     $abbr;
     if($players[0]->map_1 == $_GET["map"]){
         $abbr= "m1";
     } else if($players[0]->map_2 == $_GET["map"]){
         $abbr= "m2";
     } else if($players[0]->map_3 == $_GET["map"]){
         $abbr= "m3";
     } 
      //get economydata
      $economyData= Economy::where('match_id', $_GET["match"])-> where('_map', $_GET["map"])->first();
      $firstteam1Economy=array();
      $firstteam1Economy=Economy::where('match_id', $_GET["match"])-> where('_map', $_GET["map"])->first(['1_t1','2_t1','3_t1','4_t1','5_t1','6_t1','7_t1','8_t1','9_t1','10_t1','11_t1','12_t1','13_t1','14_t1','15_t1']);
      $firstteam2Economy=array();
            $firstteam2Economy=Economy::where('match_id', $_GET["match"])-> where('_map', $_GET["map"])->first(['1_t2','2_t2','3_t2','4_t2','5_t2','6_t2','7_t2','8_t2','9_t2','10_t2','11_t2','12_t2','13_t2','14_t2','15_t2']);       
      $secondteam1Economy= array();
                        $secondteam1Economy=Economy::where('match_id', $_GET["match"])-> where('_map', $_GET["map"])->first(['16_t1','17_t1','18_t1','19_t1','20_t1','21_t1','22_t1','23_t1','24_t1','25_t1','26_t1','27_t1','28_t1','29_t1','30_t1','16_t2']);
      $secondteam2Economy= array();
                        $secondteam2Economy=Economy::where('match_id', $_GET["match"])-> where('_map', $_GET["map"])->first(['16_t2','17_t2','18_t2','19_t2','20_t2','21_t2','22_t2','23_t2','24_t2','25_t2','26_t2','27_t2','28_t2','29_t2','30_t2','16_t2']);

?>*/

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/Result.php';
require_once __DIR__ . '/../model/Player.php';
require_once __DIR__ . '/../model/Economy.php';

class DetailsController extends Controller {
  public function detail() {
     

    if(isset($_GET['match']) && isset($_GET['map'])){
        $Match= Result::where('match_id',$_GET["match"])->where('map', $_GET["map"])->first();
    }

    //og code: $Match= Result::where('match_id',$_GET["match"])->where('map', $_GET["map"])->first();
    $this->set('Match', $Match);
   $players= Player::where('match_id',$_GET["match"])->get();
   $this -> set('players', $players);
   $abbr;
     if($players[0]->map_1 == $_GET["map"]){
         $abbr= "m1";
     } else if($players[0]->map_2 == $_GET["map"]){
         $abbr= "m2";
     } else if($players[0]->map_3 == $_GET["map"]){
         $abbr= "m3";
     } 
     $this -> set('abbr', $abbr);
     

     $players= array();
     $players= Player::where('match_id',$_GET["match"])->distinct()->get();
    //filter players in two teams
    $team1 = array();
    $team2= array();
    foreach($players as $player){
        if($players[0]->team == $player->team){
            array_push($team1, $player);
        }
        else{
            array_push($team2, $player);
        }
    }
    $this -> set('team1', $team1);
    $this -> set('team2', $team2);

        //get the economy data once instead of all querying it 4times or so
     $economyData= Economy::where('match_id', $_GET["match"])-> where('map', $_GET["map"])->first();
      $firstteam1Economy=array();
      $firstteam1Economy=$economyData->first(['1_t1','2_t1','3_t1','4_t1','5_t1','6_t1','7_t1','8_t1','9_t1','10_t1','11_t1','12_t1','13_t1','14_t1','15_t1']);
      //$firstteam1Economy=Economy::where('match_id', $_GET["match"])-> where('map', $_GET["map"])->first(['1_t1','2_t1','3_t1','4_t1','5_t1','6_t1','7_t1','8_t1','9_t1','10_t1','11_t1','12_t1','13_t1','14_t1','15_t1']);
       $this -> set('firstteam1Economy', $firstteam1Economy);
      $firstteam2Economy=array();
      $firstteam2Economy=$economyData->first(['1_t2','2_t2','3_t2','4_t2','5_t2','6_t2','7_t2','8_t2','9_t2','10_t2','11_t2','12_t2','13_t2','14_t2','15_t2']);
           // $firstteam2Economy=Economy::where('match_id', $_GET["match"])-> where('map', $_GET["map"])->first(['1_t2','2_t2','3_t2','4_t2','5_t2','6_t2','7_t2','8_t2','9_t2','10_t2','11_t2','12_t2','13_t2','14_t2','15_t2']);       
      $this -> set('firstteam2Economy', $firstteam2Economy);
            $secondteam1Economy= array();
            $secondteam1Economy=$economyData->first(['16_t1','17_t1','18_t1','19_t1','20_t1','21_t1','22_t1','23_t1','24_t1','25_t1','26_t1','27_t1','28_t1','29_t1','30_t1','16_t2']);
                   //    $secondteam1Economy=Economy::where('match_id', $_GET["match"])-> where('map', $_GET["map"])->first(['16_t1','17_t1','18_t1','19_t1','20_t1','21_t1','22_t1','23_t1','24_t1','25_t1','26_t1','27_t1','28_t1','29_t1','30_t1','16_t2']);
      $this -> set('secondteam1Economy', $secondteam1Economy);
                       $secondteam2Economy= array();
                       $secondteam2Economy=$economyData->first(['16_t2','17_t2','18_t2','19_t2','20_t2','21_t2','22_t2','23_t2','24_t2','25_t2','26_t2','27_t2','28_t2','29_t2','30_t2','16_t2']);
                     //   $secondteam2Economy=Economy::where('match_id', $_GET["match"])-> where('map', $_GET["map"])->first(['16_t2','17_t2','18_t2','19_t2','20_t2','21_t2','22_t2','23_t2','24_t2','25_t2','26_t2','27_t2','28_t2','29_t2','30_t2','16_t2']);
                         $this -> set('secondteam2Economy', $secondteam2Economy);
  }

  public function api(){
    //get economydata once
    $economyJson= Economy::where('match_id', $_GET["match"])-> where('map', $_GET["map"])->first()->toJson();
    echo($economyJson);
    exit;
  }
}