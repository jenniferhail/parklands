<?php

function getWeatherData() {
	// call to the api in php
	$curl_url = 'https://api.weather.gov/gridpoints/LMK/59,76/forecast/hourly';
	$ch = curl_init($curl_url);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	# Return response instead of printing.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	# Send request.
	$result = curl_exec($ch);
	curl_close($ch);
	// var_dump($result);
	$result_decode = json_decode($result);
	// var_dump($result_decode);
	// var_dump($result_decode->properties->periods[0]);
	$result_temp = $result_decode->properties->periods[0]->temperature;
	$result_tempUnit = $result_decode->properties->periods[0]->temperatureUnit;
	$result_forecast = $result_decode->properties->periods[0]->shortForecast;
	$result_icon = $result_decode->properties->periods[0]->icon;
}

$api_response = get_field('api_response', 'option');
$api_timestamp = get_field('api_response_timestamp', 'option');
$current_time = date('Y-m-d H:i:s');
$maybe_get_weather = false;

echo 'Current time: ' . $current_time . '<br>';
$api_timestamp_str = strtotime($api_timestamp);
$current_time_str = strtotime($current_time);

var_dump($api_timestamp_str);
var_dump($current_time_str);

if ($current_time_str - $api_timestamp_str > 3600) {
	echo "It's been longer than an hour since this was last updated";

	getWeatherData();
	// Now take the data and store it in the ACF fields

	
} else {
	echo "Your data is fresh";
}


// if ( $maybe_get_weather ) {
// 	// do an api call
// 	// store the response in the field $api_response
// }

// $api_response = get_field('api_response', 'option');
// $api_datetime = get_field('api_response_timestamp', 'option');
// $current_time = Date.time();
// $maybe_get_weather = false;

// $current_time - $api_datetime > 15 mins, then set to true

// if ( $maybe_get_weather ) {
// 	// do an api call
// 	// store the response in the field $api_response
// }

$weather_location = get_field( 'weather_location', 'option' );
if( $weather_location ) {
    $sunrise = date('g:i a', strtotime(date_sunrise(time(), SUNFUNCS_RET_STRING, $weather_location['lat'], $weather_location['lng'], 90, -5)));
    $sunset = date('g:i a', strtotime(date_sunset(time(), SUNFUNCS_RET_STRING, $weather_location['lat'], $weather_location['lng'], 90, -5)));
}
?>
<div id="modal-3" class="modal micromodal-slide weather block basic-content one-col" aria-hidden="true">
	<div class="modal__overlay" tabindex="-1" data-micromodal-close>
		<div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-3-title">
			<div class="modal__wrapper">
				<header class="modal__header">
					<h2 class="title h4" id="modal-3-title">Weather</h2>
					<button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
				</header>
				<main class="modal__content" id="modal-3-content">
					<div id="components-demo">

						<div>
						<!-- Trim the icon string + add to class list -->
						<span class="icon"></span><span class="forecast"><?php echo $result_forecast . ' ' . $result_temp, $result_tempUnit; ?></span>
						</div>
						<div class="meta">
							<span class="sunrise">Sunrise <time class="time"><?php echo $sunrise; ?> EST</time></span><span class="sunset">Sunset <time class="time"><?php echo $sunset; ?> EST</time></span>
						</div>
					</div>
				</main>
			</div>
		</div>
	</div>
</div>