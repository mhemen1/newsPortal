<?php  
require 'sesija.php';
include 'connect.php';
include 'includes/overall_header.php';
include 'includes/mainopen.html';
if(logged_in() && is_admin()) { 
/*POLITIKA */
echo '<section class="flex-container" id="admin">';
$query="SELECT * FROM članci WHERE arhiva=0 AND kategorija='Politika'";
$result =mysqli_query($dbc,$query);
echo '<div class="line"><h2 class="politika">Politika</h2></div>';
while($row=mysqli_fetch_array($result)) {
    $id=$row['id'];
    $date=$row['datum'];
    $title=$row['naslov'];
    $kratkisad=$row['sazetak'];
    $sadrzaj=$row['tekst'];
    $kategorija="Politika";
    $slika =$row['slika'];
    $opis_slike=$row['opis_slike'];
    $autor = $row['autor'];
    echo '<form name="Unos" enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name ="id" value="'.$id.'" />
    <label for="articleTitle">Naslov Vijesti </label>
    <input type="text" maxlength="30" required name="articleTitle"  value="'.$title.'">';
    echo '<label for="articleSummary">Kratki sadržaj vijesti (do 100 znakova)</label>
    <textarea cols="30" rows="5" name="articleSummary" maxlength="100" >'.$kratkisad.'</textarea>';
    echo '<label for="articleFull">Puni sadržaj vijesti:</label>
    <textarea cols="50" rows="20" name="articleFull" >'.$sadrzaj.'</textarea>';
    echo '<label for="articleCat">Kategorija Članka:</label>
    <select name="articleCat"> 
      <option value="" disabled >Odabir Kategorije</option>
        <option value="Politika" selected>Politika</option>
        <option value="Sport">Sport</option>
    </select>';
    echo '<label for="articleFig">Slika Članka:</label>
    <input name="articleFig" type="file"  accept="image/*" data-msg-accept="Samo slike se mogu odabrati." value="'.$slika.'" />';
    echo '<img src="'.URL_ASSETS.'images/'.$slika.'" width=100px height=100px/>';
    echo '<label for="opis_slike">Opis Slike </label>
        <input type="text" maxlength="100" name="opis_slike" value="'.$opis_slike.'" />';
    echo '<label for="articleIzbor">Spremiti u Arhivu?</label>
        <label for="izborne">
            <input name="articleIzborNe" type="checkbox" value="Arhiva"/>Arhiva
        </label>';
    echo '<div>
        <button type="reset" value="Poništi" name="resetbtn">Poništi</button>
        <button type="submit" value="Update" name="updatebtn">Promijeni</button>
        <button type="submit" value="Izbriši" name="deletebtn">Izbriši </button>
        </div></form>';

}
echo '</section>';

/*SPORT */
echo '<section class="flex-container" id="admin">';
$query="SELECT * FROM članci WHERE arhiva=0 AND kategorija='Sport'";
$result =mysqli_query($dbc,$query);
echo '<div class="line"><h2 class="sport">Sport</h2></div>';
while($row=mysqli_fetch_array($result)) {
    $id=$row['id'];
    $date=$row['datum'];
    $title=$row['naslov'];
    $kratkisad=$row['sazetak'];
    $sadrzaj=$row['tekst'];
    $kategorija="Sport";
    $slika =$row['slika'];
    $opis_slike=$row['opis_slike'];
    $autor = $row['autor'];
    echo '<form name="Unos" enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name ="id" value="'.$id.'" />
    <label for="articleTitle">Naslov Vijesti </label>
    <input type="text" maxlength="30" required name="articleTitle"  value="'.$title.'">';
    echo '<label for="articleSummary">Kratki sadržaj vijesti (do 100 znakova)</label>
    <textarea cols="30" rows="5" name="articleSummary" maxlength="100" >'.$kratkisad.'</textarea>';
    echo '<label for="articleFull">Puni sadržaj vijesti:</label>
    <textarea cols="50" rows="20" name="articleFull" >'.$sadrzaj.'</textarea>';
    echo '<label for="articleCat">Kategorija Članka:</label>
    <select name="articleCat"> 
      <option value="" disabled >Odabir Kategorije</option>
        <option value="Politika">Politika</option>
        <option  value="Sport" selected>Sport</option>
    </select>';
    echo '<label for="articleFig">Slika Članka:</label>
    <input name="articleFig" type="file"  accept="image/*" data-msg-accept="Samo slike se mogu odabrati." value="'.$slika.'" />';
    echo '<img src="'.URL_ASSETS.'images/'.$slika.'" width=100px height=100px/>';
    echo '<label for="opis_slike">Opis Slike </label>
    <input type="text" maxlength="100" name="opis_slike" value="'.$opis_slike.'" />';
    echo '<label for="articleIzbor">Spremiti u Arhivu?</label>
    <label for="izborne">
        <input name="articleIzborNe" type="checkbox" value="Arhiva"/>Arhiva
     </label>';
        echo '<div>
    <button type="reset" value="Poništi" name="resetbtn">Poništi</button>
    <button type="submit" value="Update" name="updatebtn">Promijeni</button>
    <button type="submit" value="Izbriši" name="deletebtn">Izbriši </button>
    </div></form>';

}
echo '</section>';



/*ARHIVA */
echo '<section class="flex-container" id="admin">';
$query="SELECT * FROM članci WHERE arhiva=1";
$result =mysqli_query($dbc,$query);
echo '<div class="line"><h2>Arhiva</h2></div>';
while($row=mysqli_fetch_array($result)) {
    $id=$row['id'];
    $date=$row['datum'];
    $title=$row['naslov'];
    $kratkisad=$row['sazetak'];
    $sadrzaj=$row['tekst'];
    $kategorija=$row['kategorija'];
    $slika =$row['slika'];
    $opis_slike=$row['opis_slike'];
    $autor = $row['autor'];
    echo '<form name="Unos" enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name ="id" value="'.$id.'" />
    <label for="articleTitle">Naslov Vijesti </label>
    <input type="text" maxlength="30" required name="articleTitle" value="'.$title.'">';
    echo '<label for="articleSummary">Kratki sadržaj vijesti (do 100 znakova)</label>
    <textarea cols="30" rows="5" name="articleSummary" maxlength="100" >'.$kratkisad.'</textarea>';
    echo '<label for="articleFull">Puni sadržaj vijesti:</label>
    <textarea cols="50" rows="20" name="articleFull" >'.$sadrzaj.'</textarea>';
    echo '<label for="articleCat">Kategorija Članka:</label>
    <select name="articleCat"> 
      <option value="" disabled >Odabir Kategorije</option>';
      if($kategorija=="Sport") {
        echo '<option value="Politika">Politika</option>
        <option value="Sport" selected>Sport</option>';
      }else {
        echo '<option value="Politika" selected>Politika</option>
        <option value="Sport" >Sport</option>';
      }
    echo '</select>';
    echo '<label for="articleFig">Slika Članka:</label>
    <input name="articleFig" type="file"  accept="image/*" data-msg-accept="Samo slike se mogu odabrati." value="'.$slika.'" />';
    echo '<img src="'.URL_ASSETS.'images/'.$slika.'" width=100px height=100px/>';
    echo '<label for="opis_slike">Opis Slike </label>
    <input type="text" maxlength="100" name="opis_slike" value="'.$opis_slike.'" />';
    echo '<label for="articleIzbor">Spremiti u Arhivu?</label>
    <label for="izborne">
        <input name="articleIzborNe" type="checkbox" value="Arhiva" checked/>Arhiva
    </label>';
    echo '<div>
<button type="reset" value="Poništi" name="resetbtn">Poništi</button>
<button type="submit" value="Update" name="updatebtn">Promijeni</button>
<button type="submit" value="Izbriši" name="deletebtn">Izbriši </button>
</div></form>';

}
echo '</section>';


include 'includes/mainclose.html';
include 'includes/overall_footer.php';

if(isset($_POST['deletebtn'])) {
    $id=$_POST['id'];
    $query="DELETE FROM članci WHERE id=$id";
    $result = mysqli_query($dbc,$query);

}
if(isset($_POST['updatebtn'])) {
    $id=$_POST['id'];
    $date=date("H:i d.m.Y");
    $title=$_POST['articleTitle'];
    $kratkisad=$_POST['articleSummary'];
    $sadrzaj=$_POST['articleFull'];
    $kategorija=$_POST['articleCat'];
    $slika =$_FILES['articleFig']['name'];
    $opis_slike=$_POST['opis_slike'];
    if (isset($_POST['articleIzborNe']))
     $arhiva=1;
    else 
        $arhiva=0;
    
    if (!file_exists('assets/images/'.$slika)){
        $target_dir = 'assets/images/'.$slika;
        move_uploaded_file($_FILES["articleFig"]["tmp_name"], $target_dir);
    }

    $query="UPDATE članci SET naslov='$title', sazetak='$kratkisad', tekst='$sadrzaj',slika='$slika',kategorija='$kategorija',arhiva='$arhiva',opis_slike='$opis_slike',datum_izmjene='$date' WHERE id=$id";
    $result=mysqli_query($dbc,$query);
    If($result) {
        echo "success";

    }else 
    echo mysqli_error($dbc);
    
   

}

mysqli_close($dbc);
}
elseif (logged_in() && !is_admin()) {
    echo 'Pozdrav '.$_SESSION['ime']. 'Nemate pristup ovoj stranici!';
}
else {
    echo "Niste prijavljeni, prijavite se ili se registrirajte.";
    echo '<a href="registracija.php">Registracija</a>';
    echo '<a href="prijava.php">Prijava</a>';   

}

    
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="script/validator.js"></script>