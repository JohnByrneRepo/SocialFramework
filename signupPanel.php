<div id="subHeading">Sign Up</div>

<form id="regForm" action="registrationPage.php" method="post">
    <div id="regProfileNameField"><input type="text" id="profileName" name="profileName" size="26" value="Profile Name"></div><br>
    <div id="regFirstNameField"><input type="text" name="firstName" size="26" value="First Name"></div><br>
    <div id="regLastNameField"><input type="text" name="lastName" size="26" value="Last Name"></div>
    <div id="regEmailField"><input type="text" id="email" name="email" size="26" value="Email Address"></div>
    <div id="regPasswordField"><input type="password" name="password" size="26" value="Password"></div>
    <input type="submit" value="" name="commit" id="message_submit" class="validateRegDetailsButton"/>
</form>    


<?php
    mysql_connect("localhost", "root", "") or die(mysql_error());
    mysql_select_db("maindatabase") or die(mysql_error()); 

    $result = mysql_query("SELECT * FROM users");
    $dbsize = mysql_num_rows($result);
    
    //echo '<br>Database size = ' . $dbsize;
    //echo '<br>All emails:';
    
    $emailArray = array();
    $profileNameArray = array();
    
    for($itm_count = 0; $itm_count < $dbsize; $itm_count++)
    {   
        $rowLookup = mysql_query("SELECT * FROM users LIMIT " . $itm_count . ", " . $dbsize);
        $rowData = mysql_fetch_assoc($rowLookup);
        $email = $rowData['email'];
        $profileName = $rowData['profileName'];
        $emailArray[$itm_count] = $email;
        $profileNameArray[$itm_count] = $profileName;
    }
    
    //echo '<br>Email array: ' . json_encode($emailArray);
    //echo '<br>Profile names array: ' . json_encode($profileNameArray);
    
?>
