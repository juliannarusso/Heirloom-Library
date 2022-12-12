<?php
    echo "<head>
    <meta charset='utf-8'>
    <title> Add a Supplier </title>
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
            <td><input style = 'width: 200px; border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' placeholder = 'Seller ID' name = 'seller_id' required><em style = 'color: red;'>*</em></td>
            <td><input style = 'width: 200px; border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' placeholder = 'Number of Books Sold' name = 'number_books_sold'></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
            <td><input style = 'width: 200px; border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' min = '1' max = '10' placeholder = 'Average Rating' name = 'average_rating' required><em style = 'color: red;'>*</em></td>
            <td><input style = 'width: 200px; border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'text' minlength = '8' maxlength = '8' placeholder = 'Phone Number' name = 'phone_number' required><em style = 'color: red;'>*</em></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
            <td><input style = 'width: 200px; border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'text' maxlength = '45' placeholder = 'Address' name = 'address'></td>
            <td><input style = 'width: 200px; border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'text' min = '1' max = '10' placeholder = 'Current Rating' name = 'current_rating' required><em style = 'color: red;'>*</em></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
            <td><input style = 'width: 200px; border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'text' placeholder = 'Comments' name = 'comment'></td>
            <td><div style = 'color: rgb(222, 62, 91);'>Status: </div><select style = 'width: 200px; border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' placeholder = 'Status' name = 'status' required><option value='Active'> Active</option><option value='Deleted'> Deleted</option></select><em style = 'color: red;'>*</em></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
        <td><p><button style = 'background: rgb(192, 62, 91);
        border-color: rgb(192, 62, 91);
        width: 3cm;
        height: 40px;
        color: #fff;
        letter-spacing: 1px;
        margin-right: auto; margin-left: auto;' type = 'submit'>Add Seller</button></td>
        </tr>
        </form>";
    

        # INPUT BOOLEANS FOR OPTIONAL INPUT
    $given_nbk = false;
    $given_adr = false;
    $given_com = false;
    
        # HTML FORM INPUT CHECKING      -->      --      --      --      --      --      --      --      --      --      --      --      --      --      --      --      --     --      --      --  # HTML FORM INPUT CHECKING

    if (isset($_POST['seller_id']) && $_POST['seller_id'] != "") { $seller_id = $_POST['seller_id']; } else { $error_message = "Please input all required fields."; }                                           #Required: Seller ID
    if (isset($_POST['number_books_sold']) && $_POST['number_books_sold'] != "") { $number_books_sold = $_POST['number_books_sold']; $given_nbk = true; }                                                                          #Not a required field
    if (isset($_POST['average_rating']) && $_POST['average_rating'] != "") { $average_rating = $_POST['average_rating']; } else { $error_message = "Please input a valid phone number (Exclude any dashes)."; } #REQUIRED: Average Rating
    if (isset($_POST['phone_number']) && $_POST['phone_number'] != "") { $phone_number = $_POST['phone_number']; } else { $error_message = "Please input all required fields."; }                               #REQUIRED: Phone Number
    if (isset($_POST['address']) && $_POST['address'] != "") { $address = $_POST['address']; $given_adr = true; }                                                                                                                  #Not a required field
    if (isset($_POST['current_rating']) && $_POST['current_rating'] != "") { $current_rating = $_POST['current_rating']; } else { $error_message = "Please input all required fields."; }                       #REQUIRED: Current Rating
    if (isset($_POST['comment']) && $_POST['comment'] != "") { $comment = $_POST['comment']; $given_com = true; }                                                                                                                  #Not a required field
    if (isset($_POST['status']) && $_POST['status'] != "") { $status = $_POST['status']; } else { $status = "Active"; }                                                                                         #REQUIRED: Status



    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($error_message)) {
        echo "<tr><td><b style = 'color: red;'>$error_message</b></td></tr></table>";
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //?echo "<br><br>VALUES (" . $bookid . ", " . $cusid . ", " . $price . ", " . $orddate . ", " . $qty . ", " . $status . ")";
        echo "<tr><td style = 'padding-top: 15px;'></td></tr>";
        $q = "INSERT INTO t6_seller (sell_id, " . checkOptionalNBK($number_books_sold, $given_nbk) . "avg_rating, phone, " . checkOptionalADR($address, $given_adr). "rating, " . checkOptionalCOM($comment, $given_com). "status) VALUES (" . $seller_id . ", " . checkOptionalInput($number_books_sold, $given_nbk) . $average_rating . ", '" . $phone_number . "', " . checkOptionalInput($address, $given_adr) . $current_rating . ", " . checkOptionalInput($comment, $given_com) . "'" . $status . "'" . ");";
        echo $q;

        $r = mysqli_query($dbc, $q);
        if ($r) {
            echo "<tr><td><b style = 'color: green;'>Successfully added seller.</b></td></tr></table>";
        } else {
            echo "<tr><td><b style = 'color: red;'>Error adding new seller: Please check inputs. <br>The input Seller ID does not exist. To use a proper Seller ID, make sure an equivalent User ID exists as well by creating an account first.</b></td></tr>";
            //echo "<tr><td><b style = 'color: red;'>" . mysqli_error($dbc) . "</b></td></tr>";
            if (null !== mysqli_error($dbc)) {
                if (mysqli_error($dbc) == "Cannot add or update a child row: a foreign key constraint fails") {
                    echo "<tr><td><b style = 'color: red;'>The input Seller ID does not exist. To use a proper Seller ID, make sure an equivalent User ID exists as well by creating an account first.</b></td></tr>";
                }
            }
        }
    }

    echo "</table>";
    }
    

    # CHECKING FUNCTIONS FOR OPTIONAL INPUT INSERTION

    function checkOptionalInput($input, $check) { if ($check) { return "'" . $input . "', "; } else { return ""; } }

    function checkOptionalNBK($input, $check) { if ($check) { return "num_books_sold, "; } else { return ""; } }
    function checkOptionalADR($input, $check) { if ($check) { return "address, "; } else { return ""; } }
    function checkOptionalCOM($input, $check) { if ($check) { return "comments, "; } else { return ""; } }
    
    
    include "footer.php";
    
    # END OF FILE
    