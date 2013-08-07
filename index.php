<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?>
    </head>
    <body>        
       <?php include 'loginPanel.php'; ?>
        
        <br><br><br><br><br>
        
        <?php
       
        mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("maindatabase") or die(mysql_error());

	$result = mysql_query("SELECT * FROM users") 
	or die(mysql_error());  
	
	/* Debug database connection
	while($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo ' | ';
            foreach($line as $col_value) {
                echo ' | ';
            } 
            echo '<br><p>';
	}
	*/
	
        echo $result;
        ?>
        
    </body>
</html>
