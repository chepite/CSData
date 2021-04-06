<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   */
?>
<main class="container">
    <div class="content">
      <h2 class="subtitle">Search for your match</h2>
      <form class="matchesForm" method="POST" action="index.php">
      <input type="hidden" name="action" value="add_team">
        <div class="matchesForm__div">
        <label for="teams">Teams</label>
          <input list="matchesForm__teams" id="teams" name="team" required/>
          <datalist id="matchesForm__teams" name="teamsdatalist"> 
            <select class="matchesForm__teams--list" name="teamslist">
            <?php
            foreach($teams as $team){
             echo ('<option value="'.$team->team_1.'">'.$team->team_1.'</option>');
            }
          ?>
            </select>
          </datalist>
        </div>
        <div class="matchesForm__div">
          <label for="events">Events</label>
          <input list="matchesForm__events" id="events" name="event"/>
          <datalist id="matchesForm__events" placeholder="Event" name="eventsdatalist">
            <select class="matchesForm__events--list" name="eventlist">
            <?php
            foreach($events as $event){
             echo ('<option value="'.$event->event_id.'">'.$event->event_name.'</option>');
            }
          ?>
            </select>
          </datalist>
        </div>
          <input type="submit" name="submit"/>
      </form>
      <div class="error">
      <?php
      
            // show the errors for crud
            if(!empty($errors)){
                var_dump($errors);
                $errors = '';
            }
        ?>
        </div>
      <!-- php for list making-->
      
      <ul class="matches__list">
      <?php 
            if(isset($selectedMatches)){
            //if statement if selectedmatches is 0
            foreach ($selectedMatches as $Match) {
              //<a href="index.php?page=detail&match='.$Match->match_id.'&map='.$Match->map.'"> og link
              // ?page=detail&match=2339527&map=Mirage
             echo( '
             <a href="index.php?page=detail&match='.$Match->match_id.'&map='.$Match->map.'">
             <article class="highlight__match" id="'. $Match->match_id.'_'. $Match->map .'" style="background-image: url(./assets/images/banners/de_'.$Match->map.'_banner.jpg);"> 
      <div class="highlight__match">
        <div class="highlight__match--info">
          <h3 class="highlight__match--title">'.$Match->team_1.' vs '.$Match->team_2.'</h3>
          <p class="highlight__match--map">'.$Match->map.'</p>
        </div>
        <div class="highlight__match--score">
          <p class="highlight__match--score t">'.$Match->result_1.'</p>
          <p>:</p>
          <p class="highlight__match--score ct">'.$Match->result_2.'</p>
        </div>
      </div>
    </article>
    </a>');
            }}
            
      ?>
      </ul>
    </div>
  </main>