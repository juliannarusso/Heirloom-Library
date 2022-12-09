<?php
    echo "<head>
    <meta charset='utf-8'>
    <title> Add an Employee </title>
    </head>";

    include "header.php";
    define("FILE_AUTHOR", "M. Ong");
    include "error_handler.php";
    require "../connect_db.php";

    echo "
    <form style = 'margin-left: auto; margin-right: auto;' action = '' method = 'POST'>" . "
    <br><table style='border:0px solid black;margin-left:auto;margin-right:auto; width: 45%;'>
        <tr>
            <td style = 'color: rgb(222, 62, 91);'>Required fields are indicated by \"<em style = 'color: red;'>*</em>\"</td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
            <td><input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' placeholder = 'Employee ID' name = 'emp_id'><em style = 'color: red;'>*</em></td>
            <td><input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'number' placeholder = 'Salary' name = 'salary'><em style = 'color: red;'>*</em></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
        <td style = 'color: rgb(222, 62, 91);'><input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'text' placeholder = 'Position' name = 'position'></td>
        <td style = 'color: rgb(222, 62, 91);'>Hire Date: <input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'date' placeholder = 'Date' name = 'hire_date'></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr> 
        <tr>
        <td><input style = 'border-color: rgb(222, 62, 91); padding-top: 5px; padding-bottom: 5px;' type = 'text' placeholder = 'Status' name = 'status'></td>
        </tr>
        <tr><td style = 'padding-top: 15px;'></td></tr>
        <tr>
        <td><p><button style = 'background: rgb(192, 62, 91);
        border-color: rgb(192, 62, 91);
        width: 3cm;
        height: 40px;
        color: #fff;
        letter-spacing: 1px;
        margin-right: auto; margin-left: auto;' type = 'submit'>Add Employee</button></td>
        </tr>
        </form>";
    
    if (ISSET($_POST['emp_id']) && $_POST['emp_id'] != "") {
        $emp_id = $_POST['emp_id'];
    } else {
        $error_message = "Please input all required fields.";
    }
    
    if (ISSET($_POST['salary']) && $_POST['salary'] != "") {
        $salary = $_POST['salary'];
    } else {
        $error_message = "Please input all required fields.";
    }

    if (ISSET($_POST['position']) && $_POST['position'] != "") {
        $position = $_POST['position'];
    } else {
        $error_message = "Please input all required fields.";
    }

    if (ISSET($_POST['hire_date']) && $_POST['hire_date'] != "") {
        $hire_date = $_POST['hire_date'];
    } else {
        $hire_date = "2020-01-01";
    }

    if (ISSET($_POST['status']) && $_POST['status'] != "") {
        $status = $_POST['status'];
    } else {
        $status = "Active";
    }

    

    if ($_SERVER['REQUEST_METHOD'] == "POST" && ISSET($error_message)) {
        echo "<tr><td><b style = 'color: red;'>$error_message</b></td></tr></table>";
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //?echo "<br><br>VALUES (" . $bookid . ", " . $cusid . ", " . $price . ", " . $orddate . ", " . $qty . ", " . $status . ")";
        echo "<tr><td style = 'padding-top: 15px;'></td></tr>";
        $q = "INSERT INTO t6_employee VALUES (" . $emp_id . ", " . $salary . ", " . "\"" . $hire_date . "\"". ", \"" . $position . "\", \"" . $status . "\"" . ");";
        echo $q;

        $r = mysqli_query($dbc, $q);
        if ($r) {
            echo "<tr><td><b style = 'color: green;'>Successfully added employee.</b></td></tr></table>";
        } else {
            echo "<tr><td><b style = 'color: red;'>Error adding new employee: Please check inputs. <br>Make sure the input user ID exists, or have the employee create an account first.</b></td></tr>";
            //echo "<tr><td><b style = 'color: red;'>" . mysqli_error($dbc) . "</b></td></tr>";
            if (null !== mysqli_error($dbc)) {
                if (mysqli_error($dbc) == "Cannot add or update a child row: a foreign key constraint fails") {
                    echo "<tr><td><b style = 'color: red;'>The input User ID does not exist. Have the employee to be added create an account first.</b></td></tr>";
                }
            }
        }
    }

    echo "</table>";
    
    
    
    include "footer.php";
    
    # END OF FILE
    