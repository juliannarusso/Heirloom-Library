<?php
    session_start();
    require "../connect_db.php";

    $admin = false;
    $employe = false;

    if (isset($_SESSION['active_user'])) { $active_user = $_SESSION['active_user']; }
    if (isset($_SESSION['login_status'])) {
        $login_status = "LOGGED IN";

        $q = "SELECT user_rank FROM t6_user WHERE username = '" . $active_user . "'";
        $r = mysqli_query($dbc, $q);

        if ($r) {
            while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                if ($row[0] == "Admin") {
                    $admin = true; //Defines Constant declaring Current User Account is Admin
                    $employee = true; //Defines Constant declaring Current User Account is also an employee
                } else if ($row[0] == "Employee") {
                    $employee = true; //Defines Constant declaring Current User Account is an Employee
                    $admin = false; //Defines Constant declaring Current User Account is not an admin
                }
            }
        }
    }
    define("isADMIN", $admin);
    define("isEMPLOYEE", $employee);

    //if (isADMIN || isEMPLOYEE) { define("isCUSTOMER", false); } else { define("isCUSTOMER", true); } //Failsafe declaration, saying if the Account is not an Employee or Admin, then they're a Customer

?>