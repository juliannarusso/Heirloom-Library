<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Heirloom Library Home</title>

    <style> 
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */
        .container{
            width: 80%; 
            margin: 0 auto; /* Center the DIV horizontally */
        }
        .fixed-header, .fixed-footer{
            width: 100%;
            position: fixed;        
            background:  #fff;
            padding: 10px 0;
            color: #fff;
        }
        .fixed-header{
            top: 0;
        }
        .fixed-footer{
            bottom: 0;
        }    
        /* Some more styles to beutify this example */
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 7px 25px;
            display: inline-block;
        }
        .container p{
            line-height: 200px; /* Create scrollbar to test positioning */
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

        body{        
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

        /* form {
            background: white;
            width: 800px;
            height: 40px;
            display: flex;
        }

        form input {
            width: 800px;
            border-color: rgb(222, 62, 91);
            padding-left: 15px;
        }

        form button {
            background: rgb(192, 62, 91);
            border-color: rgb(192, 62, 91);
            width: 3cm;
            height: 40px;
            color: #fff;
            letter-spacing: 1px;
            cursor: pointer;
        } */

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

    <?php include('header.php'); ?> <!-- Adds Header -->

    <h3 style = "text-align: center; color: rgb(198, 32, 38); font-size: 25px;"><u>Sign-In</u></h3>

    <div class = "signin">

    <?php
    session_start();
    include "error_handler.php";
    define("FILE_AUTHOR", "M. Ong");





    #------- Sets the initial login status for the page's first load. ------#
    if (ISSET($_SESSION['login_status'])) {
        $login_status = $_SESSION['login_status']; //?Use this to check for log-out.
    }
    else {
        $login_status = "Signed out";
    }





    #------- Variable Initialization and checking if username or password have been set via user input -------#
    $username = "";
    $password = "";

    if (ISSET($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (ISSET($_POST['password'])) {
        $password = $_POST['password'];
    }





    #-------Input Validation Checks-------#
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (strlen($username) < 1) { 
            $error_message = "Username cannot be blank.";
        }
        if (strlen($password) < 1) {
            $error_message = "Password cannot be blank.";
        }
        if (strlen($username) > 20) {
            $error_message = "Username is too long.";
        }
        if (strlen($password) > 20) {
            $error_message = "Password is too long.";
        }

        //* These checks are from the login assignment. We cannot use these since our passwords can include special characters.

        // if (!(ctype_alnum($username)) && strlen($username) != 0) {
        //     $error_message = "Username must be alphanumeric. It cannot contain any special characters.";
        // }
        // if (!(ctype_alnum($password)) && strlen($password) != 0) {
        //     $error_message = "Password must be alphanumeric. It cannot contain any special characters.";
        // }
    }





    #-------If input is valid, try the query to see if there is a (username, password) match.------#
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !(ISSET($error_message))) {
    
        REQUIRE "connect_db.php";
        $q = "SELECT username, password FROM t6_user WHERE BINARY username = \"" . $username . "\"" . 
        " AND BINARY password = \"" . $password . "\"";
        // echo $q; #if we want to view the query being sent.
        $r = mysqli_query($dbc, $q);
    
        if ($r) {
            if (mysqli_num_rows($r) == 0) {
                $error_message = "Invalid user name or password";
            }
            else {
                $_SESSION['login_status'] = "Signed In";
                $login_status = "Signed In";
                $_SESSION['active_user'] = $username; 
            }
        }
    }   





    #-------Form display if input is validated according to database values -------#
    if ((($_SERVER['REQUEST_METHOD'] == "GET") || (ISSET($error_message))) && ($login_status == "Signed out")) {

        if (ISSET($error_message)) {
            echo "<p><br><em style = 'color: red;'> " .$error_message . "</em><p>";
        }
    
    echo "<form style = 'margin-left: auto; margin-right: auto;' action = " . $_SERVER['SCRIPT_NAME'] . " method = 'POST'>";

    echo "<input type = 'text' placeholder = 'Username' name = 'username'><br>";

    echo "<br><input type = 'password' placeholder = 'Password' name = 'password'>";

    echo "<br><p><a href=''><b><u>Create an Account</u></b></a>";
    
    echo "<p><button style = 'background-color: rgb(255, 93, 101); color: white; border-color: white;
    margin-right: auto; margin-left: auto;' type = 'submit'>Sign In</button>";

    echo "</form>";




    #------- Adds a sign-out option button to let the user sign out of his or her account. ------#
    } else if ($login_status == "Signed In"){
        echo "<p><b style = 'text-align: center; color: rgb(198, 32, 38); font-size: 15px;'>You are currently signed into your account: " . $_SESSION['active_user'] . "</b></p>";
        echo "<form style = 'margin-left: auto; margin-right: auto;' action = " . $_SERVER['SCRIPT_NAME'] . " method = 'POST'>";
        echo "<input style = 'background-color: rgb(255, 93, 101); color: white; border-color: white;
        margin-right: auto; margin-left: auto;' type = 'submit' name = 'signout' value='Sign Out'>";
        echo "</form>";
    }




    #------ Sign-out page quick redirect ------#
    //!Requires the file logout.php: Redirects the browser to a page where the session variables are unset.
    if (ISSET($_POST['signout'])) {
        header('Location: logout.php');
    }




    #-------Continue with previously set session variables. The user will not be prompted to log in again unless the whole browser closed. ------#
    if ($_SERVER['REQUEST_METHOD'] == "POST" && !(ISSET($error_message))) {
        $_SESSION['login_status'] = "Signed In";
    }
    else if ($_SERVER['REQUEST_METHOD'] == "GET" && !(ISSET($error_message)) && ISSET($_SESSION['active_user'])) {
    $_SESSION['login_status'] = "Signed In";
    }

    ?>
    
    </div>

    <?php include "footer.php"; ?>