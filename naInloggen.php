<?php
    if ($_POST["accountnaam"] == "admin") {?>
        <form action="adminInlog.php" method="post">
            Wil je inloggen als admin? <br>
            <input type="radio" name="admin" value="welAdmin"> Ja <br>
            <input type="radio" name="admin" value="geenAdmin"> Nee <br>
            <input type="submit" value="Submit"><br>
        </form>
<?php } else { 
                echo "Welkom ".$_POST["accountnaam"];
            }

?>