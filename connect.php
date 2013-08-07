<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <?php
        session_start();
        $uid = $_SESSION['uid'];
        ?>
        <?php include 'header.php'; ?>
        <link rel="stylesheet" type="text/css" href="css/connect.css">
        <style>
		h1{font-family:Georgia,serif; font-size:18px; font-style:italic; margin:40px; color:#26beff;}
		p{margin:0 0 20px 0;}
		hr{height:0; border:none; border-bottom:1px solid rgba(255,255,255,0.13); border-top:1px solid rgba(0,0,0,1); margin:9px 10px; clear:both;}
		.links{margin:10px;}
		.links a{display:inline-block; padding:3px 15px; margin:7px 10px; background:#444; text-decoration:none; -webkit-border-radius:15px; -moz-border-radius:15px; border-radius:15px;}
		.links a:hover{background:#eb3755; color:#fff;}
		.content{
                    /*margin:40px; width:260px; height:500px; padding:20px; */
                    overflow:auto; background:#333; 
                    -webkit-border-radius:3px; -moz-border-radius:3px; border-radius:3px;
                    position: absolute;
                    top: 120px;
                    left: 22px;
                    width:502px;
                    border:0px;
                    overflow-y:scroll;
                    height:300px;
                    display:block;
                }
		.content p:nth-child(even){color:#999; font-family:Georgia,serif; font-size:17px; font-style:italic;}
		.content p:nth-child(3n+0){color:#c96;}
	</style>
        <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css">   
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
        <script src="js/jquery.mCustomScrollbar.js"></script>
	<script>
		(function($){
			$(window).load(function(){
				$("#content_1").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
			});
		})(jQuery);
	</script>            
    </head>
    <body>  
    <!--<div id="pagewrap">  -->
    
        <div id="subHeading">Connect</div>
        
        <?php
        mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("maindatabase") or die(mysql_error()); 
        ?>

        <?php include 'controlPanel.php'; ?>
  
        <?php
        $result2 = mysql_query("SELECT * FROM messages");
        $dbsize = mysql_num_rows($result2);
        $msgsReceived = 0;
        for($itm_count = 0; $itm_count < $dbsize; $itm_count++)
        {        
            $msgLookup = mysql_query("SELECT * FROM messages LIMIT " . $itm_count . ", " . $dbsize);
            $rowData2 = mysql_fetch_assoc($msgLookup);
            $content = $rowData2['content'];
            $id = $rowData2['uid'];
            if ($id == $uid) $msgsReceived++;
        }
        ?>
        
        <!--<div id="connectSelectContactIcon">&nbsp;</div>-->
        
        <centre>
            <table id=connectTableTitlesTable valign="top" width="100%">  
                <td valign="top" width="10%"></td>
                <td valign="top" width="35%"><div id="connectSelectContact">Select Contact</div></td>
                <td valign="top" width="20%"><div id="connectIndexTitle">Index</div></td>
                <td valign="top" width="25%"><div id="connectInboxTitle">Inbox<?php echo ' (' . $msgsReceived . ')';?></div></td>
                <td valign="top" width="10%"></td>
                
            </table>
        </centre>
    
        <centre>
            <table id=connectTableGrid valign="top" width="100%">   
                <td valign="top" width="10%"></td>
                <td valign="top" width="35%"><?php include 'connectRecipientTable.php'; ?></td>
                <td valign="top" width="20%"><?php include 'connectIndexTable.php'; ?></td>
                <td valign="top" width="25%"><?php include 'connectInboxTable.php'; ?></td>
                <td valign="top" width="10%"></td>
                
            </table>
        </centre>
        
        <?php
        // OUTBOX
        
        //$result3 = mysql_query("SELECT * FROM messages");
        //$dbsize3 = mysql_num_rows($result2);
        ?>

    <!--</div>    -->
    </body>
</html>