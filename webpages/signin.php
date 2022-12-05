<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Heirloom Library Home</title>

    <style>
        .container {
            width: 80%;
            margin: 0 auto;
        }
        

        .fixed-header,
        .fixed-footer {
            width: 100%;
            position: fixed;
            background: #fff;
            padding: 10px 0;
            color: #fff;
        }

        .fixed-header {
            top: 0;
        }

        .fixed-footer {
            bottom: 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 7px 25px;
            display: inline-block;
        }

        .container p {
            line-height: 200px;
        }

        .menu {
            width: 95%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .homebutton {
            width: 120px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .menu ul li {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
        }

        .menu ul li a {
            text-decoration: none;
            text-transform: uppercase;
            color: rgb(172, 62, 91);
        }

        .footer {
            width: 95%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .info {
            width: 120px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .footer ul li {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
        }

        .footer ul li a {
            text-decoration: none;
            color: rgba(172, 62, 91, 0.8);
        }

        .search {
            width: 100%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .listings {
            width: 1100px;
            color: black;
            background-color: rgba(192, 62, 100, 0.1);
            border-collapse: collapse;
            font-weight: normal;
            margin-left: auto;
            margin-right: auto;
        }

        .listings th {
            font-size: 15px;
            font-weight: bold;
            border: 6px solid white;
            height: 1cm;
        }

        .listings td {
            font-size: 15px;
            padding-left: 25px;
            padding-right: 25px;
            border: 6px solid white;
        }

        .listings tr:nth-child(even) {
            background-color: rgba(192, 62, 100, 0.1);
        }

        body {
            padding-top: 70px;
            padding-bottom: 70px;
        }

        h1 {
            color: rgb(182, 93, 116);
        }

        hr {
            height: 2px;
            background-color: rgb(182, 93, 116);
            border: none;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        .signin form {
            width: 300px;
            height: 40px;
        }

        .signin form input {
            width: 300px;
            padding-left: 15px;
            padding-top: 8px;
            padding-bottom: 8px;
            border-width: 1.5px;
            border-color: rgb(222, 62, 91);
        }

        .signin a {
            text-decoration: none;
            color: rgb(172, 62, 91);
        }

        .signin form button {
            background: rgb(192, 62, 91);
            border-color: rgb(192, 62, 91);
            width: 325px;
            height: 40px;
            color: #fff;
            letter-spacing: 1px;
            cursor: pointer;
        }

        .signin {
            text-align: center;
        }
    </style>

    <?php

    session_start();

    include "header.php";

    if (isset($_SESSION['login_status'])) {
        $login_status = $_SESSION['login_status'];
        echo "<h3 style = 'text-align: center; color: rgb(198, 32, 38); font-size: 25px;'><u>Your Account</u></h3>";
    } else {
        $login_status = "NOT LOGGED IN";
        echo "<h3 style = 'text-align: center; color: rgb(198, 32, 38); font-size: 25px;'><u>Sign-In</u></h3>";
    }

    
    echo "<div class = 'signin'>";

    //If login_status is not set, it is the first load - there is no user logged in.

    include "error_handler.php";
    define("FILE_AUTHOR", "M. Ong");




    //Initialize variables to stored as $username and $password.
    //Set from the form if passed via user input.
    $username = "";
    $password = "";

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }





    //All of the input validation checks. 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Blank checks
        if (strlen($username) < 1) {
            $error_message = "Username cannot be blank.";
        }
        if (strlen($password) < 1) {
            $error_message = "Password cannot be blank.";
        }
        //Size checks
        //?Char limit = 20
        if (strlen($username) > 20) {
            $error_message = "Username is too long.";
        }
        if (strlen($password) > 20) {
            $error_message = "Password is too long.";
        }
        // //Alphanumerics checks
        // if (!(ctype_alnum($username)) && strlen($username) != 0) {
        //     $error_message = "Username must be alphanumeric. It cannot contain any special characters.";
        // }
        // if (!(ctype_alnum($password)) && strlen($password) != 0) {
        //     $error_message = "Password must be alphanumeric. It cannot contain any special characters.";
        // }
    }





    //If all input is 'good' (meaning no error message has been set by any of the input checks above) proceed with querying the database
    //and confirming that the input username and password match an existing pair in the database PrintsUsers.
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !(isset($error_message))) {
        require "../connect_db.php";
        $q = "SELECT username, password FROM t6_user WHERE BINARY username = \"" . $username . "\"" .
            "AND BINARY password = \"" . $password . "\"";
        //echo $q;
        $r = mysqli_query($dbc, $q);

        if ($r) {
            if (mysqli_num_rows($r) == 0) {
                $error_message = "Invalid username or password.";
            } else {
                $_SESSION["login_status"] = "LOGGED IN";
                $login_status = "LOGGED IN";
                $_SESSION["active_user"] = $username;
            }
        }
    }
    //echo "<br> $login_status"; #Show the login status above the form.





    //Display the form for input if the page is loaded for the first time, or there is no error message set and the user is not yet logged in.
    if ((($_SERVER['REQUEST_METHOD'] == "GET") || (isset($error_message))) && ($login_status == "NOT LOGGED IN")) {
        if (isset($error_message)) {
            echo "<p><br><em style = 'color: red;'> " . $error_message . "</em><p>";
        }
        echo "<form style = 'margin-left: auto; margin-right: auto;' action = " . $_SERVER['SCRIPT_NAME'] . " method = 'POST'>";

        echo "<input type = 'text' placeholder = 'Username' name = 'username'><br>";

        echo "<br><input type = 'password' placeholder = 'Password' name = 'password'>";

        echo "<br><p><a href='createaccount.php'><b><u>Create an Account</u></b></a>";

        echo "<p><button style = 'background-color: rgb(255, 93, 101); color: white; border-color: white;
        margin-right: auto; margin-left: auto;' type = 'submit'>Sign In</button>";

        echo "</form>";
    }


    #------- Adds a sign-out option button to let the user sign out of his or her account. ------#
    else if ($login_status == "LOGGED IN") {
        echo "<p><b style = 'text-align: center; color: rgb(198, 32, 38); font-size: 18px;'>You are currently signed into your account: <u>" . $_SESSION['active_user'] . "</u></b></p>";
        echo "<br><b style = 'text-align: center; color: rgb(198, 32, 38); font-size: 15px;'>If you want to sign out of your account click here:</b>";
        echo "<br><b style = 'text-align: center; color: rgb(198, 32, 38); font-size: 17px;'><a href='logout.php'><u>Sign Out</u></a></b>";
    }



    #-------Continue with previously set session variables. The user will not be prompted to log in again unless the whole browser closed. ------#
    if ($_SERVER['REQUEST_METHOD'] == "POST" && !(isset($error_message))) {
        $_SESSION['login_status'] = "LOGGED IN";
    } else if ($_SERVER['REQUEST_METHOD'] == "GET" && !(isset($error_message)) && isset($_SESSION['active_user'])) {
        $_SESSION['login_status'] = "LOGGED IN";
    }

    if (ISSET($_SESSION['active_user'])) {
        $active_user = $_SESSION['active_user'];
    }
    if (ISSET($_SESSION['login_status'])) {
        $login_status = "LOGGED IN";

        //!Design this new YOUR ACCOUNT page to include links to update the user's account to a customer or seller.
        // require "../connect_db.php";
        // $q = "SELECT user_rank FROM t6_user WHERE username = \"" . $active_user . "\"";
        // // echo $q;
        // $r = mysqli_query($dbc, $q);

        // if ($r) {
        //     while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
        //         if ($row[0] == "Admin") {
        //             echo "<br><br><b><a href='addcustomer.php'><u style = 'font-size: 18px;'>Set up Customer Profile</u></a></b>";
        //         }
        //     }
        // }
    }

    echo "</div>";

    include "adminfooter.php";

    ?>
