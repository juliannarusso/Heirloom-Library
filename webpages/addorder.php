<?php
    echo "<head>
    <meta charset='utf-8'>
    <title> Add an Order </title>
    </head>";

    include "header.php";
    define("FILE_AUTHOR", "M. Ong");
    include "error_handler.php";
    require "../connect_db.php";
    require "../usercheck.php";

    if (isADMIN) {
        echo "
    <form style = 'margin-left: auto; margin-right: auto;' action = '' method = 'POST'>" . "
    <br><table style='border:0px solid black;margin-left:auto;margin-right:auto; width: 45%;'>
        <tr>
            <td style = 'color: rgb(222, 62, 91);'>Required fields are indicated by \"<em style = 'color: red;'>*</em>\"</td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
            <td><input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' placeholder = 'Book ID' name = 'bookid'><em style = 'color: red;'>*</em></td>
            <td><input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' placeholder = 'Customer ID' name = 'cusid'><em style = 'color: red;'>*</em></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
        <td style = 'color: rgb(222, 62, 91);'>Price: <input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' min='0.00' max ='10000.00' step = '0.01'; placeholder = '0.00' name = 'price'></td>
        <td style = 'color: rgb(222, 62, 91);'>Date: <input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'date' placeholder = 'Date' name = 'orddate'></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
        <td style = 'color: rgb(222, 62, 91);'>Quantity: <input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' min='1' max='1000' step='1' placeholder = '1' name = 'qty'></td>
        <td><input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'text' placeholder = 'Status' name = 'status'></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
        <td><p><button style = 'background: rgb(192, 62, 91);
        border-color: rgb(192, 62, 91);
        width: 3cm;
        height: 40px;
        color: #fff;
        letter-spacing: 1px;
        margin-right: auto; margin-left: auto;' type = 'submit'>Add Order</button></td>
        </tr>
        </form>";
    
    if (ISSET($_POST['bookid']) && $_POST['bookid'] != "") {
        $bookid = $_POST['bookid'];
    } else {
        $error_message = "Please input all required fields.";
    }
    
    if (ISSET($_POST['cusid']) && $_POST['cusid'] != "") {
        $cusid = $_POST['cusid'];
    } else {
        $error_message = "Please input all required fields.";
    }

    if (ISSET($_POST['price']) && $_POST['price'] != "") {
        $price = $_POST['price'];
    } else {
        $price = "NULL";
    }

    if (ISSET($_POST['orddate']) && $_POST['orddate'] != "") {
        $orddate = $_POST['orddate'];
    } else {
        $orddate = "2020-01-01";
    }

    if (ISSET($_POST['qty']) && $_POST['qty'] != "") {
        $qty = $_POST['qty'];
    } else {
        $qty = "NULL";
    }

    if (ISSET($_POST['status']) && $_POST['status'] != "") {
        $status = $_POST['status'];
    } else {
        $status = "Active";
    }

    

    if ($_SERVER['REQUEST_METHOD'] == "POST" && ISSET($error_message)) {
        echo "<tr><td><b style = 'color: red;'>$error_message</b></td></tr></table>";
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //?echo "<br><br>VALUES (" . $bookid . ", " . $cusid . ", " . $price . ", " . $orddate . ", " . $qty . ", " . $status . ")";
        echo "<tr><td style = 'padding-top: 15px;'></td></tr>";
        $q = "INSERT INTO t6_order VALUES (" . $bookid . ", " . $cusid . ", " . "\"" . $orddate . "\"". ", " . $price . ", " . $qty . ", " . "\"" . $status . "\"" .  ")";
        //echo $q;

        $r = mysqli_query($dbc, $q);
        if ($r) {
            echo "<tr><td><b style = 'color: green;'>Successfully added manual order.</b></td></tr></table>";
        } else {
            echo "<tr><td><b style = 'color: red;'>Error adding new order: Please check inputs.</b></td></tr>";
            //echo "<tr><td><b style = 'color: red;'>" . mysqli_error($dbc) . "</b></td></tr>";
            if (null !== mysqli_error($dbc)) {
                if (mysqli_error($dbc) == "Cannot add or update a child row: a foreign key constraint fails") {
                    echo "<tr><td><b style = 'color: red;'>The input Book ID or Customer ID does not exist.</b></td></tr>";
                }
            }
        }
    }

    echo "</table>";
    }
    
    
    
    
    include "footer.php";
    
    # END OF FILE
    