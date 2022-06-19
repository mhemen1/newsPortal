<?php 
    include 'connect.php';
    include 'includes/overall_header.php';
    
    include 'includes/mainopen.html';
    $kategorija=$_GET['id'];
    if(isset($kategorija) && !empty($kategorija)) {
        echo '<section class="flex-container" id="'.$kategorija.'">';
        $query="SELECT * FROM članci WHERE arhiva=0 AND kategorija='$kategorija'";
        $result =mysqli_query($dbc,$query);
        echo '<div class="line"><h2 class='.$kategorija.'>'.$kategorija.'</h2></div>';
        while($row=mysqli_fetch_array($result)) {
            echo '<a href="clanak.php?id='.$row['id'].'"><article>';
            echo '<figure class="short"><img src="'.URL_ASSETS.'/images/'.$row['slika'].'"/></figure>';
            echo '<h3 class="short">'.$row['naslov'].'</h3>';
            echo '<p class="short">'.$row['sazetak'].'</p>';
            echo  '</article></a>';
    }
       echo '</section>';
       echo ' <script src="script/customstyle.js"></script>';
}else 
    header("Location:index.php");

    include 'includes/mainclose.html';
    include 'includes/overall_footer.php';  
?>
