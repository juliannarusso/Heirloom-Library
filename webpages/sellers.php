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

            form, input[type=radio] {
                border-radius: 1cm;
                color:whitesmoke;
                background-color: indianred;
                justify-content: center;
                margin: 0 auto;
                font-weight: bold;
                padding:6px;
                align-items: center;
            }

            input[type='submit'] {
                border-radius: 1cm;
                border-color: crimson;
                background-color: crimson;
                font-weight: bolder;
                color:whitesmoke;
                margin-left: 10px;
                padding-right: 15px;
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

    #Form Data Checking

    if (isset($_POST['sort'])) { $sortInput = " ORDER BY " . $_POST['sort']; } else { $sortInput = " ORDER BY sell_id"; }
    if (isset($_POST['direction'])) { $directionInput = " " . $_POST['direction']; } else { $directionInput = " ASC";}

    #Table Query
    $q = "SELECT * FROM t6_seller" . $sortInput . $directionInput;
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
        
    }

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


    if ($isEmployeeAdmin) {
        #HTML FORMS
        echo "<br><br><br>";
        echo "<form action='' method='POST'>";
        echo "<input type = 'radio' name = 'sort' value = 'sell_id' checked> Id";
        if ($sortInput == " ORDER BY num_books_sold") { echo "<input type = 'radio' name = 'sort' value = 'num_books_sold' checked> Books Sold"; } else { echo "<input type = 'radio' name = 'sort' value = 'num_books_sold'> Books Sold";}
        if ($sortInput == " ORDER BY avg_rating") { echo "<input type = 'radio' name = 'sort' value = 'avg_rating' checked> Average Rating"; } else { echo "<input type = 'radio' name = 'sort' value = 'avg_rating'> Average Rating";}
        if ($sortInput == " ORDER BY phone") { echo "<input type = 'radio' name = 'sort' value = 'phone' checked> Phone Number"; } else { echo "<input type = 'radio' name = 'sort' value = 'phone'> Phone Number";}
        if ($sortInput == " ORDER BY address") { echo "<input type = 'radio' name = 'sort' value = 'address' checked> Address"; } else { echo "<input type = 'radio' name = 'sort' value = 'address'> Address";}
        if ($sortInput == " ORDER BY rating") { echo "<input type = 'radio' name = 'sort' value = 'rating' checked> Current Rating"; } else { echo "<input type = 'radio' name = 'sort' value = 'rating'> Current Rating";}
        if ($sortInput == " ORDER BY comments") { echo "<input type = 'radio' name = 'sort' value = 'comments' checked> Comment"; } else { echo "<input type = 'radio' name = 'sort' value = 'comments'> Comment";}
        if ($sortInput == " ORDER BY status") { echo "<input type = 'radio' name = 'sort' value = 'status' checked> Status"; } else { echo "<input type = 'radio' name = 'sort' value = 'status'> Status";}
        echo "<br><input type='radio' name='direction' value='ASC' checked>	Ascending";
        if ($directionInput == " DESC") { echo "<input type = 'radio' name = 'direction' value = 'DESC' checked> Descending"; } else { echo "<input type = 'radio' name = 'direction' value = 'DESC'> Descending";}
        echo "<br><input type='submit' value='Sort It!' >";
        echo "</form>";

        echo "<p><p>";
    } else {
        echo "<p>";
    }

?>
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
