<?php 
 require 'sesija.php';
 include 'connect.php';
 include 'includes/overall_header.php';
 include 'includes/mainopen.html';
if(logged_in()) {
    echo '<section class="flex-container2" id="ucp" >';
    echo ' <h2>Korisnički izbornik</h2>';
    echo '<article><h3 class="short">Dobro došli '.$_SESSION['ime'];
    echo '<p class="ucpp"><a href="unos.php"  class="gumb" target="_blank">Unesite novi članak.</a></p>';
    echo '<p class="ucpp"><a href="admin.php"  class="gumb"  target="_blank">Uredite članke.</a></p>';
    ?>
    <form method="get">
    <input type="submit" name="logout" value="Odjava">
    </form>
    
<?php 
    echo '</section>';

    if(isset($_GET['logout'])) {
        session_unset();
        session_destroy();
    }
} else {
echo "Niste prijavljeni, prijavite se ili se registrirajte.";
echo '<a href="registracija.php">Registracija</a>';
echo '<a href="prijava.php">Prijava</a>';   
}

?>