<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?>  
        <?php include 'signupPanel.php'; ?> 
        
        <script type="text/javascript">
        
        $("#profileName").click(function(e){
            e.preventDefault();
            var txt = $("#profileName").val(); 
            if (txt === "Profile Name") setCaretPosition('profileName', 0);
        });
        
         
        /*$("#profileName").keypress(function() {
            var txt = $("#profileName").val(); 
            if (txt.length === 0) $("#profileName").val("Profile Name");
        });*/
        
        $("#profileName").keypress(function() {
            var txt = $("#profileName").val(); 
            if (txt === "Profile Name") $("#profileName").val("");
            //else if (txt.length === 0) $("#profileName").val("Profile Name");
        });

        
        function setCaretPosition(elemId, caretPos) {
            var el = document.getElementById(elemId);
            if (el !== null) {
                if (el.createTextRange) {
                    var range = el.createTextRange();
                    range.move('character', caretPos);
                    range.select();
                } else {
                    if (el.selectionStart || el.selectionStart === 0) {
                        el.focus();
                        el.setSelectionRange(caretPos, caretPos);
                    } else  {
                        el.focus();
                    }
                }
            }
        }

        function in_array(array, id) {
            for(var i=0;i<array.length;i++) {
                if(array[i] === id) {
                    return true;
                }
            }
            return false;
        }
        
        function validateEmail() {
            var emailText = document.getElementById('email').value;
            var profileNameText = document.getElementById('profileName').value;
            var emailObj = <?php echo json_encode($emailArray); ?>;
            var profileNameObj = <?php echo json_encode($profileNameArray); ?>;
            var emailInUse = in_array(emailObj, String(emailText));
            var profileNameInUse = in_array(profileNameObj, String(profileNameText));
            var regExp = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
            if (regExp.test(emailText) && !emailInUse && !profileNameInUse) {
                //alert('Good email address: ' + emailText);
                document.getElementById("validateFailMessage").style.borderColor="#ffffff";
                document.getElementById("validateFailMessage").style.display="none";
                document.getElementById("validateFailMessage").innerText = "";
                return true;
            } else if (!emailInUse && !profileNameInUse) {
                //alert('Bad email address: ' + emailText);
                document.getElementById("validateFailMessage").style.borderColor="#ff0000";
                document.getElementById("validateFailMessage").style.display="block";
                document.getElementById("validateFailMessage").innerText = "Please enter a valid email address";
                return false;
            } else if (profileNameInUse) { // Profile name is already in use
                document.getElementById("validateFailMessage").style.borderColor="#ff0000";
                document.getElementById("validateFailMessage").style.display="block";
                document.getElementById("validateFailMessage").innerText = String(profileNameText) + " is already in use";
                return false;
            } else if (emailInUse) { // Email is already in use
                document.getElementById("validateFailMessage").style.borderColor="#ff0000";
                document.getElementById("validateFailMessage").style.display="block";
                document.getElementById("validateFailMessage").innerText = String(emailText) + " is already in use";
                return false;
            }
        };

        window.onload = function() {
            document.getElementById('email_form').onsubmit = validateEmail;
            //document.getElementById('profileName').onclick = setCaretPosition('profileName', 0);
        };
        
        </script>             
    </head>
    <body>        
        <div id="validateFailMessage">&nbsp;</div>
    </body>
</html>
