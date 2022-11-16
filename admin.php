<!DOCTYPE html>

<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <title> Admin View </title>
        <link rel="stylesheet" href="styles.css">
        <style>
            .selection {
                margin-right: auto;
                margin-left: auto;
                width: 350px;
                display: flex;
            }
        </style>
    </head> 
    <body>
        <?php include "header.php"; ?>

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
            </div>
        <header>
            <h3 style = "text-align: center; color: rgb(198, 32, 198); font-size: 25px;"><u>ADMIN VIEW</u></h3>



            <div class = "selection">
            <?php
                define ("FILE_AUTHOR", "M. Ong");
                include "error_handler.php";

                echo "<form action = '' method = 'POST'>";

                echo "<b style = 'color: rgb(198, 32, 38)'>Admin Options:</b> <select name = 'view'>";

                echo "<option value = 'explain'> View Table Definitions </option>";
                echo "<option value = 'users'> Show All Users</option>";
                echo "<option value = 'connection'> Check Database Connection</option>";
                echo "</select>";
            
                echo "<button style = 'background-color: rgb(240, 193, 208); color: rgb(198, 32, 38); border-color: white;' type='submit'>Submit</button>";
                
                echo "</form>";

                if (count($_POST) != 0) {
                    //echo "<br><br>Input selection is " . $_POST['view'];
                } 

            ?>

           </div> 
        </header>
            <div class = "options">

            <?php

            //If the user wants to see all tables explained:
            if (count($_POST) != 0) {
            
                if ($_POST['view'] == "explain") {

                    echo "<table>";

                    echo 
                    "<tr>
                        <th colspan='6'><u>Database Tables Explained</u></th>
                    </tr>";
                    echo "</table>";
                    
                    REQUIRE "connect_db.php"; #Connect to our database.

                    $q = "SHOW TABLES";
                    $r = mysqli_query($dbc, $q);

                    if ($r) {
                        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                            //Note that each record only has 6 fields. SQL explain function will not output more.
                            echo "<table border=1><tr><th colspan = '6'>Definitions for table <b> "
                            . $row[0] . "</b>:</tr>" . 
                            "<tr>
                                <td>Field</td>
                                <td>Type</td>
                                <td>Nullable</td>
                                <td>Key</td>
                                <td>Default</td>
                                <td>Extras</td>
                            </tr>"; 
                            
                            echo explain_table($row[0], $dbc); 
                        }
                    }
                    echo "</div>";
                }

                //If the user wants to see if the database connection is live.
                else if ($_POST['view'] == "connection") {
                    REQUIRE "connect_db.php";
                    $q = "SHOW TABLES";
                    $r = mysqli_query($dbc, $q);
                    if ($r) {
                        echo "<h3 style = 'color: green; text-align: center;'>Database connection is working.</h3>";
                    }
                }

                //If the user wants to see all the users in the database.
                else if ($_POST['view'] == "users") {
                    REQUIRE "connect_db.php";
                    $q = "SELECT * FROM t6_user";
                    $r = mysqli_query($dbc, $q);
                    if ($r) {

                        echo "
                        <table border=1>
                            <tr>
                                <th>ID</th>
                                <th>Rank</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Password Type</th>
                                <th>Status</th>
                            </tr>
                        ";
                        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                            echo "<tr>" . "<td>" . $row[0] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[1] . "</td>";
                            echo "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>";
                            echo "<td style = 'word-wrap: break-word;'>" . $row[4] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[5] . "</td>";
                            echo "<td style = 'word-wrap: break-word;'>" . $row[6] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[7] . "</td>";
                            echo "<td>" . $row[8] . "</td>";
                        }

                        echo "</table>";
                    }
                }
            }
            
            //Explain table function will apply the SQL EXPLAIN command to each output table in site_db. 
            //*For final DB preparation, clear site_db of all extraneous tables (anything besides t6) for testing purposes.
            function explain_table ($thistable, $dbc) { 
                $q = "EXPLAIN " . $thistable;
                $r = mysqli_query($dbc, $q);
                if ($r) {
                    while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) { #Applied word wrap here to ensure table formatting is neat.
                        echo "<tr>" . "<td>" . $row[0] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[1] . "</td>";
                        echo "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>";
                        echo "<td style = 'word-wrap: break-word;'>" . $row[4] . "</td>" . "<td style = 'word-wrap: break-word;'>" . $row[5] . "</td>";
                        echo "</tr>";
                    }
                }
            }
           
        ?>







        </div>
            
        <?php include "footer.php"; ?>
        </main>
    </body>
</html>