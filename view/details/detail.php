<main class="container">
  <div class="return">
    <a class="return__link" onclick="window.history.go(-1); return false;"><i class="fas fa-reply fa-lg"></i></a>
</div>
<?php 
        echo( '
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
    ');

        ?>
    <!-- div leaderboard? stats about players -> when you click on it you will see the leaderboard in the matches.html page-->
    <!-- classes like t are only for dynamic filling purposes -->
    <div class="leaderboards">
        <?php echo('<div class="leaderboard">
        <h2 class="tableTitle">'.$team1[0]->team .'</h2>
        <table class="leaderboard__team">
            <tr>
              <th>Player</th>
              <th>K</th>
              <th>A</th>
              <th>D</th>
              <th>HS</th>
            </tr>');
            foreach($team1 as $player){
                echo('<tr>
                <td class="playerData">'.$player->player_name.'</td>
                <td class="killData">'.$player-> {$abbr."_kills"}.'</td>
                <td class="assistData">'.$player-> {$abbr."_assists"}.'</td>
                <td class="deathData">'.$player-> {$abbr."_deaths"}.'</td>
                <td class="headshotData">'.$player-> {$abbr."_hs"}.'</td>
            </tr>');
            }
            echo('</table> </div>')
    ?>
    
    <?php echo('<div class="leaderboard">
        <h2 class="tableTitle">'.$team2[0]->team .'</h2>
        <table class="leaderboard__team">
            <tr>
              <th>Player</th>
              <th>K</th>
              <th>A</th>
              <th>D</th>
              <th>HS</th>
            </tr>');
            foreach($team2 as $player){
                echo('<tr>
                <td class="playerData">'.$player->player_name.'</td>
                <td class="killData">'.$player-> {$abbr."_kills"}.'</td>
                <td class="assistData">'.$player-> {$abbr."_assists"}.'</td>
                <td class="deathData">'.$player-> {$abbr."_deaths"}.'</td>
                <td class="headshotData">'.$player-> {$abbr."_hs"}.'</td>
            </tr>');
            }
            echo('</table> </div>')
    ?>
</div>
<h2 class="charts__title">Economy charts</h2>
    <div class="charts">
        <canvas id="economy" width="480px" height="480px"></canvas>
        <canvas id="economy2" width="480px" height="480px"></canvas>
    </div>
    <!--graphs from economy-->
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script type="text/javascript">
    //there was not really a php library that gave the same modern feel of chart.js, so i used chart.js just like in the previous assignment
    let  firstteam1Economy= <?php echo ($firstteam1Economy); ?>;
      firstteam1Economy= Object.values(firstteam1Economy);
      let firstteam2Economy=<?php echo( $firstteam2Economy)?>;
      firstteam2Economy= Object.values(firstteam2Economy);
      let secondteam1Economy= <?php echo($secondteam1Economy); ?>;
      secondteam1Economy= Object.values(secondteam1Economy);
     let  secondteam2Economy= <?php echo($secondteam2Economy); ?>;
     secondteam2Economy= Object.values(secondteam2Economy);
     console.log(firstteam1Economy)
  const $chart = document.getElementById("economy").getContext("2d");
  const $chart2 = document.getElementById("economy2").getContext("2d");
    //get data
             const makefirstChart = () => {
    //if(secondteam1Economy.length >0 && secondteam2Economy.lenght >0){
    var firstchart = new Chart($chart, {
      type: "line",
      data: {
        labels: [
          "1",
          "2",
          "3",
          "4",
          "5",
          "6",
          "7",
          "8",
          "9",
          "10",
          "11",
          "12",
          "13",
          "14",
          "15",
        ],
        datasets: [
          {
            label: <?php echo(json_encode($Match->team_1))?>,
            fill: false,
            data: firstteam1Economy,
            //color dot
            backgroundColor: `#fff`,
            //color line
            borderColor: `#fff`,
            borderWidth: 1,
          },
          {
            label: <?php echo(json_encode($Match->team_2))?>,
            fill: false,
            data: firstteam2Economy,
            //color dots
            backgroundColor: `#abc123`,
            //color line
            borderColor: `#abc123`,
            borderWidth: 1,
          },
        ],
      },
      options: {
        title: {
          display: true,
          text: "Economy First half",
        },
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
            },
          ],
        },
      },
    });
    }
    //else{
    //  const $economy = document.querySelector(`#economy`);
    //  const $title = document.querySelector(`.charts__title`);
    //  $title.style.display = 'none';
    //}
  //};
  const makesecondChart = () => {
    //if(secondteam1Economy.length >0 && secondteam2Economy.lenght >0){
    var secondChart = new Chart($chart2, {
      type: "line",
      data: {
        labels: [
          "16",
          "17",
          "18",
          "19",
          "20",
          "21",
          "22",
          "23",
          "24",
          "25",
          "26",
          "27",
          "28",
          "29",
          "30",
        ],
        datasets: [
          {
            label: <?php echo(json_encode($Match->team_1))?>,
            fill: false,
            data: secondteam1Economy,
            //color dot
            backgroundColor: `#fff`,
            //color line
            borderColor: `#fff`,
            borderWidth: 1,
          },
          {
            label: <?php echo(json_encode($Match->team_2))?>,
            fill: false,
            data: secondteam2Economy,
            //color dots
            backgroundColor: `#abc123`,
            //color line
            borderColor: `#abc123`,
            borderWidth: 1,
          },
        ],
      },
      options: {
        title: {
          display: true,
          text: "Economy Second half",
        },
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
            },
          ],
        },
      },
    });
  }
  //else{
  //  const $economy2 = document.querySelector(`#economy2`);
    //  $economy2.style.display= `none`
  //}
  //};
  let init = ()=>{
    makefirstChart();
    makesecondChart();
  }
  init();
</script>