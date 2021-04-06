<main class="container">
 <div class="return">
    <a class="return__link" onclick="window.history.go(-1); return false;"><i class="fas fa-reply fa-lg"></i></a>
</div>
<!--test form-->
<!--
<form class="matchesForm" method="get" action="analytics.php">
<input type="date">
<input type="submit" name="submit"/>
</form>-->
<h2 class="subtitle">Total searches: <?php echo($amountsearches)?></h2>
   <ul>
   <h2 class="subtitle">Most popular teams</h2>
   <h3>#1</h3>
    <li><?php echo(array_keys($vals)[0].'<br> searches: '.array_values($vals)[0].'<br><br>')?></li>
    <h3>#2</h3>
   <li><?php echo(array_keys($vals)[1].'<br> searches: '.array_values($vals)[1].'<br><br>')?></li>
   <h3>#3</h3>
   <li><?php echo(array_keys($vals)[2].'<br> searches: '.array_values($vals)[2].'<br><br>')?></li>
   </ul>
    </main>
    <footer></footer>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

