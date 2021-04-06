<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/Teamanalytic.php';
class AnalyticsController extends Controller {
public function analytics(){
    $distinctsearches= Teamanalytic::select('search')->distinct()->get();
    $vals = array();
    foreach($distinctsearches as $search){
       $count= Teamanalytic::where('search', $search->search)->get()->count();
       $vals+= array(strval($search->search) => $count);
    }
    arsort($vals);
    $amountsearches = Teamanalytic::all()->count();
    $this -> set('amountsearches', $amountsearches);
    $this -> set('vals', $vals);
}
}


?>