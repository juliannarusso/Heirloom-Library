
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
        nav a {
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
        <div class="fixed-header">
            <div class="container">
                <header>
                    <div class="menu">
                        <b class="homebutton"><a href="index.php"><u style="color: rgb(198, 32, 38);">Home</u></a></b>
                        <ul>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="sellers.php">Sellers</a></li>
                            <li><a href="orders.php">Orders</a></li>
                            <li><a href=""><u>Sign In</u></a></li>
                            <li><a href=""><u>My Cart</u></a></li>
                        </ul>
                    </div>
                </header>
            </div>
            <hr>
        </div>

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
                        <td><img src="book1.gif"
                                alt="" width="150" height="170"></td>
                        <td>PHP & MySQL in easy steps begins by explaining how to install a free web server, the PHP 
                            interpreter, and MySQL database server, to create an environment in which you can produce 
                            your very own data-driven server-side web pages. You will learn how to write PHP server-side
                             scripts and how to make MySQL database queries. Examples illustrate how to store and 
                             retrieve Session Data, how to provide a Message Board, and how to create an E-Commerce Shopping Cart.</td>
                        <td>$14.99</td>
                    </tr>
                    <tr>
                        <td><img src="book2.gif"
                                alt="" width="150" height="170"></td>
                        <td>Engineering software products provides essential guidance for writing assignments typical in 
                            graduate programs in religion and has served as a standard textbook for seminary research courses.
                             The fourth edition is updated to include information on Turabian 9th edition, SBL Handbook 2nd edition, 
                             new resource lists, and additional help with online resources and formatting issues. Most importantly,
                              this new edition is revised from the perspective of information abundance rather than information 
                              scarcity. Today's research mindset has shifted from "find anything" and "be satisfied with anything"
                               to "choose intentionally" reliable and credible sources.</td>
                        <td>$74.99</td>
                    </tr>
                    <tr>
                        <td><img src="book3.gif"
                                alt="" width="150" height="170"></td>
                        <td>Enivornmental Ethics, 7th Edition presents the main issues in environmental ethics using a diverse
                             set of readings arranged in dialogue format. The seventh edition of this popular anthology features 
                             selections from contemporary authors as well as readings from classic writers, all chosen for 
                             their clarity and accessibility. By exploring both sides of every topic, this edition helps students
                              quickly grasp each subject and move from theory to application. Making this textbook even more
                               enjoyable to read include new sections on Environmental Justice, Climate Change, Food Ethics, 
                               Nature and Naturalness, Sustainability, Population and Consumption, Future Generations, and Holism.</td>
                        <td>$44.50</td>
                    </tr>
                    <tr>
                        <td><img src="book4.gif"
                                alt="" width="150" height="170"></td>
                        <td>Campbell Biology delivers a trusted, accurate, current, and pedagogically innovative experience that 
                            guides students to a true understanding of biology. The author team advances Neil Campbell's vision 
                            of meeting and equipping students at their individual skill levels by developing tools, visuals, 
                            resources, and activities that encourage participation and engage students in their learning. Known
                            for strategically integrating text and artwork, this trusted course solution works hand in hand with
                             Mastering Biology to reinforce key concepts, build scientific skills, and promote active learning. 
                             The 12th Edition meets demonstrated student needs with new student-centered features, expanded 
                             interactivity in the eText, downloadable Reading Guide worksheets that emphasize key concepts, 
                             and a fully revised assessment program.</td>
                        <td>$80.99</td>
                    </tr>
                    <tr>
                        <td><img src="book5.gif"
                                alt="" width="150" height="170"></td>
                        <td>Newly updated, this full-color resource offers a systematic approach to performing a neuromusculoskeletal
                             assessment with rationales for various aspects of the assessment. This comprehensive text covers every
                              joint of the body, head and face, gait, posture, emergency care, the principles of assessment, and 
                              preparticipation evaluation. The latest edition of this core text is the essential cornerstone in 
                              the new four-volume musculoskeletal rehabilitation series.</td>
                        <td>$42.40</td>
                    </tr>
                    
                </table>
                <br>
            </main>
        </div>    


            
<div class="fixed-footer">
    <hr>
    <div class="footer">
        <small class="info"><a href=""><u style="color: rgb(172, 62, 91);">HeirloomLibSupport@gmail.com</u></a></small>
        <ul>
            <li><a href="admin.php"><small><u>Administrator</u></small></a></li>
            <li><a href="creatingfaqs.html"><small><u>FAQ</u></small></a></li>
            <li><a href="disclaimer.html"><small><u>Disclaimer</u></small></a></li>
            <li><a href=""><small><u>Translate</u></small></a></li>
            <li><a href=""><small>(C) A. O'Leary 2022, M. Ong, A. Riotto, J. Russo </small></a></li>
        </ul>
    </div>        
</div>

        
    </body>
</head>
</html>
