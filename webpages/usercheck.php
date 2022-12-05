<?php
    session_start();
    require "../connect_db.php";

    $isEmployeeAdmin = false;

    if (isset($_SESSION['active_user'])) { $active_user = $_SESSION['active_user']; }
    if (isset($_SESSION['login_status'])) {
        $login_status = "LOGGED IN";

        $q = "SELECT user_rank FROM t6_user WHERE username = '" . $active_user . "'";
        $r = mysqli_query($dbc, $q);

        if ($r) {
            while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
                if ($row[0] == "Admin" || $row[0] == "Employee") {
                    $isEmployeeAdmin = true;
                } else {
                    $isEmployeeAdmin = false;
                }
            }
        }
    }

?>