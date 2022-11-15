<!DOCTYPE html>

<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <title> Admin View </title>
        <link rel="stylesheet" href="styles.css">
    </head> 
    <body>
        <div class="fixed-header">
            <div class="container">
                <header>
                    <div class="menu">
                        <b class="homebutton"><a href="index.php"><u style="color: rgb(198, 32, 38);">Home</u></a></b>
                        <ul>
                            <li><a href="products.php">PRODUCTS</a></li>
                            <li><a href="sellers.php">SELLERS</a></li>
                            <li><a href="orders.php">ORDERS</a></li>
                            <li><a href=""><u>Sign In</u></a></li>
                            <li><a href=""><u>My Cart</u></a></li>
                        </ul>
                    </div>
                </header>
            </div>
            <hr>
        </div>

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

require "connect_db.php";
$q = "SELECT * FROM t6_seller";
$r = mysqli_query($dbc, $q);
if ($r) {

    echo "
                        <table border=1>
                            <tr>
                                <th>ID</th>
                                <th>Books Sold</th>
                                <th>Average Rating</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Current Rating</th>
                                <th>Comment</th>
                                <th>Status</th>
                            </tr>
        ";



    while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
        echo "<tr>" . "<td>" . $row[0] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>";
        echo "<td style = 'word-wrap: break-word;'>" . $row[4] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[5] . "</td>";
        echo "<td style = 'word-wrap: break-word;'>" . $row[6] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[7] . "</td>";
        //echo "<td>" . $row[8] . "</td>";
    }

    echo "</table>";
}


?>
            </div>
        </header>
    </main>
    </body>
    <footer>
		<br>
		<small>(C) A Riotto, 2022</small>
    </footer>
</html>