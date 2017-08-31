<!DOCTYPE html>
<html>
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
  <title>Search Results</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<body>

<div class="loader" id="loader">
  <div id="largeBox"></div>
  <div id="smallBox"></div>
</div>

<div id="outer" >
<nav id="nav">
  <center><h2><a href="../index.php">Movie Trailers</a></h2></center>
</nav>


<?php


$curl = curl_init();

$q = htmlspecialchars($_POST['input']);

?> <div class="titl res"> <?php
      echo "Search results for ".$q.":";
      ?></div><?php

$q=str_replace(' ','+',$q);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?include_adult=false&page=1&query=$q&language=en-US&api_key=8448903d151180f7e5b479d58032281a",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 100,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$dat = json_decode($response); 
if ($err) {
  echo "cURL Error #:" . $err;
} 
else if($dat->results == NULL){
  echo("Nothimg found :( ");
}
else {
    // echo $response;
  
  foreach ($dat -> results as $i) {
    
    $y=$i->poster_path;
    $r=$i->id;
    $t=$i->title;
    if($y!=NULL){
    
    
    ?><div class="poster1 spa1" id= <?php echo($r) ?>><?php

    echo("<img class = 'image'  height='300px' width='200px' src= 'http://image.tmdb.org/t/p/w185/$y'>");
    echo("\t"."\t"."<br>"."<center><p  class='image ima' > <br>$t </p></center>");
    ?></div><?php
  }
  }
  ?><div id="bottom"></div>
  </div><?php
}
?>

<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>