<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Our Products </title>
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
                padding: 6px;
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
        <?php session_start(); include "header.php"; ?>
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

    if (isset($_POST['counter'])) { $counter = $_POST['counter']; }
            # ----- First load: set the counter to 1 ----- #
            if ($_SERVER['REQUEST_METHOD'] == "GET" && ISSET($_COOKIE['counter'])) {
                $counter = $_COOKIE['counter'];
            } else {
                $counter += 1;
                setcookie("counter", $counter);
            }
    if (ISSET($_SESSION['active_user'])) {
        $active_user = $_SESSION['active_user'];
        //echo "Active User: " . $active_user;
    }
    require "../connect_db.php";
    if (ISSET($_GET['searchcontent'])) {$searchdata = $_GET['searchcontent'];}

    //!Use this to select from the book listing.
    //echo $searchdata;
    
    if (ISSET($searchdata)) {

        echo "<div class = 'options'> <table>";

        echo "</div>";

        $q = "SELECT * FROM t6_product WHERE title LIKE \"%" . $searchdata . "%\"";
        $r = mysqli_query($dbc, $q);
        //echo $q;

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
                    <th>Status</th>
                    <th>Seller ID</th>
                </tr>
            ";
        
        
        
            while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                echo "<tr>" . "<td>" . $row[0] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>";
                echo "<td style = 'word-wrap: break-word;'>" . $row[4] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[5] . "</td>";
                echo "<td style = 'word-wrap: break-word;'>" . $row[6] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[7] . "</td>";
                echo "<td>" . $row[8] . "</td>";

                if (ISSET($_POST[$row[0]])) {
                    $bookid_ordered = $row[1];
                    $orders[$counter] = $bookid_ordered;
                    //echo "<td>$active_user</td>";
                    $count = $_COOKIE["counter"];
                    setcookie($active_user . "_cart_$count", $bookid_ordered);
                    $order = $_COOKIE["cart"];
                    //echo $count;
                } 
            }
        
            echo "</table>";
            echo "<br>";
            echo "<br>";
        }
    } 


    else 
    {
        echo "<div class = 'options'> <table>";
    
        echo "</div>";

        #Form Data Checking

        if (isset($_POST['sort'])) { $sortInput = " ORDER BY " . $_POST['sort']; } else { $sortInput = " ORDER BY sell_id"; }
        if (isset($_POST['direction'])) { $directionInput = " " . $_POST['direction']; } else { $directionInput = " ASC";}

        $q = "SELECT * FROM t6_product" . $sortInput . $directionInput;
        $r = mysqli_query($dbc, $q);
        if ($r) 
        {
        
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
                    <th>Status</th>
                    <th>Seller ID</th>
                </tr>
            ";
        
        
        
            while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) 
            {
                echo "<tr>" . "<td>" . $row[0] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>";
                echo "<td style = 'word-wrap: break-word;'>" . $row[4] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[5] . "</td>";
                echo "<td style = 'word-wrap: break-word;'>" . $row[6] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[8] . "</td>";
                echo "<td>" . $row[7] . "</td>";

                if (ISSET($_POST[$row[0]])) {
                    $bookid_ordered = $row[1];
                    $orders[$counter] = $bookid_ordered;
                    //echo "<td>$active_user</td>";
                    $count = $_COOKIE["counter"];
                    setcookie($active_user . "_cart_$count", $bookid_ordered);
                    $order = $_COOKIE["cart"];
                    //echo $count;
                } 
            }
        
            echo "</table>";
            echo "<br>";
            echo "<br>";
        }
    }


    echo "</div>";
    echo "<br><h4 style = 'text-align: center; text-decoration: none;'><a href='addproduct.php'><u style = 'color: rgb(198, 32, 38); font-size: 17px;'>Manually Add an Order</u></a></h4>";
    echo "</div>";


    // sorting the table
    if (ISSET($_SESSION['login_status'])) 
    {
        #HTML FORMS
        echo "<br><br><br>";
        echo "<form action='' method='POST'>";
        echo "<input type = 'radio' name = 'sort' value = 'book_isbn' checked> ISBN";

        if ($sortInput == " ORDER BY book_id") { echo "<input type = 'radio' name = 'sort' value = 'book_id' checked> ID"; } else { echo "<input type = 'radio' name = 'sort' value = 'book_id'> ID";}
        if ($sortInput == " ORDER BY title") { echo "<input type = 'radio' name = 'sort' value = 'title' checked> Title"; } else { echo "<input type = 'radio' name = 'sort' value = 'title'> Title";}
        if ($sortInput == " ORDER BY book_price") { echo "<input type = 'radio' name = 'sort' value = 'book_price' checked> Price"; } else { echo "<input type = 'radio' name = 'sort' value = 'book_price'> Price";}
        if ($sortInput == " ORDER BY book_condition") { echo "<input type = 'radio' name = 'sort' value = 'book_condition' checked> Book Condition"; } else { echo "<input type = 'radio' name = 'sort' value = 'book_condition'> Book Condition";}
        if ($sortInput == " ORDER BY copyright") { echo "<input type = 'radio' name = 'sort' value = 'copyright' checked> Copyright"; } else { echo "<input type = 'radio' name = 'sort' value = 'copyright'> Copyright";}
        if ($sortInput == " ORDER BY inv_date") { echo "<input type = 'radio' name = 'sort' value = 'inv_date' checked> Inventory Date"; } else { echo "<input type = 'radio' name = 'sort' value = 'inv_date'> Inventory Date";}
        if ($sortInput == " ORDER BY status") { echo "<input type = 'radio' name = 'sort' value = 'status' checked> Status"; } else { echo "<input type = 'radio' name = 'sort' value = 'status'> Status";}
        if ($sortInput == " ORDER BY sell_id") { echo "<input type = 'radio' name = 'sort' value = 'sell_id' checked> Seller ID"; } else { echo "<input type = 'radio' name = 'sort' value = 'sell_id'> Seller ID";}
        echo "<br><input type='radio' name='direction' value='ASC' checked>	Ascending";
        if ($directionInput == " DESC") { echo "<input type = 'radio' name = 'direction' value = 'DESC' checked> Descending"; } else { echo "<input type = 'radio' name = 'direction' value = 'DESC'> Descending";}
        echo "<br><input type='submit' value='Sort It!' >";
        echo "</form>";
    }

    echo "<br><br><br><br><br>";

    

?>

<?php
    define("FILE_AUTHOR", "A. O'Leary");
    include "footer.php";
?>