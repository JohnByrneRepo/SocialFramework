<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?>
    </head>
    <body>
        <?php
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("maindatabase") or die(mysql_error());

            $formEmail = $_POST["email"];
            $formPassword = $_POST["password"];
           
            //echo '<br>Form email is: ' . $formEmail;
            //echo '<br>Form password is: ' . $formPassword;
            
            $emailLookup = mysql_query("SELECT * FROM users WHERE email = '$formEmail'");
            $emailRowData = mysql_fetch_assoc($emailLookup);
            
            $passwordLookup = mysql_query("SELECT * FROM users WHERE password = '$formPassword'");
            $passwordRowData = mysql_fetch_assoc($passwordLookup);
            
            $combinedLookup = mysql_query("SELECT * FROM users WHERE email = '$formEmail' AND password = '$formPassword'");
            $rowData = mysql_fetch_assoc($combinedLookup);
            
            /*$profileName = $rowData['profileName'];
            $firstName = $rowData['firstName'];
            $surname = $rowData['surname'];*/
            $uid = $rowData['uid'];
            
            //echo '<br>Form $firstName is: ' . $firstName;
            //echo '<br>Form $surname is: ' . $surname;
            
            if (!$emailRowData) {
                echo '<br>Email not found on database';
                include 'loginPanel.php';
            }
            else if (!$passwordRowData) {
                echo '<br>Incorrect password';
                include 'loginPanel.php';
            }    
            if ($rowData) {
                session_start();
                $_SESSION['uid'] = $uid;
                // User successfully logged in
                ?><div id="subHeading"><?php echo 'Profile'; ?></div><?php 
                include 'controlPanel.php';
            }
            else {
                echo '<br>Unsuccessfull login';
            }
         ?>
    </body>
</html>
