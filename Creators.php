<!DOCTYPE html>
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

            html {
              box-sizing: border-box;
            }

            *, *:before, *:after {
              box-sizing: inherit;
            }

            .column {
              float: left;
              width: 30%;
              margin-bottom: 16px;
              padding: 20px 100px;
            }

            .card {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
              margin: 8px;
            }

            .container {
              padding: 0 16px;
            }

            .container::after, .row::after {
              content: "";
              clear: both;
              display: table;
            }

            @media screen and (max-width: 650px) {
              .column {
                width: 100%;
                display: block;
              }
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
                    <li class="logout-btn"><a href="Login.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <main>
            <h1>Creators</h1>
            <p>Stay updated with the latest campus news and updates.</p><br>

            <div class="row">
               <div class="column">
                <div class="card">
                   <img src="image/IMG_1208.JPG" alt="" style="width: 100%">
                  <div class="container">
                    <h2>Valer F. Mabayo</h2>
                    <address>
                        Course: Bachelor of Science in Information Technology<br></br>
                        Address: Zone 6B Artadi St. Poblacion, Claveria, Misamis Oriental<br>
                        <p></p>
                    </address>
                  </div>
                </div>
              </div>

              <div class="column">
                <div class="card">
                  <img src="image/roy.png" alt="" style="width: 100%">
                  <div class="container">
                    <h2>Royet N. Tagarao</h2>
                    <address>
                        Course: Bachelor of Science in Information Technology<br></br>
                        Address:Tamboboan, Claveria, Misamis Oriental<br>
                        <p></p>
                    </address>
                  </div>
                </div>
              </div>
              
             <div class="column">
                <div class="card">
                   <img src="image/van.jpg" alt="" style="width: 100%">
                  <div class="container">
                    <h2>Van Harim F. Maglinao</h2>
                    <address>
                        Course: Bachelor of Science in Information Technology<br></br>
                        Address: Zone 6 Artadi St. Poblacion, Claveria, Misamis Oriental<br>
                        <p></p>
                    </address>
                  </div>
                </div>
              </div>
            </div>
        </main>

            <br></br>
            <br></br>

        <footer>
            <p>Copyright &copy; 2024 Campus News Portal</p>
            <p>DISCLAIMER: This site is for educational purposes only. All rights reserved.</p>
        </footer>
    </body>
</html>