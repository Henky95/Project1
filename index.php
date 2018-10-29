<?php include "shared/Header.php"; ?>

    <div class="row">
        <!--    <div class="side">-->
        <!--        <h2>About us</h2>-->
        <!--        <h5>Our icon:</h5>-->
        <!--        <div class="fakeimg" style="height:200px;">ICON</div>-->
        <!--        <p>This site is made to help students help students</p>-->
        <!--        <h3>Contact Info</h3>-->
        <!--        <p>our Email: something@something.nl</p>-->
        <!---->
        <!--    </div>-->
        <div class="main">


            <?php
            include 'functions.php';

            $table = Query("SELECT * FROM mydb.services");

            if (mysqli_num_rows($table) > 0) {
                while ($row = mysqli_fetch_assoc($table)) {

                    $user = mysqli_fetch_assoc(Query('select * from mydb.users where Id =' . $row['Users_Id']));

                    echo '<h2>' . $row['Title'] . '</h2>';
                    echo '<hr/>';

                    if ($row['IsRequest']) {
                        echo '<h5> Aangevraagd';
                    } else {
                        echo '<h5> Aangeboden';
                    }

                    echo ' door ' . $user['FirstName'] . ' ' . $user['Insertion'] . ' ' . $user['LastName'] .'</h5>';

                    echo '<p>' . nl2br($row['Description']) . '</p>';
                    echo '<p>' . nl2br($row['ReturnService']) . '</p>';
                }
            }
            ?>

<!--            <h2>TITLE HEADING</h2>-->
<!--            <h5>Title description, oktober 1, 2018</h5>-->
<!--            <div class="fakeimg" style="height:200px;">Image</div>-->
<!--            <p>Some text..</p>-->
<!--            <p>Some more text.</p>-->
<!--            <br>-->
<!--            <h2>TITLE HEADING</h2>-->
<!--            <h5>Title description, oktober 2, 2018</h5>-->
<!--            <div class="fakeimg" style="height:200px;">Image</div>-->
<!--            <p>Some text..</p>-->
<!--            <p>Some more text.</p>-->
        </div>
    </div>


<?php include "Shared/Footer.html"; ?>