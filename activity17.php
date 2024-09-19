<html>
    <head>
        <title>AJAX Exercise 2</title>
    </head>
    <body>
        <h1>Introducing AJAX</h1>
        <p>This example demonstrates how we can get hints using AJAX</p>
        <p>Submitted by Mathews Binny</p>
        <hr>
        <p>Please type the name you want to search: </p>
        <div style="float:left;">
            <input type="text" onkeyup="showHint(this.value);" id="myinput" autocomplete="off">
            <div style = "display:none; border:1px black solid; height:120px;" id="hint"></div>
        </div>
        <script>
            function showHint(str) {
                if(str.length == 0) {
                    document.getElementById("hint").innerHTML = "";
                    document.getElementById("hint").style.display = "none";
                    return;
                }
            

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        var result = this.responseText;
                        if(result != "") {
                            document.getElementById("hint").style.display = "block";
                        } else {
                            document.getElementById("hint").style.display = "none";
                        }
                        document.getElementById("hint").innerHTML = result;
                    }
                }
                xhttp.open("GET","getHint.php?q="+str, true);
                xhttp.send();
            }

            function selectMe(name) {
                document.getElementById("myinput").value = name;
                document.getElementById("hint").style.display = "none";
            }

        </script>
    </body>
</html>