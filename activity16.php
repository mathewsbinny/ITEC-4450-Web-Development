<html>
    <head>
        <title>AJAX Example 1</title>
    </head>
    <body>
        <h1>Introducing AJAX</h1>
        <p>Submitted by Mathews Binny</p>
        <hr>
        <div id="mydoc">
        <h2>Example 1: Loading a very long article</h2>
        <p>This is an article about topic so and so</p>
        <button type="button" onclick="LoadDoc();">Click to read more</button>
        </div>
        <script>
            function LoadDoc(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        document.getElementById("mydoc").innerHTML = this.responseText;
                    }
                }   
                    //if status 0, request not initiated
                    //if status 1, server connection established
                    //if status 2, server request recieved
                    //if status 3, proessing request
                    //if status 4, request finished and response is ready
                    //200: OK
                    //403: forbidden
                    //404: Not found
                xhttp.open("GET","AjaxFile.txt", true);
                xhttp.send();
            }
        </script>

        <hr>
        <h2>Example 2: Update price</h2>
        <h3>The most recent stock price for AAPL is $<span id="myprice">169.34</span></h3>
        <script>
            var alarm = setInterval(loadPrice, 300);
            function loadPrice() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        document.getElementById("myprice").innerHTML = this.responseText;
                    }
                }
                xhttp.open("GET","AjaxAction1.php",true);
                xhttp.send();
            }
        </script>

        <hr>
        <h2>Example 3: Using progress bar when loading something that takes a long time</h2>
        <h3>Progress Made: <span id=pvalue>0</span>%</h3>
        <progress min="0" max="100" value="0" id="myprogress" style="display:none;"> </progress>
        <button type="button" onclick="loadInfo();" id="start">Start Loading</button>
        <script>
            function loadInfo() {
                var alarm2 = setInterval(showProgress, 300);
            }
            function showProgress() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        document.getElementById("pvalue").innerHTML = this.responseText;
                    }
                }
                var p = document.getElementById("pvalue").innerHTML;
                xhttp.open("GET","AjaxAction2.php?cp="+p,true);
                xhttp.send();
                if(p>=100) {
                    clearInterval(alarm2);
                }
                document.getElementById("myprogress").style.display="block";
                document.getElementById("myprogress").value=p;

            }
        </script>
    </body>
</html>