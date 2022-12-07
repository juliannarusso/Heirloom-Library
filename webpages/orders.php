<!DOCTYPE html>

<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <title> Orders View </title>
        <link rel="stylesheet" href="orderstylesheet.css">
    </head> 
    <body>
        <?php 
        session_start();
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

    if (ISSET($_POST['sort']) && !ISSET($_POST['sortby'])) {
        $q = "SELECT * FROM t6_order ORDER BY " . $_POST['sort'];
        displaytable($q);
    } else if (ISSET($_POST['sort']) && ISSET($_POST['sortby'])) {
        $q = "SELECT * FROM t6_order ORDER BY " . $_POST['sort'] . " " . $_POST['sortby'];
        displaytable($q);
    } 

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $q = "SELECT * FROM t6_order";
        $r = mysqli_query($dbc, $q);
        if ($r) {

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
        }
    }
    

    

    echo "<br><div class='sortoptions'>";
    echo "<center><form action='' method='POST'>";
    echo "<input type='submit' name='sort' value='Sort By'>";
    echo "<input class='sortradiobuttons' type = 'radio' name = 'sort' value = 'book_id'>";
    echo "<label>Book ID</label>";
    echo "<input class='sortradiobuttons' type = 'radio' name = 'sort' value = 'cus_id'>";
    echo "<label>Customer ID</label>";
    echo "<input class='sortradiobuttons' type = 'radio' name = 'sort' value = 'order_date'>";
    echo "<label>Order Date</label>";
    echo "<input class='sortradiobuttons' type = 'radio' name = 'sort' value = 'total_price'>";
    echo "<label>Total Price</label>";
    echo "<input class='sortradiobuttons' type = 'radio' name = 'sort' value = 'qty'>";
    echo "<label>Quantity</label>";
    echo "<input class='sortradiobuttons' type = 'radio' name = 'sort' value = 'status'>";
    echo "<label>Status</label>";
    echo "</center>";
    echo "<br><center>";
    echo "<input class='sortradiobuttons' type = 'radio' name = 'sortby' value = 'ASC'>";
    echo "<label>Ascending</label>";
    echo "<input class='sortradiobuttons' type = 'radio' name = 'sortby' value = 'DESC'>";
    echo "<label>Descending</label>";
    echo "</form>";
    echo "</div>";


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

    function displaytable ($q) {
        require "../connect_db.php";
        $r = mysqli_query($dbc, $q);
        if ($r) {

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
