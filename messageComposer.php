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

            $formMailRecipient = $_POST["mailRecipient"];
            echo '<br>Form mail recipient is: ' . $formMailRecipient;
            
            $result = mysql_query("SELECT * FROM users");
            $dbsize = mysql_num_rows($result);

            $rowLookup = mysql_query("SELECT * FROM users Where uid = '$formMailRecipient'");
            $rowData = mysql_fetch_assoc($rowLookup);
            
            $receiverUid = $formMailRecipient;
            $receiverProfileName = $rowData['profileName'];
            $receiverFirstName = $rowData['firstName'];
            $receiverLastName = $rowData['surname'];
            $receiverEmailAddress = $rowData['email'];     
         ?>
         <div id="subHeading">Compose message</div>
         <br><br><br><br><br><br><br><br><br><br><br><br><br>
         <form id="email_form" action="messageSent.php" method="post">
            <div id="msgProfileNameField">Sending to: <?php echo $receiverProfileName; ?></div><br>
            <!--<div id="msgContentField">--><div class="scroll"><input type="text" id="msgContent" name="content" size="26" value="Enter message..."></div>
            <input type="submit" value="" name="commit" id="message_submit" class="submitMessageButton"/>
            <input type="hidden" name="receiverUid" value="<?php echo $receiverUid; ?>"/>
         </form> 

    </body>
</html>
