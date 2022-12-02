<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Heirloom Library Home</title>
    <link rel="stylesheet" href="styles.css">

    <?php include "header.php" ?> <!--Adds Header -->

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
                        <td><img src="../homepage/book1.gif"
                                alt="" width="150" height="170"></td>
                        <td>PHP & MySQL in easy steps begins by explaining how to install a free web server, the PHP 
                            interpreter, and MySQL database server, to create an environment in which you can produce 
                            your very own data-driven server-side web pages. You will learn how to write PHP server-side
                             scripts and how to make MySQL database queries. Examples illustrate how to store and 
                             retrieve Session Data, how to provide a Message Board, and how to create an E-Commerce Shopping Cart.</td>
                        <td>$14.99</td>
                    </tr>
                    <tr>
                        <td><img src="../homepage/book2.gif"
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
                        <td><img src="../homepage/book3.gif"
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
                        <td><img src="../homepage/book4.gif"
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
                        <td><img src="../homepage/book5.gif"
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

<?php include "footer.php"; ?> <!-- Adds Footer -->
        
    </body>
</head>
</html>
