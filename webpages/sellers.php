<!DOCTYPE html>

<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <title> Sellers View </title>
        <link rel="stylesheet" href="styles.css">
        <style>
            .wrapText td {
                word-wrap: break-word;
            }
        </style>
    </head>
    <body>
        
    <?php include "usercheck.php"; include "header.php"; ?>

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
        <header>
            <h4 style = "text-align: center; color: rgb(198, 32, 38);"><u>Our Sellers</u></h4>
  
        <div class = "options">

<?php
    $q = "SELECT * FROM t6_seller";
    $r = mysqli_query($dbc, $q);
    if ($r) {

        echo "<div class='wrapText'>";
        echo "<table border=1>
                <tr>
                    <th>ID</th>
                    <th>Books Sold</th>
                    <th>Average Rating</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Current Rating</th>
                    <th>Comment</th>
                    <th>Status</th>
                </tr>";
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>" . "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>";
            echo "<td>" . $row[4] . "</td>" . "<td>" . $row[5] . "</td>";
            echo "<td>" . $row[6] . "</td>" . "<td>" . $row[7] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

        if ($isEmployeeAdmin) {
            echo "hello";
        }


        
    }


    // if (ISSET($_SESSION['login_status'])) {
    //     $login_status = "LOGGED IN";

    //     $q = "SELECT user_rank FROM t6_user WHERE username = \"" . $active_user . "\"";
    //     echo $q;
    //     $r = mysqli_query($dbc, $q);

    //     if ($r) {
    //         while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
    //             if ($row[0] == "Admin" || $row[0] == "Employee") {
    //                 echo "<br><h4 style = 'text-align: center; text-decoration: none;'><a href='addorder.php'><u style = 'color: rgb(198, 32, 38); font-size: 17px;'>Manually Add an Order</u></a></h4>";
    //             }
    //         }
    //     }
    // }


?>
            </div>
        </div>
        </header>
    </main>
        <footer>
            <?php
            define("FILE_AUTHOR", "A. Riotto");
            include "footer.php";
            ?>
        </footer>
    </body>
    
</html>
