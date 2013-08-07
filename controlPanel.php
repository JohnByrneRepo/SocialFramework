<!--<a href="index.php"><div class="controlPanelLogOutButton">&nbsp;</div></a>-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" >
    $(document).ready(function() {
        $(".controlPanelArrow").click(function() {
            var X = $(this).attr('id');
            if(X === 1) {
                $(".controlPanelSubmenu").hide();
                $(this).attr('id', '0');	
            } else {
                $(".controlPanelSubmenu").show();
                $(this).attr('id', '1');
            }
        });

        //Mouseup textarea false
        $(".controlPanelSubmenu").mouseup(function() { return false; });
        $(".controlPanelArrow").mouseup(function() { return false; });

        //Textarea without editing.
        $(document).mouseup(function() {
            $(".controlPanelSubmenu").hide();
            $(".controlPanelArrow").attr('id', '');
        });

    });
	
</script>

<div id="controlPanelOptionsMain">&nbsp;</div>
<!--<div id="optionsArrow" >&nbsp;</div>-->

<div style='margin:50px'>	
    <div class="controlPanelDropdown">  
        <a class="controlPanelArrow" >
        </a>
        <div class="controlPanelSubmenu" style="display: none;">
          <ul class="root">
            <li >
              <a href="#Home" >Home</a>
            </li>
            <li >
              <a href="#Personalise" >Personalise</a>
            </li>
           <li >
              <a href="#Security">Security</a>
            </li>
            <li>
              <a href="#Groups">Groups</a>
            </li>
            <li>
              <a href="#Connect">Connect</a>
            </li>           
            <li>
              <a href="#Index">Index</a>
            </li>           
            <li>
              <a href="index.php">Log out</a>
            </li>
          </ul>
        </div>
    </div>	
</div>

<a href="connect.php"><div id="controlPanelIconMessage">&nbsp;</div></a>
<!--<div id="controlPanelAvatar">&nbsp;</div>-->