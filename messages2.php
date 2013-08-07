<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?>
    </head>
    <body>        
       <?php include 'controlPanel.php'; ?>
        
        <br><br><br><br><br>
        <div id="subHeading">Select recipient</div>
        <div id="subHeadingYourMessages">Your messages</div>
        <?php
        session_start();
        $uid = $_SESSION['uid'];
        
        mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("maindatabase") or die(mysql_error()); 

        $result = mysql_query("SELECT * FROM users");
        $dbsize = mysql_num_rows($result);

        
        echo '<table id=messagingMainTable border=1 bordercolor=black cellpadding=7 cellspacing=3>';
 
            // RECIPIENT GRID

            echo '<td width=340>';
            //echo '<table id=messagingRecipientTable border=1 bordercolor=black cellpadding=7 cellspacing=3>';

            for($itm_count = 0; $itm_count < $dbsize; $itm_count++)
            {   
                if ($itm_count % 4 == 0) echo '<tr>';

                $rowLookup = mysql_query("SELECT * FROM users LIMIT " . $itm_count . ", " . $dbsize);
                $rowData = mysql_fetch_assoc($rowLookup);
                $receiverUid = $rowData['uid'];
                $profileName = $rowData['profileName'];

                //echo '<td width="200">' . $profileName . '</td>';
                echo '<td width="60" height="60" bgcolor="#8888aa" halign="center" ><img src="avatars/1001.png"></td>';
                ?>
                <td bgcolor="#ccccff" halign="center" >
                    <form id="form1" action="messageComposer.php" method="post">
                        <a href="javascript:;" onclick="parentNode.submit();">
                            <?php echo $profileName; ?>
                        </a>
                        <input type="hidden" name="mailRecipient" id="message_submit" value="<?php echo $receiverUid; ?>"/>
                    </form>
                </td>
                <?php

                if ($itm_count % 4 == 3) echo '</tr>';

            }
            // echo '</table>';
            echo '</td>';
            
            // INDEX

            $result2 = mysql_query("SELECT * FROM messages");
            $dbsize2 = mysql_num_rows($result2);

            echo '<td width=240>';
            //echo '<table id=messagingIndexTable border=1 bordercolor=black cellpadding=7 cellspacing=3>';

            for($itm_count = 0; $itm_count < $dbsize2; $itm_count++)
            {   
                echo '<tr>';

                $msgLookup = mysql_query("SELECT * FROM messages LIMIT " . $itm_count . ", " . $dbsize);
                $rowData2 = mysql_fetch_assoc($msgLookup);
                $content = $rowData2['content'];
                $id = $rowData2['uid'];

                if ($id == $uid) {
                    $sid = $rowData2['sid'];
                    $senderProfileNameLookup = mysql_query("SELECT * FROM users WHERE uid = '$sid'");
                    $rowData3 = mysql_fetch_assoc($senderProfileNameLookup);
                    $senderProfileName = $rowData3['profileName'];
                    echo '<td>Message ' . $itm_count . ': ';
                    echo '<br>Sender: ' . $senderProfileName;
                    echo '<br>Content: ' . $content . '</td>';
                    echo '</tr>';
                }

            }
            //echo '</table>';  
            echo '</td>';
            
            // INBOX

            $result2 = mysql_query("SELECT * FROM messages");
            $dbsize2 = mysql_num_rows($result2);

            echo '<td width=280>';
            //echo '<table id=messagingInboxTable border=1 bordercolor=black cellpadding=7 cellspacing=3>';

            for($itm_count = 0; $itm_count < $dbsize2; $itm_count++)
            {   
                echo '<tr>';

                $msgLookup = mysql_query("SELECT * FROM messages LIMIT " . $itm_count . ", " . $dbsize);
                $rowData2 = mysql_fetch_assoc($msgLookup);
                $content = $rowData2['content'];
                $id = $rowData2['uid'];

                if ($id == $uid) {
                    $sid = $rowData2['sid'];
                    $senderProfileNameLookup = mysql_query("SELECT * FROM users WHERE uid = '$sid'");
                    $rowData3 = mysql_fetch_assoc($senderProfileNameLookup);
                    $senderProfileName = $rowData3['profileName'];
                    echo '<td>Message ' . $itm_count . ': ';
                    echo '<br>Sender: ' . $senderProfileName;
                    echo '<br>Content: ' . $content . '</td>';
                    echo '</tr>';
                }

            }
            //echo '</table>';
            echo '</td>';
                   
        echo '</table>';       
        
        
        // OUTBOX
        
        $result3 = mysql_query("SELECT * FROM messages");
        $dbsize3 = mysql_num_rows($result2);
/*
        echo '<table id=messagingOutboxTable border=0 bordercolor=white cellpadding=7 cellspacing=3>';
        echo 'Sent messages';
        
        for($itm_count = 0; $itm_count < $dbsize3; $itm_count++)
        {   
            echo '<tr>';
            
            $msgLookup = mysql_query("SELECT * FROM messages LIMIT " . $itm_count . ", " . $dbsize);
            $rowData3 = mysql_fetch_assoc($msgLookup);
            $content = $rowData3['content'];
            $id = $rowData3['sid'];
            
            if ($sid == $uid) {
                $id = $rowData2['sid'];
                $receiverProfileNameLookup = mysql_query("SELECT * FROM users WHERE uid = '$sid'");
                $rowData3 = mysql_fetch_assoc($receiverProfileNameLookup);
                $senderProfileName = $rowData3['profileName'];
                echo '<td>Message ' . $itm_count . ': ';
                echo '<br>Receiver: ' . $receiverProfileNameLookup;
                echo '<br>Content: ' . $content . '</td>';
                echo '</tr>';
            }
            
        }
        echo '</table>';       
*/                
        ?>
        
    </body>
</html>
