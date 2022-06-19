<?php 
    require 'sesija.php';
    include 'connect.php';
    include 'includes/overall_header.php';
    include 'includes/mainopen.html';
if(!logged_in()) {
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="script/validation.js"></script>
    <section class="flex-container2" id="prijava">
        <h2>Registracija</h2>
        <form action="" name="registracija" method="post">
            <label for="username">Korisničko ime:</label>
            <input id="username" type="text" name="username" /><br>
            <label for="ime">Ime:</label>
            <input id="ime" type="text" name="ime"/><br>
            <label for="prezime">Prezime:</label>
            <input id="prezime" type="text" name="prezime"  /><br>
            <label for="lozinka">Lozinka:</label>
            <input id="lozinka" type="password" name="lozinka" /><br>
            <label for="lozinka2">Ponovljena Lozinka:</label>
            <input id="lozinka2" type="password" name="lozinka2" /><br>
            <label for="adminn">Admin?</label>
            <label for="admin">
                   <input name="admin" type="checkbox" value="1"/>Da
            </label>
            <button name="submit" type="submit" id="gumb">Pošalji</button>
        </form>
    </section>

<?php

    if(isset($_POST['submit'])) {
        $name=$_POST['ime'];
        $username= $_POST['username'];
        $prezime=$_POST['prezime'];
        $lozinka=$_POST['lozinka'];
        $hlozinka=password_hash($lozinka,CRYPT_BLOWFISH);
       
      
        if (isset($_POST['admin']))
            $razina=1;
        else 
            $razina=0;
        $query="INSERT INTO korisnik (ime,prezime,korisničko_ime,lozinka,razina) VALUES (?, ?, ?, ?, ?)";
        $stmt=mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $query)){ 
            mysqli_stmt_bind_param($stmt,'ssssi',$name,$prezime,$username,$hlozinka,$razina);
            if(mysqli_stmt_execute($stmt))
                echo 'Registracija je uspješna. Možete se <a href="prijava.php">prijaviti.</a>'; 
            else 
                echo "Neuspješna registracija.";
            }
        }
        mysqli_close($dbc);
}
else 
echo "Već ste prijavljeni!";
include 'includes/mainclose.html';
include 'includes/overall_footer.php';
?>