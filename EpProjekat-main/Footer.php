<?php
include('connection.php');
extract($_REQUEST);
if(isset($send))
{
    mysqli_query($con,"insert into feedback values('','$n','$e','$mob','$msg')");
    $msg= "<h4 style='color:green;'>feedback sent successfully</h4>";
}
?>
<footer style="background-color: #393939;">
    <div class="container-fluid" style="padding: 16px 0;">
        <div class="col-sm-4 hov">
            <img src="logo/logo1.png"width="200px"height="50px"/>
        </div>
        <div class="col-sm-4 text-justify">
            <h3 style="color:#cdd51f;">Contact Us</h3>
            <p style="color:white;"><strong>Address:</strong> Marka Oreskovica 16</p>
            <p style="color:white;"><strong>Email:</strong> apartmanbooking@gmail.com</p>
            <p style="color:white;"><strong>Contact Us:</strong> +381/6212345</p>
        </div>
        <div class="col-sm-4 text-justify">
            <h3 style="color:#cdd51f;">Emergency Services</h3>
            <p style="color:white;"><strong>Police:</strong> 192</p>
            <p style="color:white;"><strong>Fire brigade:</strong> 193</p>
            <p style="color:white;"><strong>Ambulance:</strong> 194</p>
        </div>
        <div class="col-sm-4 text-justify">
            <h3 style="color:#cdd51f; display:flex; align-items:center; gap:8px;"><span class="glyphicon glyphicon-cloud"></span>Weather (7 days)</h3>
            <div id="weather-entries"></div>
        </div>
        <div class="col-sm-4 text-justify">
            <h3 style="color:#cdd51f; display:flex; align-items:center; gap:8px;"><span class="glyphicon glyphicon-cloud"></span>Exchange Rate</h3>
            <div id="exchange-rates-entries"></div>
        </div>
    </div>
</footer>

<div id="detection">
    <?php
    $header_ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    $keywords = array("nokia","samsung","sonyericsson","alcatel","panasonic","tosh","benq","sagem","android","iphone","berry","palm","mobi","lg","symb");
    $mobile = false;
    $match = "";

    foreach($keywords as $keyword)
    {
        if(strpos($header_ua,$keyword)!==false)
        {
            $mobile = true;
            $match = $keyword;
            break;
        }
    }
    echo "<p><b>You are using :</b> $header_ua</b>";

    if($mobile)
        echo "<p>You are using mobile device. (Your device is : $match)</p>";
    else
        echo "<p>You are not using mobile device.</p>"
    ?>

<footer class="container-fluid text-center"style="background-color:#000408;height:40px;padding-top:10px;color:#f0f0f0;">
    <p> All Rights Reserved 2021</p>
</footer>

<script>
    // WEATHER
    const weatherContainer = document.querySelector("#weather-entries");

    let temperaturesMin = [];
    let temperaturesMax = [];
    let temperaturesDay = [];
    let weatherArr = [];
    const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

    const weatherApiHeaders = new Headers();
    weatherApiHeaders.append("Accept", "application/json");
    const weatherApiOptions = {
        method: 'GET',
        headers: weatherApiHeaders
    }
    function getWeather() {
        fetch('https://api.open-meteo.com/v1/forecast?latitude=46.10&longitude=19.67&daily=temperature_2m_max,temperature_2m_min&timezone=Europe%2FBerlin', weatherApiOptions)
        .then(function(res) {
            return res.json();
        }).then(function(body) {
            // console.log(body);
            body.daily.temperature_2m_min.forEach(temperature => temperaturesMin.push(temperature));
            body.daily.temperature_2m_max.forEach(temperature => temperaturesMax.push(temperature));
            body.daily.time.forEach(time => temperaturesDay.push(time));
            for (let i = 0; i < 7; i++) {
                weatherArr.push({
                    temperatureMin: body.daily.temperature_2m_min[i],
                    temperatureMax: body.daily.temperature_2m_max[i],
                    temperatureDate: new Date(body.daily.time[i]),
                })
            }
            weatherArr.forEach(weatherEntry => {
                const weatherEntryParagraph = document.createElement("p");
                weatherEntryParagraph.innerHTML = '<strong>' + weekday[weatherEntry.temperatureDate.getDay()] + '</strong>: ' + weatherEntry.temperatureMin + '°C' + ' / ' + weatherEntry.temperatureMax + '°C';
                weatherEntryParagraph.style.color = "#FFF";
                weatherContainer.append(weatherEntryParagraph);
            })
        });
    }
    getWeather();

    // EXCHANGE RATES
    const exchangeRatesContainer = document.querySelector("#exchange-rates-entries");

    const exchangeRatesRequestOptions = {
        method: 'GET',
    };

    function getExchangeRates() {
        // FETCH CURRENCIES
        fetch('https://api.exchangerate.host/convert?from=EUR&to=RSD', exchangeRatesRequestOptions)
        .then(function(res) {
            return res.json();
        }).then(function(body) {
            const exchangeRateEntryParagraph = document.createElement("p");
            exchangeRateEntryParagraph.innerHTML = '<strong>' + 'EUR' + '</strong>: ' + body.result;
            exchangeRateEntryParagraph.style.color = "#FFF";
            exchangeRatesContainer.append(exchangeRateEntryParagraph);
        }).then(() => {
            fetch('https://api.exchangerate.host/convert?from=USD&to=RSD', exchangeRatesRequestOptions)
            .then(function(res) {
                return res.json();
            }).then(function(body) {
                const exchangeRateEntryParagraph = document.createElement("p");
                exchangeRateEntryParagraph.innerHTML = '<strong>' + 'USD' + '</strong>: ' + body.result;
                exchangeRateEntryParagraph.style.color = "#FFF";
                exchangeRatesContainer.append(exchangeRateEntryParagraph);
            }).then(() => {
                fetch('https://api.exchangerate.host/convert?from=CAD&to=RSD', exchangeRatesRequestOptions)
                .then(function(res) {
                    return res.json();
                }).then(function(body) {
                    const exchangeRateEntryParagraph = document.createElement("p");
                    exchangeRateEntryParagraph.innerHTML = '<strong>' + 'CAD' + '</strong>: ' + body.result;
                    exchangeRateEntryParagraph.style.color = "#FFF";
                    exchangeRatesContainer.append(exchangeRateEntryParagraph);
                }).then(() => {
                    fetch('https://api.exchangerate.host/convert?from=AUD&to=RSD', exchangeRatesRequestOptions)
                    .then(function(res) {
                        return res.json();
                    }).then(function(body) {
                        const exchangeRateEntryParagraph = document.createElement("p");
                        exchangeRateEntryParagraph.innerHTML = '<strong>' + 'AUD' + '</strong>: ' + body.result;
                        exchangeRateEntryParagraph.style.color = "#FFF";
                        exchangeRatesContainer.append(exchangeRateEntryParagraph);
                    }).then(() => {
                        fetch('https://api.exchangerate.host/convert?from=CHF&to=RSD', exchangeRatesRequestOptions)
                        .then(function(res) {
                            return res.json();
                        }).then(function(body) {
                            const exchangeRateEntryParagraph = document.createElement("p");
                            exchangeRateEntryParagraph.innerHTML = '<strong>' + 'CHF' + '</strong>: ' + body.result;
                            exchangeRateEntryParagraph.style.color = "#FFF";
                            exchangeRatesContainer.append(exchangeRateEntryParagraph);
                        });
                    })
                })
            })
        })
    }
    getExchangeRates();

    // CALL API FUNCTION
    const hourInterval = 3600000;
    setInterval(() => {
        getWeather();
        getExchangeRates();
    }, hourInterval);
    
</script>

