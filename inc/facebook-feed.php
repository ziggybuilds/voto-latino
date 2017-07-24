<?php
/**
 *  Facebook feed call
 *
 * @package je-starter
 */
?>

<?php

function fireFb() {
	$pageID = "supportdemocrats";
	$appID = "165099730702015";
	$appS = "9fbced6409d7a0d3f6c495cfde7694a9";
	$url = "https://graph.facebook.com/" . $pageID . "/posts?access_token=" . $appID . "|" . $appS;
	$fbProfile = get_field('facebook_profile', 'options');

//Initialize cURL.
$ch = curl_init();
 
//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, $url);
 
//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 
//Execute the request.
$data = curl_exec($ch);
 
//Close the cURL handle.
curl_close($ch);
 
//Print the data out onto the page.
$resp = json_decode($data, true);
$text = $resp['data'][0]['message'];
$date = $resp['data'][0]['created_time'];
$textLen = mb_strlen( $text );

$newDate = substr($date, 8, 2);

 
$months = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec');

if ( $textLen > 140 ) {
	$newText = substr($text, 0, 139);
	echo 	'<a href="' . $fbProfile . '"><div>' .
		'<p class="social-type"><i class="fa fa-facebook" aria-hidden="true"></i></p>' .
		'<p>' . $newText . ' ...</p><p>' . $months[substr($date, 5, 2)] . ' ' . $newDate . '</p>' .
		'</div></a>';

} else {
	echo	'<a href="' . $fbProfile . '"><div>' .
		'<p class="social-type"><i class="fa fa-facebook" aria-hidden="true"></i></p>' .
		'<p>' . $text . '</p>' .
		'<p class="date">' . $months[substr($date, 5, 2)] . ' ' . $newDate .'</p>' .
		'</div></a>';
}
}

fireFb();



?>