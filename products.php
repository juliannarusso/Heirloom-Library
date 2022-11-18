<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Our Products </title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php include "header.php"; ?>
    </body>
    <div class="container">
    	    <main>
                <table>
                    <tr>
                        <!--Image and title-->
                        <th style="padding-top: 0.5cm; padding-bottom: 0.5cm;">
                            <img src="https://media.discordapp.net/attachments/475843835990114315/1023274755417182279/unknown.png"
                                alt="" width="150" height="150">
                        </th>
                        <th style="color: rgb(198, 32, 38); font-size: 25px; padding-top: 0.5cm; padding-bottom: 0.5cm;">
                            Online Bookstore For College Textbooks
                        </th>
                    </tr>
                </table>
                <h3 style="color: rgb(198, 32, 38)"><center> Our Products: </center></h3>
            </main>
    </div>
</html>
<?php

    echo "<div class = 'options'> <table>";
    // connecting to mysql database
    REQUIRE "connect_db.php";

    // Printing each row in the sql table courses
    echo "</div>";

    $q = "SELECT * FROM t6_product";
    $r = mysqli_query($dbc, $q);
    if ($r) {
    
        echo "
            <table border=1>
            <tr>
                <th>ISBN</th>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Copyright</th>
                <th>Inventory Date</th>
                <th>Seller ID</th>
                <th>Status</th>
            </tr>
        ";
    
    
    
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
            echo "<tr>" . "<td>" . $row[0] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>";
            echo "<td style = 'word-wrap: break-word;'>" . $row[4] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[5] . "</td>";
            echo "<td style = 'word-wrap: break-word;'>" . $row[6] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[7] . "</td>";
            echo "<td>" . $row[8] . "</td>";
        }
    
        echo "</table>";
        echo "<br>";
        echo "<br>";
    }

?>

<?php
    define("FILE_AUTHOR", "A. O'Leary");
    include "footer.php";
?>
