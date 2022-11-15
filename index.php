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
        /* Some more styles to beautify this example */
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 7px 25px;
            display: inline-block;
        }
        .container p{
            line-height: 200px; /* Create scrollbar to test positioning */
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

        form {
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
        }


    </style>

</head>
    <body>

        <?php include('header.php'); ?> <!-- Adds Header -->

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
        
                <!--Search bar-->
                <div class="search">
                    <form>
                        <input type="text" placeholder="Search for Title, Author, Keyword, ISBN...">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <small style="margin-left: 20cm; color:rgb(182, 93, 116)"><u>Search Options</u></small>
        
                <!--Table section for books-->
                <br>
                <table class="listings">
                    <tr>
                        <th>
                            Book Image
                        </th>
                        <th>
                            Information
                        </th>
                        <th>
                            Pricing
                        </th>
                    </tr>
        
                    <!--Individual sections made for each book-->
                    <tr>
                        <td><img src="https://media.discordapp.net/attachments/475843835990114315/1023311951201304616/unknown.png?width=701&height=701"
                                alt="" width="150" height="170"></td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</td>
                        <td>$$$</td>
                    </tr>
                    <tr>
                        <td><img src="https://media.discordapp.net/attachments/475843835990114315/1023311951201304616/unknown.png?width=701&height=701"
                                alt="" width="150" height="170"></td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</td>
                        <td>$$$</td>
                    </tr>
                    <tr>
                        <td><img src="https://media.discordapp.net/attachments/475843835990114315/1023311951201304616/unknown.png?width=701&height=701"
                                alt="" width="150" height="170"></td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</td>
                        <td>$$$</td>
                    </tr>
                    <tr>
                        <td><img src="https://media.discordapp.net/attachments/475843835990114315/1023311951201304616/unknown.png?width=701&height=701"
                                alt="" width="150" height="170"></td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</td>
                        <td>$$$</td>
                    </tr>
                    <tr>
                        <td><img src="https://media.discordapp.net/attachments/475843835990114315/1023311951201304616/unknown.png?width=701&height=701"
                                alt="" width="150" height="170"></td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</td>
                        <td>$$$</td>
                    </tr>
                    
                </table>
                <br>
            </main>
        </div>

    <?php
    define('FILE_AUTHOR', ''); #Defines Page Author, If Any Exists
    include('footer.php');  #Adds Footer
    ?>

</html>