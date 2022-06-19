<?php 
    require '../sesija.php';
    include '../connect.php';
    include '../includes/overall_header.php';
    include '../includes/mainopen.html';
if (isset($_POST['submitbtn'])) 
{
    $date=date("H:i d.m.Y");
    $title=$_POST['articleTitle'];
    $kratkisad=$_POST['articleSummary'];
    $sadrzaj=$_POST['articleFull'];
    $kategorija=$_POST['articleCat'];
    $slika =$_FILES['articleFig']['name'];
    $opis_slike=$_POST['opis_slike'];
    $autor = $_SESSION['ime'];
    if (isset($_POST['articleIzborNe']))
        $arhiva=1;
    else 
        $arhiva=0;
    if (!file_exists('../assets/images/'.$slika)){
         $target_dir = '../assets/images/'.$slika;
        move_uploaded_file($_FILES["articleFig"]["tmp_name"], $target_dir);
    }
    $query="INSERT INTO članci(datum,naslov,sazetak,tekst,slika,kategorija,arhiva,autor,opis_slike) 
            VALUES('$date','$title','$kratkisad','$sadrzaj','$slika','$kategorija','$arhiva','$autor','$opis_slike')";
    $result=mysqli_query($dbc,$query) or die("Error".mysqli_error($dbc));
    mysqli_close($dbc);

    
        echo '<section class="flex-container" id="'.$kategorija.'">';
        echo  '<article><h3 class="full">'.$title.'</h3>';
        echo  '<h4 class="full">'.$kratkisad.'</h4>';
        echo  '<div class="info"><p>Autor:'.$autor.'</p> <p>Objavljeno:'.$date.'</p></div>';
        echo  '<figure><img src="../Assets/Images/'.$slika.'" /></figure>';
        echo   "<p>$sadrzaj</p>";
        echo   '</article></section>';

}else {
    echo "Podaci se šalju kroz formu.";
    header('Refresh:1; url=../index.php');
}?> 
<script src="customstyle.js"></script>
<?php 
include '../includes/mainclose.html';
include '../includes/overall_footer.php';

?>