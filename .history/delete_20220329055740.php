

<?php

?>

<script>
        function geeks(msg, gfg) {
            var confirmBox = $("#container");
             
            /* Trace message to display */
            confirmBox.find(".message").text(msg);
             
            /* Calling function */
            confirmBox.find(".yes").unbind().click(function()
            {
            confirmBox.hide();
            });
            confirmBox.find(".yes").click(gfg);
            confirmBox.show();
             
            confirmBox.find(".no").unbind().click(function()
            {
            confirmBox.hide();
            });
            confirmBox.find(".no").click(gfg);
            confirmBox.show();
        }
    </script>