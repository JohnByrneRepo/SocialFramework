<!-- ------------------------------------------------------------------------------------ -->
<!--                                    Inbox                                             -->
<?php
$result = mysql_query("SELECT * FROM messages");
$dbsize = mysql_num_rows($result);
?>
<table id=connectMessagingInboxTable border=0 bordercolor=white cellpadding=7 cellspacing=3>
    <?php
    for($itm_count = 0; $itm_count < $dbsize2; $itm_count++)
    {
        $msgLookup = mysql_query("SELECT * FROM messages LIMIT " . $itm_count . ", " . $dbsize);
        $rowData = mysql_fetch_assoc($msgLookup);
        $content = $rowData['content'];
        $id = $rowData['uid'];
        if ($id == $uid) {
            echo '<tr>';
            $msgsReceived++;
            $sid = $rowData['sid'];
            $senderProfileNameLookup = mysql_query("SELECT * FROM users WHERE uid = '$sid'");
            $rowData = mysql_fetch_assoc($senderProfileNameLookup);
            $senderProfileName = $rowData['profileName'];
            ?>
            <td id=connectMessagingInboxTable bgcolor=#ffffff>
            <img width="25" height="25" src="avatars/<?php echo $sid ?>.png">
            <?php
            echo '»' . $senderProfileName;
            echo '<br><br>Content: ' . $content . '</td>';
            echo '</tr>';
        }
    }
    ?>
</table>
