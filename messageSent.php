<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?> 
        <?php include 'controlPanel.php'; ?>       
    </head>
    <body>
        <?php 
            mysql_connect("localhost", "root", "") or die(mysql_error());
            mysql_select_db("maindatabase") or die(mysql_error());

            $formMailRecipient = $_POST["receiverUid"];
            $formContent = $_POST["content"];
            
            //echo '<br>Form mail recipient is: ' . $formMailRecipient;
            //echo '<br>Form content is: ' . $formContent;
            
            $result = mysql_query("SELECT * FROM messages");
            $dbsize = mysql_num_rows($result);
            $messageNumber = $dbsize;      
            
            $rowLookup = mysql_query("SELECT * FROM users Where uid = '$formMailRecipient'");
            $rowData = mysql_fetch_assoc($rowLookup);
            $receiverProfileName = $rowData['profileName'];
            $receiverFirstName = $rowData['firstName'];
            $receiverLastName = $rowData['surname'];
            $receiverEmailAddress = $rowData['email'];
            session_start();
            $senderUid = $_SESSION['uid'];
            
            $newMessage = mysql_query("INSERT INTO `messages` (`messageNumber`, `uid`, `sid`, `date`, `content`, `hasBeenRead`) VALUES
            ('".$messageNumber."', '".$formMailRecipient."', '".$senderUid."', '2013-07-13', '".$formContent."', '". '0' ."');");
            
         ?>
         <div id="subHeading">Message sent to <?php echo $receiverProfileName; ?></div>
    </body>
</html>
