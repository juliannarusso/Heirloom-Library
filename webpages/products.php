<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Our Products </title>
        <link rel="stylesheet" href="styles.css">
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
    $counter = NULL;
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
                    <th>Seller ID</th>
                    <th>Status</th>
                    <th>Purchase</th>
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
    
                if (ISSET($_SESSION['login_status'])) {
                    $login_status = "LOGGED IN";
                    echo "<td>";
                    echo "<form action='' method='POST'>";
                    echo "<input style = 'width: 10%; padding-right: 2.185cm; color: white; background-color: rgb(222, 62, 91);' type='submit' name='" . $row[0] . "' value='Add to Cart'>";
                    echo "<br> <input type='hidden' name='counter' value='$counter'>";
                    echo "</form>";
                    echo "</td>";
                } else { 
                    echo "<td>Log in to Purchase</td>";
                }
            }
        
            echo "</table>";
            echo "<br>";
            echo "<br>";
        }
    } else {
        echo "<div class = 'options'> <table>";
    
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
                <th>Purchase</th>
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

            if (ISSET($_SESSION['login_status'])) {
                $login_status = "LOGGED IN";
                echo "<td>";
                echo "<form action='' method='POST'>";
                echo "<input style = 'width: 10%; padding-right: 2.185cm; color: white; background-color: rgb(222, 62, 91);' type='submit' name='" . $row[0] . "' value='Add to Cart'>";
                echo "<br> <input type='hidden' name='counter' value='$counter'>";
                echo "</form>";
                echo "</td>";
            } else { 
                echo "<td>Log in to Purchase</td>";
            }
        }
    
        echo "</table>";
        echo "<br>";
        echo "<br>";
        }
    }

    

?>

<?php
    define("FILE_AUTHOR", "A. O'Leary");
    include "footer.php";
?>
