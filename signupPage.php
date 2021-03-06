<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php'; ?>  
        <?php include 'signupPanel.php'; ?> 
        
        <script type="text/javascript">
        
        // On clicking on a form field, there are 2 outcomes:
        // 1) The field still contains the default string, if so set caret position to beginning e.g. |Profile Name
        // 2) The field has changed from it's default value, if so highlight the contents
        
        // On first keypress in a form field, always delete the contents
        
        
        // Default registration form fields
        var profileNameDefault = "Profile Name";
        var firstNameDefault = "First Name";
        var lastNameDefault = "Last Name";
        var emailDefault = "Email Address";
        var passwordDefault = "Password";
        var regFormFieldDefaults = [profileNameDefault,
                                    firstNameDefault,
                                    lastNameDefault,
                                    emailDefault,
                                    passwordDefault,
                                    ];
        
        // jQuery: Set caret position to beginning of this fields text but retain text (on click)
        $("#profileName").click(function(e){
            e.preventDefault();
            var txt = $("#profileName").val(); 
            if (txt === "Profile Name") setCaretPosition('profileName', 0);
        });
           
        /*$("#profileName").keypress(function() {
            var txt = $("#profileName").val(); 
            if (txt.length === 0) $("#profileName").val("Profile Name");
        });*/
        
        // jQuery: Delete contents of form field if it still contains default value (on key press).
        $("#profileName").keypress(function() {
            var txt = $("#profileName").val(); 
            if (txt === "Profile Name") $("#profileName").val("");
            //else if (txt.length === 0) $("#profileName").val("Profile Name");
        });

        // Sets the caret position to the beginning of a form field
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

        // Check to see if a form field content exists in the pre-populated PHP arrays
        function in_array(array, id) {
            for(var i=0; i<array.length; i++) {
                if(array[i] === id) {
                    return true;
                }
            }
            return false;
        }
        
        // Checks if the entered Email Address syntax is correct with a regular expression
        // If this is passed, it then checks the availability of Profile Name and Email Address.
        // TODO: Banned list of URLs in email, and add PHP hashing to password 
        
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

        // Function fired when the Registration form is submitted.
        window.onload = function() {
            document.getElementById('regForm').onsubmit = validateEmail;
            //document.getElementById('profileName').onclick = setCaretPosition('profileName', 0);
        };
        
        </script>             
    </head>
    <body>        
        <div id="validateFailMessage">&nbsp;</div>
    </body>
</html>
