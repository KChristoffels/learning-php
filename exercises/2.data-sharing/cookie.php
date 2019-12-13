<?php
print_r($_COOKIE["joke"]) ;

?>

<html>
<body>


<form action = "" onsubmit="createCookie()">
    Name: <input type = "text" name = "cookie" id="input"/>
    <input type = "submit" />
</form>
<script>



    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function createCookie() {
        let joke = document.getElementById("input").value;
        console.log(joke);
        if (joke != "" && joke != null) {
            setCookie("joke", joke, 30);
        }
    }
</script>
</body>
</html>
