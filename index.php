<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?>
    </head>
    <body>        
       <?php include 'loginPanel.php'; ?>
        
        <br><br><br><br><br>
        
        <?php
        // Make a MySQL Connection
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("maindatabase") or die(mysql_error());

	// Get all the data from the "example" table
	$result = mysql_query("SELECT * FROM users") 
	or die(mysql_error());  
		
	while($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo ' | ';
            foreach($line as $col_value) {
                if ($col_value != 'Resource id #4') print "$col_value";
                echo ' | ';
            } 
            echo '<br><p>';
	}
		
        echo $result;
        ?>
        
    </body>
</html>
