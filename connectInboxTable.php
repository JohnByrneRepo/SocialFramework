<!-- ------------------------------------------------------------------------------------ -->
<!--                                    Inbox                                             -->
<?php
$result2 = mysql_query("SELECT * FROM messages");
$dbsize2 = mysql_num_rows($result2);
?>
<table id=connectMessagingInboxTable border=0 bordercolor=white cellpadding=7 cellspacing=3>
    <!--<div id="connectInboxIcon">&nbsp;</div>-->
    <?php
    for($itm_count = 0; $itm_count < $dbsize2; $itm_count++)
    {
        $msgLookup = mysql_query("SELECT * FROM messages LIMIT " . $itm_count . ", " . $dbsize);
        $rowData = mysql_fetch_assoc($msgLookup);
        $content = $rowData['content'];
        $id = $rowData2['uid'];
        if ($id == $uid) {
            echo '<tr>';
            $msgsReceived++;
            $sid = $rowData['sid'];
            $senderProfileNameLookup = mysql_query("SELECT * FROM users WHERE uid = '$sid'");
            $rowData3 = mysql_fetch_assoc($senderProfileNameLookup);
            $senderProfileName = $rowData3['profileName'];
            //echo '<td>Message ' . $itm_count . ': ';
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
