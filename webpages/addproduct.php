<?php
    echo "<head>
    <meta charset='utf-8'>
    <title> Add an Order </title>
    </head>";

    include "header.php";
    define("FILE_AUTHOR", "A. O'Leary");
    include "error_handler.php";
    require "../connect_db.php";
    include "footer.php";

    $book_isbn = $title = $book_price = $copyrite = $inv_date = $seller_id = $q = ""; 

    # validates the input for userid and outputs an error message if something is wrong
    if (isset($_POST['ISBN']))   { $book_isbn = $_POST['ISBN'];}
    if (isset($_POST['Title'])) { $title = $_POST['Title'];} 
    if (isset($_POST['Price'])) { $book_price = $_POST['Price'];} 
    if (isset($_POST['inventory_date'])) { $inv_date = $_POST['inventory_date'];} 
    if (isset($_POST['Copyrite'])) { $copyright = $_POST['Copyrite'];} 
    if (isset($_POST['book_condition'])) { $condition = $_POST['book_condition'];} 
    if (isset($_POST['status'])) { $status = $_POST['status'];} 

    if (isADMIN)
    {
        echo "<br>";
        echo "<form style = 'margin-left: auto; margin-right: auto;' action='' method='POST'>"; 
        
        echo "<br> Enter the book ISBN";
        echo "<input style='margin-left:5px' type='number' name='ISBN' value='$book_isbn'>";
        echo "<br>";

        
        echo "<br> Enter the book Title";
        echo "<input style='margin-left:5px' type='text' name='Title' value='$title'>";
        echo "<br>";

        
        echo "<br> Enter the book Price";
        echo "<input type='number' name='Price' value='$book_price'>";
        echo "<br>";

        echo "<br> Enter the inventory Date";
        echo "<input type='date' name='inventory_date' value='$inv_date'>";
        echo "<br>";

        
        echo "<br> Enter the book's Copyrite";
        echo "<input type='text' name='Copyrite' value='$copyrite'>";
        echo "<br>";


        echo "<br> Select the book condition <select name='book_condition'>";
        echo " <option value='Unused'> Unused </option>";
        echo " <option value='Excellent'> Excellent </option>";
        echo " <option value='Good'> Good </option>";
        echo " <option value='Okay'> Okay </option>";
        echo " <option value='Poor'> Poor </option>";
        echo "</select>";
        echo "<br>";
        
        
        echo "<br> Select the seller status <select name='status'>";
        echo " <option value='Active'> Active </option>";
        echo " <option value='Deleted'> Deleted </option>";
        echo "</select>";

        echo "<br>";
        echo "<br>";
        echo "<button style = 'background: rgb(192, 62, 91);
        border-color: rgb(192, 62, 91);
        width: 3cm;
        height: 40px;
        color: #fff;
        letter-spacing: 1px;
        margin-right: auto; margin-left: auto;' type = 'submit'>Add Seller</button>";

        echo "</form>";


        // inputing the inputed data in to the mysql database if everything is correct
        if ($_SERVER['REQUEST_METHOD'] == "POST") 
        {
            $q = "INSERT INTO t6_product (book_isbn, title, book_price, inv_date, copyright, book_condition, status) VALUES( '$book_isbn' , '$title' , '$book_price', '$inv_date', '$copyright', '$condition', '$status')";
            $r = mysqli_query($dbc, $q);

            if ($r) {
                echo "<b style = 'color: green;'> Product successfully entered!</b>";
            } else {
                echo "<b style = 'color: red;'>Error adding new product: Please check inputs.</b>";


            }
        }
    }
?>
    
    
    
