<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?>
    </head>
    <body>
        <?php include 'controlPanel.php'; ?>
        <?php
  
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("maindatabase") or die(mysql_error());

            $formProfileName = $_POST["profileName"];
            $formFirstName = $_POST["firstName"];
            $formLastName = $_POST["lastName"];
            $formEmail = $_POST["email"];
            $formPassword = $_POST["password"];
           
            /*echo 'Form profile name is: ' . $formProfileName;
            echo '<br>';
            echo 'Form first name is: ' . $formFirstName;
            echo '<br>';
            echo 'Form last name is: ' . $formLastName;
            echo '<br>';
            echo 'Form email is: ' . $formEmail;
            echo '<br>';
            echo 'Form password is: ' . $formPassword;*/
            
            $result = mysql_query("SELECT * FROM users");
            $dbsize = mysql_num_rows($result);

            $newUserUid = $dbsize + 1000;
 
            $newuser = mysql_query("INSERT INTO `users` (`uid`, `regDate`, `firstName`, `surname`, `email`, `password`, `profileName`) VALUES
            ('".$newUserUid."', '2013-07-13', '".$formFirstName."', '".$formLastName."', '".$formEmail."', '".$formPassword."', '".$formProfileName."');");

            ?> <div id="subHeading"> <?php echo $formFirstName . " " . $formLastName; ?></div><?php
        ?> 
            
            <div id="regCompleteMessage">Registration complete</div>
    </body>
</html>
