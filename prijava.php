<?php 
    require 'sesija.php';
    include 'connect.php';
    include 'includes/overall_header.php';
    include 'includes/mainopen.html';
if(!logged_in()) {
?>
    <section class="flex-container2" id="prijava">
        <h2>Prijava</h2>
        <form action="" name="prijava" method="post">
            <label for="username">Korisničko ime:</label>
            <input id="username" type="text" name="username" /><br>
           
            <label for="lozinka">Lozinka:</label>
            <input id="lozinka" type="password" name="lozinka" /><br>
            <button name="submit" type="submit" id="gumb">Prijava</button>
        </form>
    </section>

<?php

if(isset($_POST['submit'])) {
    $username= $_POST['username'];
    $lozinka=$_POST['lozinka'];
    $stmt=mysqli_stmt_init($dbc);

    $query="SELECT ime,prezime,lozinka,razina FROM korisnik Where korisničko_ime=?";

            if(mysqli_stmt_prepare($stmt,$query)) {
                mysqli_stmt_bind_param($stmt,'s',$username);
                $result =mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if($result && mysqli_stmt_num_rows($stmt)>0) {
                    mysqli_stmt_bind_result($stmt, $ime, $prezime,$blozinka,$razina);
                    mysqli_stmt_fetch($stmt);
                    if(password_verify($lozinka,$blozinka)) {
                        $_SESSION['username']=$username;
                        $_SESSION['razina']=$razina;
                        $_SESSION['logged_in']=1;
                        $_SESSION['ime']=$ime;
                        $_SESSION['prezime']=$prezime;
                       echo "Dobro došli $username. <a href='ucp.php'>Nastavite dalje u izbornik.</a>";
                       

                    }else
                        echo 'Unijeli ste pogrešno korisničko ime ili lozinku <a href="registracija.php">Ovdje se registrirajte.</a>';
                }else
                echo 'Unijeli ste pogrešno korisničko ime ili lozinku <a href="registracija.php">Ovdje se registrirajte.</a>';
               
            }else
            echo 'Neuspješno. ',mysqli_error($dbc);

        }
        mysqli_close($dbc);
}
else 
echo "Već ste prijavljeni!";
include 'includes/mainclose.html';
include 'includes/overall_footer.php';
?>