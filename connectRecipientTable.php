<?php

$result = mysql_query("SELECT * FROM users");
$dbsize = mysql_num_rows($result);

$emailArray = array();
$profileNameArray = array();

?>

<!-- ------------------------------------------------------------------------------------ -->
<!--                           Recipient selection grid                                   -->

<!-- <table id="content_1" class="content" border=1 bordercolor=#777777 cellpadding=7 cellspacing=3>-->

<table id=connectMessagingRecipientTable border=1 bordercolor=#777777 cellpadding=7 cellspacing=3>

        <?php for($itm_count = 0; $itm_count < $dbsize; $itm_count++)
        {   
            if ($itm_count % 4 == 0) echo '<tr>';

            $rowLookup = mysql_query("SELECT * FROM users LIMIT " . $itm_count . ", " . $dbsize);
            $rowData = mysql_fetch_assoc($rowLookup);
            $receiverUid = $rowData['uid'];
            $profileName = $rowData['profileName'];

            // Avatar
            ?>
            <td id=connectMessagingRecipientTable bgcolor=#ffffff halign=center>
                  <img width="75" height="75" src="avatars/<?php echo $receiverUid ?>.png">
                  <br>
            
            <form id="connectForm1" action="messageComposer.php" method="post">
                <a href="javascript:;" onclick="parentNode.submit();">
                     <?php echo 'ⓜ' . $profileName; ?>
                     <?php //echo '▷' . $profileName; ?>
                </a>
                <input type="hidden" name="mailRecipient" id="message_submit" value="<?php echo $receiverUid; ?>"/>
            </form>
            <!--</td>-->
            <!--<td id="connectMessagingRecipientPadding"></td>-->
            <?php if ($itm_count % 4 == 3) echo '</tr>';     
        } ?>

</table>
