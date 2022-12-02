<!DOCTYPE html>

<html lang="en"> 
    <head> 
        <meta charset="utf-8">
        <title> Support FAQs </title>
        <style>
            /* Add some padding on document's body to prevent the content
            to go underneath the header and footer */
                .container{
                    width: 80%;
                    margin: 0 auto; /* Center the DIV horizontally */
                }
                .fixed-header, .fixed-footer{
                    width: 100%;
                    position: fixed;
                    background:  #fff;
                    padding: 10px 0;
                    color: #fff;
                }
                .fixed-header{
                    top: 0;
                }
                .fixed-footer{
                    bottom: 0;
                }
                /* Some more styles to beutify this example */
                nav a{
                    color: #fff;
                    text-decoration: none;
                    padding: 7px 25px;
                    display: inline-block;
                }
                .container p{
                    line-height: 200px; /* Create scrollbar to test positioning */
                }
        
                .menu {
                    width: 95%;
                    margin: auto;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
        
                .homebutton {
                    width: 120px;
                    cursor: pointer;
                    text-transform: uppercase;
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
        
                .footer {
                    width: 95%;
                    margin: auto;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
        
                .info {
                    width: 120px;
                    cursor: pointer;
                    text-transform: uppercase;
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
        
                .search {
                    width: 100%;
                    background: white;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
          
                .listings {
                    width: 1200px;
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
            </main>
        </div>
    </body>

   
    <body>
        <header>
            <h1 style="color: rgb(172, 62, 91); font-size:25px; padding-top:0cm;padding-bottom:0cm;">Support FAQs</h1>
            <p><b>Q: Why is my package not delievered by it's expected date?</b></p>
            <p>A: While the workers at Heirloom Library do their best to ensure your packages get deliverd safely and on time, we can only give you an estimated delivery date. If your package is more than two weeks late, please contact HEIRLOOMLIBSUPPORT@GMAIL.COM.</p>
            <p> </p>
            <p><b>Q: My package came damaged, what do I do now?</b></p>
            <p>A: We are so sorry this happened, please contact HEIRLOOMLIBSUPPORT@GMAIL.COM to get more immediate help, and they will help get you your refund.</p>
            
            
            
        </header>
        <footer>
            <?php
                define("FILE_AUTHOR", "J. Russo");
                include "footer.php";
            ?>
        </footer>
    </body>
    
</html>