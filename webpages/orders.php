<!DOCTYPE html>

<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <title> Orders View </title>
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
                width: 20.5cm;
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
        <?php 
        include "usercheck.php";
        require "../connect_db.php";
        include "header.php";
        include "error_handler.php";
        define ("FILE_AUTHOR", "M. Ong");
        ?>

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
            <h4 style = "text-align: center; color: rgb(198, 32, 38);"><u>Current Orders</u></h4>
  
        <div class = "options">

<?php

    #Form Data Checking

    if (isset($_POST['sort'])) { $sortInput = " ORDER BY " . $_POST['sort']; } else { $sortInput = " ORDER BY book_id"; }
    if (isset($_POST['direction'])) { $directionInput = " " . $_POST['direction']; } else { $directionInput = " ASC";}

        $q = "SELECT * FROM t6_order" . $sortInput . $directionInput;
        $r = mysqli_query($dbc, $q);
        if ($r) {

            echo "<div class='wrapText'>";
            echo "
                                <table border=1>
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Customer ID</th>
                                        <th>Order Date</th>
                                        <th>Total Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                    </tr>
                ";



            while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                echo "<tr>" . "<td>" . $row[0] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>";
                echo "<td style = 'word-wrap: break-word;'>" . $row[4] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[5] . "</td>";
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
            echo "<input type = 'radio' name = 'sort' value = 'book_id' checked> Book ID";
            if ($sortInput == " ORDER BY cus_id") { echo "<input type = 'radio' name = 'sort' value = 'cus_id' checked> Customer ID"; } else { echo "<input type = 'radio' name = 'sort' value = 'cus_id'> Customer ID";}
            if ($sortInput == " ORDER BY order_date") { echo "<input type = 'radio' name = 'sort' value = 'order_date' checked> Order Date"; } else { echo "<input type = 'radio' name = 'sort' value = 'order_date'> Order Date";}
            if ($sortInput == " ORDER BY total_price") { echo "<input type = 'radio' name = 'sort' value = 'total_price' checked> Total Price"; } else { echo "<input type = 'radio' name = 'sort' value = 'total_price'> Total Price";}
            if ($sortInput == " ORDER BY qty") { echo "<input type = 'radio' name = 'sort' value = 'qty' checked> Quantity"; } else { echo "<input type = 'radio' name = 'sort' value = 'qty'> Quantity";}
            if ($sortInput == " ORDER BY status") { echo "<input type = 'radio' name = 'sort' value = 'status' checked> Status"; } else { echo "<input type = 'radio' name = 'sort' value = 'status'> Status";}
            echo "<br><input type='radio' name='direction' value='ASC' checked>	Ascending";
            if ($directionInput == " DESC") { echo "<input type = 'radio' name = 'direction' value = 'DESC' checked> Descending"; } else { echo "<input type = 'radio' name = 'direction' value = 'DESC'> Descending";}
            echo "<br><input type='submit' value='Sort It!' >";
            echo "</form>";
        }


    if (ISSET($_SESSION['active_user'])) {
        $active_user = $_SESSION['active_user'];
    }
    if (ISSET($_SESSION['login_status'])) {
        $login_status = "LOGGED IN";

        $q = "SELECT user_rank FROM t6_user WHERE username = \"" . $active_user . "\"";
        // echo $q;
        $r = mysqli_query($dbc, $q);

        if ($r) {
            while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                if ($row[0] == "Admin" || $row[0] == "Employee") {
                    echo "<br><h4 style = 'text-align: center; text-decoration: none;'><a href='addorder.php'><u style = 'color: rgb(198, 32, 38); font-size: 17px;'>Manually Add an Order</u></a></h4>";
                }
            }
        }
    }

?>
            </div>
        </div>
            <?php echo "<br><br>"; include "footer.php"; ?>
        </header>
    </main>
    </body>
</html>
