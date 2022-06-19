<?php 
    include 'connect.php';
    include 'includes/overall_header.php';
    
    include 'includes/mainopen.html';
    $clanakid=$_GET['id'];
    if(isset($clanakid) && !empty($clanakid)) {
        $query="SELECT * FROM članci WHERE arhiva=0 AND id='$clanakid'";
        $result =mysqli_query($dbc,$query);
        $row=mysqli_fetch_array($result);
        echo '<section class="flex-container" id="'.$row['kategorija'].'">';
        echo '<div class="line"><h2 class='.$row['kategorija'].'>'.$row['kategorija'].'</h2></div>';
    
        echo  '<article><h3 class="full">'.$row['naslov'].'</h3>';
        echo  '<h4 class="full">'.$row['sazetak'].'</h4>';
        echo  '<div class="info"><p>Autor:'.$row['autor'].'</p> <p>Objavljeno:'.$row['datum'].'</p></div>';
        echo  '<figure><img src="'.URL_HOST.'assets/images/'.$row['slika'].'" /></figure>';
        echo   '<figcaption>'.$row['opis_slike'].'</figcaption>';
        echo   '<p>'.$row['tekst'].'</p>';
        echo   '</article></section>';
    
       echo '</section>';
       echo ' <script src="script/customstyle.js"></script>';
       mysqli_close($dbc);
}else 
    header("Location:index.php");

    include 'includes/mainclose.html';
    include 'includes/overall_footer.php';  
?>
