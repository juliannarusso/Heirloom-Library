<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create New Account</title>
        <style>
            body {
                width: 100%;
                /* background: linear-gradient(to right, #fbcbd3, #ff6b7a); */
            }
            .container {
                position: absolute;
                top: 40%;
                left: 50%;
                transform: translate(-50%, -50%)
            }
            .container {
                background: white;
                width: 410px;
                padding: 30px;
                box-shadow: 0 0 8px rgba(75, 0, 0, 0.0);
            }
            .container .text {
                font-size: 35px;
                font-weight: 600;
                text-align: center;
            }
            .container .alert {
                font-size: 15px;
                font-weight: 100;
                text-align: center;
            }
            .container form {
                margin-top: -120px;
            }
            .container form .data {
                height: 10px;
                width: 100%;
                margin: 36px 0;
            }
            form .data label {
                font-size: 14px;
                color: rgb(222, 62, 91);
            }
            form .data input {
                height: 175%;
                width: 100%;
                padding-left: 10px;
                font-size: 12px;
                border: 1px solid lightgray;
                border-color: rgb(222, 62, 91);
            }
            form .button {
                margin: 55px 1;
                height: 35px;
                width: 103%;
                position: relative;
                overflow: hidden;
            }
            form .button .inner {
                height: 100%;
                width: 300%;
                position: absolute;
                left: -100%;
                z-index: -1;
                background: -webkit-linear-gradient(right, #e93957, #c42333)
            }
            form .button:hover .inner {
                left: 0;
            }
            form .button button {
                height: 100%;
                width: 100%;
                background: none;
                border: none;
                color: white;
                font-size: 16px;
                font-weight: 500;
                text-transform: uppercase;
                letter-spacing: 1px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <?php 
            session_start();
            if (ISSET($_SESSION['active_user'])) {$active_user = $_SESSION['active_user'];}
            //echo $active_user;
            include "header.php";
        ?>
        <div class = "center">
            <div class ="container">
                <div class = "text" style = "color: rgb(198, 32, 38);">Promote User Rank<p></div>
                <div class = "alert" style = "color: rgb(198, 32, 38);">Note: Customer rank is the default and lowest rank.
                <br>Seller ranked users can ADD products.
                <br>Employees can ADD sellers and orders.
                <br><b>Admin has full site permissions.*<p><br><br></p><br><br><br></div>
                <form action ="" method = "POST">
                    <div class = "data">
                        <label>Choose Rank</label>

                        <?php 
                        echo "<select name = 'rank'>";
                        echo "<option value = 'Customer'> Demote to Customer</option>";
                        echo "<option value = 'Seller'> Promote/Demote to Seller</option>";
                        echo "<option value = 'Employee'> Promote/Demote to Employee</option>";
                        echo "<option value = 'Admin'><b> Promote to Administrator (*) </b></option>";
                        echo "</select>";
                        ?>

                    </div>
                    <div class = "data">
                        <label>User ID</label>
                        <input type="number" required name = "user_id" autofocus>
                    </div>
                    <div class = "data">
                        <label>Username</label>
                        <input type="text" required name = "username">
                    </div>
                    <div class = "data">
                        <label>Email</label>
                        <input type="email" required name = "email">
                    </div>
                    <br><br>
                    <div class = "button">
                        <div class = "inner"></div>
                        <button type="submit"><b>Promote User</b></button>
                    </div>
                    <?php
                        require "../connect_db.php";
                        include "error_handler.php";
                        define("FILE_AUTHOR", "M. Ong");
                        
                        if (ISSET($_POST['rank']) && $_POST['rank'] != "") {
                            $rank = $_POST['rank'];
                        }
                        if (ISSET($_POST['user_id']) && $_POST['user_id'] != "") {
                            $user_id = $_POST['user_id'];
                        }
                        if (ISSET($_POST['username']) && $_POST['username'] != "") {
                            $username = $_POST['username'];
                        }
                        if (ISSET($_POST['email']) && $_POST['email'] != "") {
                            $email = $_POST['email'];
                        }

                        //You cannot demote yourself.
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $q = "SELECT * FROM t6_user WHERE username = " . "\"$active_user\";";
                            $r = mysqli_query($dbc, $q);
                            if ($r) {
                                while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                                    foreach($row as $user) {
                                        if ($user_id == $user) {
                                            $error_message = "You cannot demote yourself from Administrator.";
                                        }
                                    }
                                }
                            }
                        }

                        //Check if input user does exist.
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $q = "SELECT * FROM t6_user WHERE user_id = " . $user_id . "
                            AND username = \"" . $username . "\" AND email = \"" . $email . "\";";
                            //echo $q;
                            $r = mysqli_query($dbc, $q);
                            if ($r) {
                                if (mysqli_num_rows($r) == 0 ) {
                                    $error_message = "Invalid Input. Check to make sure input user exists.";
                                }
                            }
                        }

                        //For security reasons, username and email are also inputs and must match the input user_id.
                        if ($_SERVER['REQUEST_METHOD'] == "POST" && ISSET($error_message)) {
                            echo "<br><b style = 'color: red;'>$error_message</b>";
                        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            echo "<br>";
                            $q = "UPDATE t6_user SET user_rank = \"" . $rank . "\" WHERE user_id = " . $user_id . "
                            AND username = \"" . $username . "\" AND email = \"" . $email . "\";"; 
                            //echo $q;
                            $r = mysqli_query($dbc, $q);
                            if ($r) {
                                echo "<b style = 'color: green;'>Rank for user " . $username . " sucessfully updated.</b>";
                            } else {
                                echo "<b style = 'color: red;'>Error updating user rank. Please check inputs. Make sure
                                input user ID exists. Make sure input username and email correspond to the intended user ID.</b>";
                                //echo mysqli_error($dbc);
                            }
                        }
                    ?>
                    </div>
                </form>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
    </body>
</html>