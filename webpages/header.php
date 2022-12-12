<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Heirloom Library Header</title>

    <style>
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */
        .container1{
            width: 80%;
            margin: 0 auto; /* Center the DIV horizontally */
        }
        .fixed-header{
            width: 100%;
            position: fixed;
            background:  #fff;
            padding: 10px 1;
            color: #fff;
            top: 0;
        }

        .menu {
            width: 95%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        .homebutton {
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
    </style>

    
</head>
<?php include "../usercheck.php"; ?>
<body>
<div class="fixed-header">
            <div class="container1">
                <header>
                    <div class="menu">
                        <b class="homebutton"><a href="index.php"><u style="color: rgb(198, 32, 38);">Home</u></a></b>
                        <ul>
                            <li><a href="products.php" style = "color: rgb(198, 32, 38);">Products</a></li>
                            <li><a href="sellers.php" style = "color: rgb(198, 32, 38);">Sellers</a></li>
                            <li><a href="orders.php" style = "color: rgb(198, 32, 38);">Orders</a></li>
                            <li><a href="signin.php"><u><?php if (isset($_SESSION['login_status'])) { echo "My Account"; } else { echo "Sign In"; } ?></u></a></li>
                        </ul>
                    </div>
                </header>
            </div>
            <hr>
        </div>
</body>
