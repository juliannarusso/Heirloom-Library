<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Heirloom Library Footer</title>

    <style>
        .fixed-footer{
            width: 100%;
            position: fixed;
            background:  #fff;
            padding: 10px 0;
            color: #fff;
            bottom: 0;
        }

        .footer {
            width: 95%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        .info {
            width: 120px;
            cursor: pointer;
            text-transform: uppercase;
        }

        body{
            padding-top: 70px;
            padding-bottom: 70px;
        }

        hr {
            height: 2px;
            background-color: rgb(182, 93, 116);
            border: none;
        }

        .email {
            color: rgb(172, 62, 91);
        }

    </style>
</head>

<?php
    if (defined('FILE_AUTHOR') && FILE_AUTHOR != "") { //Checks if Webpage Author is Defined
        $fileAuthor = FILE_AUTHOR;
    } else { //If Webpage Author isn't Defined, set to Default: 'Everyone is Author'
        $fileAuthor = "M. Ong";
    }
?>

<body>
    <div class="fixed-footer">
        <hr>
        <div class="footer">
            <small class="info"><a href=""><u class="email">HeirloomLibSupport@gmail.com</u></a></small>
                <ul>

                <?php
        
                require "../connect_db.php";

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
                            if ($row[0] == "Admin") {
                                echo "<li><b><a href='admin.php'><small><u>Administrator</u></small></a></b></li>";
                            }
                        }
                    }
                }

                ?>

                <li><a href="customers.php"><small><u>Customers</u></small></a></li>
                <li><a href="creatingfaqs.html"><small><u>FAQ</u></small></a></li>
                <li><a href="disclaimer.php"><small><u>Disclaimer</u></small></a></li>
                <?php echo "<li><a href=''><small>(C) " . $fileAuthor . " </small></a></li>"; ?> <!-- Places Webpage Author-->
            </ul>
       </div>
    </div>
</body>
</html>