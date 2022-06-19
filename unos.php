<?php  
require 'sesija.php';
include 'includes/overall_header.php';
include 'includes/mainopen.html';
if (is_admin()) {
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="script/validator.js"></script>
<section  class="flex-container2" id="unoss">
    <h2>Unos novog članka</h2>
 <form name="Unos" enctype="multipart/form-data" action="script/skripta.php" method="POST">
    <label for="articleTitle">Naslov Vijesti </label>
    <input type="text" maxlength="30" required name="articleTitle" autofocus/>
    <label for="articleSummary">Kratki sadržaj vijesti (do 100 znakova)</label>
    <textarea cols="30" rows="5" name="articleSummary" maxlength="100" > </textarea>
    <label for="articleFull">Puni sadržaj vijesti:</label>
    <textarea cols="50" rows="20" name="articleFull" ></textarea>
    <label for="articleCat">Kategorija Članka:</label>
    <select name="articleCat"> 
      <option value="" selected disabled >Odabir Kategorije</option>
        <option value="Politika">Politika</option>
        <option value="Sport">Sport</option>
    </select>
    <label for="articleFig">Slika Članka:</label>
    <input name="articleFig" type="file"  accept="image/*" data-msg-accept="Samo slike se mogu odabrati." /> 
    <label for="opis_slike">Opis slike:</label>
        <input type="text" maxlength="100" name="opis_slike" />
    
    <label for="articleIzbor">Spremiti u Arhivu?</label>
    <label for="izborne">
        <input name="articleIzborNe" type="checkbox" value="Arhiva"/>Arhiva
    </label>
    <div>
    <button type="reset" value="Poništi" name="resetbtn">Poništi</button>
    <button type="submit" value="Prihvati" name="submitbtn" >Pošalji</button>
    </div>
</form>

</section>

<?php 
}
elseif (logged_in() && !is_admin()) {
    echo 'Pozdrav '.$_SESSION['ime']. 'Nemate pristup ovoj stranici!';
}
else {
    echo "Niste prijavljeni, prijavite se ili se registrirajte.";
    echo '<a href="registracija.php">Registracija</a>';
    echo '<a href="prijava.php">Prijava</a>';   

}
include 'includes/mainclose.html';



include 'includes/overall_footer.php';

?>