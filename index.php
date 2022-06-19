<?php 
    include 'connect.php';
    include 'includes/overall_header.php';
    include 'includes/mainopen.html';
    echo '<section class="flex-container" id="Politika">';
    $query="SELECT * FROM članci WHERE arhiva=0 AND kategorija='Politika' LIMIT 3";
    $result =mysqli_query($dbc,$query);
    echo '<div class="line"><h2 class="politika">Politika</h2></div>';
    while($row=mysqli_fetch_array($result)) {
     echo '<a href="clanak.php?id='.$row['id'].'"><article>';
     echo '<figure class="short"><img src="'.URL_ASSETS.'/images/'.$row['slika'].'"/></figure>';
     echo '<h3 class="short">'.$row['naslov'].'</h3>';
     echo '<p class="short">'.$row['sazetak'].'</p>';
     echo  '</article></a>';

    }
    echo '</section>';
    echo '<section class="flex-container" id="Sport">';
    $query="SELECT * FROM članci WHERE arhiva=0 AND kategorija='Sport' LIMIT 3";
    $result =mysqli_query($dbc,$query);
    echo '<div class="line"><h2 class="sport">Sport</h2></div>';
    while($row =mysqli_fetch_array($result)) {
     echo '<a href="clanak.php?id='.$row['id'].'"><article>';
     echo '<figure class="short"><img src="'.URL_ASSETS.'/images/'.$row['slika'].'"/></figure>';
     echo '<h3 class="short">'.$row['naslov'].'</h3>';
     echo '<p class="short">'.$row['sazetak'].'</p>';
     echo  '</article></a>';

    }
    echo '</section>';
    mysqli_close($dbc);

include 'includes/mainclose.html';
include 'includes/overall_footer.php';
?>
