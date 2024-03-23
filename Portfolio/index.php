<?php
include('admin/includes/conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nephyy Portfolio</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel='stylesheet' href='tindex.css' type='text/css'>
    
</head>
<body>
    <header class="header">
        <div class="container">
            <img class="minilogo" src="assets/logoblack.png">
            <p class="logotxt"> Nephyy's Portfolio </p>
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Me</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Resume</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="S1"> <!--landing pg div-->
        <div class="animated-background"></div>
        <section class="section1"> <!--first section-->
            <img class="logotext" src="assets/logotext.png">
            <div class="p-text">
            <a> <b>Discover the magic of design come to life: </b></a>
            </div>
            <br>
            <div  class="d-text">
            <a>Feel free to browse around my portfolio... where every click unlocks a world of creativity, innovation, inspiration, and endless exploration. Let your journey of discovery begin!</a>
            </div>
        </section>
        </div>
    </div> <!-- closing of landing pg div-->
    

    <div class="S2"> <!--2nd landing section-->
        <section class="section2">  <!--second section-->
            
            <div class="aboutdiv">
                <span class="material-icons md-48">done_outline</span> CHECK THIS OUT >>>
            </div>
            
            <div class ="aboutpic">
                <img src="assets/pic1.JPG">
                <div class="overlaytext">
                    <h1> Hi, I'm Nephyy</h1>
                    <p class="desc"> Hello! I'm Nephertilee T. Saddarani, 
                        a 21-year-old currently pursuing BSIT. However, my true passion lies in the realms of BS Animation or Multimedia.
                        <br>Drawing is my forte, and I excel particularly in the digital domain, where I bring my artistic vision to life.  </a>
                        <br>I am driven by an insatiable curiosity and enthusiasm to explore diverse artistic realms, constantly seeking new techniques, styles, and mediums day by day to expand my creative repertoire. </p>
                </div>
                <button>Discover More</button>
            </div>
            
        </section>
    </div> <!-- closing of 2nd landing pg div-->

    <div class="S3"> <!-- 3rd section-->
        <section class="section3">  <!--third section--> 
        
            <h2> Curious on what I can do? </h2>
            <div class="choose">
                <p class="desc"> Click and see more</p>
            </div>

            <div class="grid-container">
                <div class="grid1">
                    <span class="material-icons md-100">edit_square</span>
                    <div class="arttitle1">Digital Arts</div>
                    <div class="artdesc1"> Captivate the collection of my digital artworks, each piece a testament to my creative journey and evolving artistic expression</div>
                </div>

                <div class="grid2">
                    <span class="material-icons md-100">open_in_browser</span>
                    <div class="arttitle1">Published Arts</div>
                    <div class="artdesc1">Artworks from this section are from my publication journey.</div>
                </div>

                <div class="grid3">
                    <span class="material-icons md-100">edit_document</span>
                    <div class="arttitle1">Traditional Arts</div>   
                    <div class="artdesc1">These artworks showcased here are precious drawings that have withstood the test of time, hailing from my junior high school days. </div>
                </div>
                <div><button class="artbutton">See More</button> </div>
            </div>
        </section>

    </div> <!-- closing of 3rd section pg div-->

    <div class="S4"> <!-- Send MEssage section-->
        <section class="section4"> <!-- 4th section-->
            
            <div class="char-container">
                <div class="messagebox">
                   
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Leave A Message!</h4>
                        <form action="contact.php" class="comment-form" method="POST" >
                        <div class="mailbox">
                        <input type="email" class="left-aligned-input"  name="email" placeholder="your email here..." />
                    </div>
                    <div class="textbox">
                        <input type="text" class="left-aligned-input" name="message" class="feedb" placeholder="your message here..." />
                    </div>
                    <button class="msgbutton" name="submit_msg"> Send Message</button>
                        </form>
                        <img src="assets/char.png" alt="Above Image" class="above-image">
                        
               
                        <!--<a class="message">Let's Talk!</a>
                    <div class="mailbox">
                        <input type="email" class="left-aligned-input"  placeholder="your email here..." />
                    </div>
                    <div class="textbox">
                        <input type="email" class="left-aligned-input" class="feedb" placeholder="your message here..." />
                    </div>
                </div>
                <img src="assets/char.png" alt="Above Image" class="above-image">
                <button class="msgbutton"> Send Message</button> -->


            </div>



        </section>
    </div> <!-- closing of 4th section pg div-->

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
}

if (isset($_POST['submit_msg'])) {
    $email = $_POST['email'];
    $message = $_POST['message'];
    $stmt = $conn->prepare("INSERT INTO contactme (email, message) VALUES (:email, :message)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    try {
        $stmt->execute();
        $_SESSION['status'] = "MSG_SUCCESS";
    } catch(PDOException $e) {
    }
}
?>

<?php
if(isset($_SESSION['status'])) {
    if(($_SESSION['status'] == 'MSG_SUCCESS'))
    echo "
    <script>
    Swal.fire({
      title: 'Succesful!',
      text: 'You have succesfully sent your message!',
      icon: 'success',
      confirmButtonText: 'Okay'
    });
  </script>";
  $_SESSION['status'] = "";
}

?>







    
    <footer><!-- footer -->
        <div class="footer-content">
            <div class="footer-left">
                <img class="minilogof" src="assets/logowhite.png">
                <h3>NEPHYY's PORTFOLIO</h3>
                <p>This portfolio website involves continuous learning and a commitment to improvement. Nephyy firmly believes that her talents are ever-evolving, and she eagerly anticipate exploring new crafts, arts, and visual designs for further growth.</p>
            </div>
            <div class="footer-right">
                <h3>Contact Me</h3>
                <p>Email: nephyytan@gmail.com</p>
                <p>Phone: 0977-424-6907</p>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Portfolio Website
        </div>
    </footer>


</body>
</html>