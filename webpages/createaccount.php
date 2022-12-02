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
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%)
            }
            .container {
                background: white;
                width: 410px;
                padding: 30px;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
            }
            .container .text {
                font-size: 35px;
                font-weight: 600;
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
            }
            form .data input {
                height: 175%;
                width: 100%;
                padding-left: 10px;
                font-size: 12px;
                border: 1px solid lightgray;
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
            include "header.php";
        ?>
        <div class = "center">
            <div class ="container">
                <div class = "text" style = "color: rgb(198, 32, 38);">Create Your Account<p><br><br></p></div>
                <form action ="" method = "POST">
                    <div class = "data">
                        <label>First Name</label>
                        <input type="text" required name ="firstname" AUTOFOCUS>
                    </div>
                    <div class = "data">
                        <label>Last Name</label>
                        <input type="text" required name = "lastname">
                    </div>
                    <div class = "data">
                        <label>Email</label>
                        <input type="email" required name = "email">
                    </div>
                    <div class = "data">
                        <label>Username</label>
                        <input type="text" required name = "username">
                    </div>
                    <div class = "data">
                        <label>Password</label>
                        <input type="Password" required name = "password">
                    </div>
                    <div class = "data">
                        <label>Password Type</label>
                        <input type="text" name = "passtype">
                    </div>
                    <div class = "button">
                        <div class = "inner"></div>
                        <button type="submit">Create Account</button>
                    </div>
                    <?php
                        require "../connect_db.php";
                        include "error_handler.php";
                        define("FILE_AUTHOR", "M. Ong");
                        
                        if (ISSET($_POST['firstname']) && $_POST['firstname'] != "") {
                            $firstname = $_POST['firstname'];
                        }
                        if (ISSET($_POST['lastname']) && $_POST['lastname'] != "") {
                            $lastname = $_POST['lastname'];
                        }
                        if (ISSET($_POST['email']) && $_POST['email'] != "") {
                            $email = $_POST['email'];
                        }
                        if (ISSET($_POST['username']) && $_POST['username'] != "") {
                            $username = $_POST['username'];
                        }
                        if (ISSET($_POST['password']) && $_POST['password'] != "") {
                            $password = $_POST['password'];
                        }
                        if (ISSET($_POST['passtype']) && $_POST['passtype'] != "") {
                            $passtype = $_POST['passtype'];
                        } else {
                            $passtype = "NULL";
                        }

                        if (ISSET($password)) {
                            if (strlen($password) < 5) {
                                $error_message = "Password should be longer than 5 characters.";    
                            }
                        }

                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $q = "SELECT * FROM t6_user";
                            $r = mysqli_query($dbc, $q);
                            if ($r) {
                                while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                                    foreach($row as $user) {
                                        if ($username == $user) {
                                            $error_message = "Username already taken.";
                                        }
                                    }
                                }
                            }
                        }

                        if ($_SERVER['REQUEST_METHOD'] == "POST" && ISSET($error_message)) {
                            echo "<br><b style = 'color: red;'>$error_message</b>";
                        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            echo "<br>";
                            $q = "INSERT INTO t6_user (user_rank, firstname, lastname, email, username, password, pass_type, status) 
                            VALUES (" . "\"Customer\"" . ", \"" . $firstname . "\", \"" . $lastname . "\", \"" . $email . "\", \"" . $username . "\", \"" . $password . "\", \"" . $passtype . "\", \"Active\");"; 
                            //echo $q;
                            $r = mysqli_query($dbc, $q);
                            if ($r) {
                                echo "<b style = 'color: green;'>New user account for " . $username . " successfully created.</b>";
                            } else {
                                echo "<b style = 'color: red;'>Error adding new user account: Please check inputs.</b>";
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