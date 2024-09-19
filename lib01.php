<?php
    function showMSG() {
        echo "Hello World!";
        echo "<br>";
    }

    function showImage($weather) {
        echo "It is ".$weather."! <br>";
        if($weather=="Freezing") {
            $image="https://upload.wikimedia.org/wikipedia/commons/b/bf/Ch%C3%A2teau_Frontenac_after_a_freezing_rain_day_in_Quebec_city.jpg";
        } elseif($weather=="Cold") {
            $image="https://upload.wikimedia.org/wikipedia/commons/5/57/Cold%2C_wet%2C_gloomy.jpg";
        } elseif($weather=="Warm") {
            $image="/img/warm.jpg";
        } else {
            $image="https://upload.wikimedia.org/wikipedia/commons/5/5e/Heat_wave_refresh_it_with_water.jpg";
        }

        echo "<img src='".$image."' width='500px'>";
    }
?>