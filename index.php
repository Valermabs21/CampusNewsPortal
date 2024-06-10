<?php

    session_start();

    include("classes/connect.php");
    include("classes/login.php");  
    include("classes/user.php");  

    if(isset($_SESSION['campusportal_userid']) && is_numeric($_SESSION['campusportal_userid'])){

        $id = $_SESSION['campusportal_userid'];
        $login = new Login();

        $result = $login->check_login($id);

        if($result){

            $user = new User();

            $user_data = $user->get_data($id);

            if(!$user_data){

                header('Location: login.php');
                die;
            }

        }else{

            header('Location: login.php');
            die;
        }
    }

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Campus News Portal</title>
        <link rel="stylesheet" href="uistyles.css">
    
    <style>

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 0;
    }
    
    .container {
        width: 90%;
        margin: 0 auto;
    }
    .header {
        background-color: #23285a;
        color: white;
        padding: 20px;
        text-align: center;
    }
    .campus-section {
        margin-top: 20px;
    }
    .campus-title {
        background-color: #23285a;
        color: white;
        padding: 15px;
        margin: 0;
        font-size: 1.5em;
        text-align: center;
    }
    .campus {
        display: flex;
        background-color: white;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
        justify-content: center;
    }
    .campus img {
        width: 300px;
        height: auto;
        border-radius: 10px 0 0 10px;
        object-fit: cover;
    }
    .campus-info {
        padding: 20px;
        flex: 1;
    }
    .campus-info h3 {
        margin-top: 0;
        color: #23285a;
    }
    .campus-info p {
        margin: 10px 0;
        text-align: justify;
        line-height: 1.6;
    }
    .campus-buttons {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .campus-buttons a {
        text-decoration: none;
        background-color: #3498db;
        color: white;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        flex: 1;
    }

    .iframe-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .round-border {
        border-radius: 15px;
        overflow: hidden;
    }
    </style>
        
    </head>
    <body>
        <div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#Colleges">Colleges</a>
                        <div class="dropdown-content">
                            <a href="College of Arts and Sciences.php">College of Arts and Sciences</a>                            
                            <a href="College of Engineering and Technology.php">College of Engineering and Technology</a>
                            <a href="College of Agriculture.php">College of Agriculture</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#Updates">Updates</a>
                        <div class="dropdown-content">
                            <a href="Administration.php">Administration</a>
                            <a href="Office of Student Affairs.php">Office of Student Affairs</a>
                            <a href="University Students Government.php">University Students Government</a>
                            <a href="Information and Communications Technology.php">Information and Communications Technology</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#About">About</a>
                        <div class="dropdown-content">
                            <a href="Creators.php">Creators</a>
                            <a href="Contact Us.php">Contact Us</a>
                        </div>
                    </li>
                    <li class="logout-btn"><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <main>
            <h1>Welcome to Campus News Portal</h1>
            <p>Stay updated with the latest campus news and updates.</p>

            <section class="elementor-section elementor-top-section elementor-element elementor-element-c5b2ff1 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="c5b2ff1" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b626afb" data-id="b626afb" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-83a8ee9 elementor-widget-mobile__width-inherit elementor-widget elementor-widget-html" data-id="83a8ee9" data-element_type="widget" data-widget_type="html.default">
            <div class="elementor-widget-container">
            <div style="position:relative;padding-top:26%;">
            <iframe src="https://ustpstratcomm.github.io/banner_embed/" frameborder="0" allowfullscreen="" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
            </div> </div>
            </div>
            </div>
            </div>
            </div>
            </section>

        </main>

        <div class="header">
                    <h1>Welcome to USTP Claveria</h1>
                </div>
                <div class="campus-section">
                    <h2 class="campus-title">About USTP Claveria</h2><br>
                    <div class="campus">
                        <div class="elementor-widget-container">
                            <img src="image/CLAVERIA02 (1).jpg" alt="" style="width: 700px;">
                        </div>
                        <div class="campus-info">
                            <h3>USTP Claveria</h3>
                            <div class="elementor-widget-container">
                                <p>The USTP Claveria is another major campus under the USTP System strategically located at the heart of Eastern Misamis Oriental in the idyllic town of Claveria, Misamis Oriental. A campus invigorated with a natural fresh air, clean, cool, and friendly environment, it has a total land area of 104 hectares and is home to the AGROPOLIS Science and Technology Park.</p>
                                <p>The campus is CHED-recognized as a Center of Development in Agriculture and is acknowledged as a Top 4 Performing SUC with the Highest Number of Level III Accredited Programs in 2020 as adjudged by AACCUP, Inc. The USTP Claveria’s niche programs include the Bachelor of Science in Agriculture and the Bachelor of Science in Environmental Engineering. The campus also offers on-demand academic programs that ensure total students personality development from the fields of Agriculture as the flagship program to Environmental Management and Food Technology, and is consistent with the goals of national development promoting research, advanced studies, as well as professional leadership in the various disciplines and areas of specialization.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br></br>
                <br></br>
                <div class="campus">
                    <div class="elementor-widget-container">
                        <div class="iframe-container">
                          <iframe class="elementor-video round-border" frameborder="0" allowfullscreen="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" title="USTP Claveria" width="1000" height="562" src="https://www.youtube.com/embed/DUXahy4xdAQ?controls=1&amp;rel=0&amp;playsinline=1&amp;modestbranding=0&amp;autoplay=1&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fwww.ustp.edu.ph&amp;widgetid=1" id="widget2"></iframe>
                        </div>
                    </div>
                </div>
                <br></br>
                <br></br>
                <div class="campus-section">
                    <h2 class="campus-title">Colleges</h2><br>
                    <div class="campus">
                        <div class="elementor-widget-container">
                            <img src="image/college-of-agriculture-cover-page-2048x758.jpg" alt="" style="width: 700px;">
                        </div>
                        <div class="campus-info">
                            <h3>College of Agriculture</h3>
                            <div class="elementor-widget-container">
                                <p>The College of Agriculture of the University of Science and Technology of southern Philippines (USTP) handles the flagship academic programs as the center peace of USTP Caveria.</p>
                            </div>
                        </div>
                    </div>
                    <div class="campus">
                        <div class="elementor-widget-container">
                            <img src="image/college-of-engineering_coverpage-1024x379.jpg" alt="" style="width: 700px;">
                        </div>
                        <div class="campus-info">
                            <h3>College of Engineering and Technology</h3>
                            <div class="elementor-widget-container">
                                <p>The College of Engineering and Technology (CET) is one of the 3 Colleges of USTP Claveria Campus focuses primarily on the applied aspects of science in information and communications technology, hospitality, tourism and environmental management and engineering.</p>
                            </div>
                        </div>
                    </div> 
                    <div class="campus">
                        <div class="elementor-widget-container">
                            <img src="image/college-of-arts_and_sciences-cover_page-1024x379.jpg" alt="" style="width: 700px;">
                        </div>
                        <div class="campus-info">
                            <h3>College of Arts and Sciences</h3>
                            <div class="elementor-widget-container">
                                <p>The College of Arts and Sciences (CAS) acts as the service College providing Outcomes-Based Quality Education for general education instruction to students of the 10 Curricular Offerings of the USTP Claveria.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        <br>
        
        <footer>
            <p>Copyright &copy; 2024 Campus News Portal</p>
            <p>DISCLAIMER: This site is for educational purposes only. All rights reserved.</p>
        </footer>
    </body>
</html>