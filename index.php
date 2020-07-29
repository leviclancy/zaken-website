<?

/// Home page
/// Bookstore
/// Resources about Kurdistan
/// Resources about Israeli Arabs
/// Resources about Israel and Zionism
/// Booking
/// Contact

include_once('translatable-elements.php');

// Kurdistan
// https://www.youtube.com/watch?v=UkSRVefP1Qw at Jewish World Congress
// https://www.youtube.com/watch?v=9FODj66nvkk  at JWC
// /media/mulla-mustafa-moshe-dayan.jpg

session_start();
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

// The pageview is passed in the URL
$pageview_request_allowed = [ "home", "bookstore", "kurdistan", "israeli-arabs", "israel-and-zionism", ];
$pageview_request = ( empty($_REQUEST['pageview']) ? "home" : $_REQUEST['pageview'] );
if (!(in_array($pageview_request, $pageview_request_allowed))): $pageview_request = "home"; endif;

// The language is also passed in the URL
$language_request_allowed = [ "ar"=>"عربي", "en"=>"English", "he"=>"עברית", "ku"=>"کوردی", ];
$language_request = ( empty($_REQUEST['language']) ? "en" : $_REQUEST['language'] );
if (!(isset($language_request_allowed[$language_request]))): $language_request = "en"; endif;

echo "<!doctype html><html amp lang='en'>";

echo "<head><meta charset='utf-8'>";

if (!(empty($google_analytics_code))):
	echo '<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>';
	endif;
	
echo "<script async src='https://cdn.ampproject.org/v0.js'></script>";

echo "<link rel='canonical' href='https://". $domain ."'>";

echo "<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>";

echo '<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>';
echo '<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>';
echo '<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>';
echo '<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>';
echo '<script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js"></script>';
echo '<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>';
echo '<script async custom-element="amp-audio" src="https://cdn.ampproject.org/v0/amp-audio-0.1.js"></script>';

// echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">';
// echo '<link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Alegreya+SC:ital,wght@1,500&family=Noto+Serif+JP&display=swap" rel="stylesheet">';


echo "<title>". $title_temp ."</title>";

echo "<meta name='theme-color' content='#2878b4'>";

echo "<meta name='viewport' content='width=device-width,minimum-scale=1,initial-scale=1'>";

$style_array = [
	"body" => [
		"font-family" 		=> "Times",
		"background"		=> "#fff",
		"font-size"		=> "17px",
		"margin"		=> "0",
		"padding"		=> "0",
		],
	
	"input, textarea" => [
		"font-size" 		=> "15px",
		"font-family" 		=> "Verdana",
		],
		
	"*:focus" => [
		"outline"		=> "none",
		"outline-width"		=> "none",
		],
	
	".hide" => [
		"display"		=> "none",
		],
	
	"#splash-header" => [
		"display"		=> "block",
		"background-image"	=> "linear-gradient(-90deg, rgba(255,255,255,0.8), rgba(255,255,255,0.2)), linear-gradient(45deg, rgba(230,230,230,0.8), rgba(200,200,200,0.5))",
		"background-size"	=> "cover",
		"box-shadow"		=> "0 0 30px -10px rgba(100,100,100,1)",
		"margin"		=> "0",
		"padding"		=> "100px 20px",
		"min-height"		=> "500px",
		"color"			=> "#222",
		"text-align"		=> "center",
		],
	
	"#splash-header-topline" => [
		"font-size"		=> "70%",
		"font-family"		=> "'Noto Serif JP'",
		],

	"#splash-header-header" => [
		"font-size"		=> "120%",
		"font-family"		=> "'Alegreya SC'",
		"font-style"		=> "italic",
		],
	
	"#navigation-header" => [
		"display"		=> "block",
		"background"		=> "#eee",
		],
	
	".navigation-header-button" => [
		"background"		=> "rgba(255,255,255,1)",
		"color"			=> "rgba(100,100,100,1)",
		"display"		=> "inline-block",
		"padding"		=> "7px 15px",
		"border-radius"		=> "100px",
		"margin"		=> "20px 20px 0 0",
		"font-family"		=> "Verdana",
		"cursor"		=> "pointer",
		"font-size"		=> "80%",
		"text-align"		=> "center",
		"border"		=> "2px solid #777",
		],
	
	".navigation-header-button-selected" => [
		"background"		=> "rgba(100,100,100,1)",
		"color"			=> "rgba(255,255,255,1)",
		],
	
	"#contact-footer" => [
		"display"		=> "block",
		"color"			=> "rgba(100,100,100,1)",
		"background"		=> "rgba(255,255,255,1)",
		],
	
	"#contact-footer-primary" => [
		"display"		=> "block",
		"font-size"		=> "150%",
		],
	
	".contact-footer-secondary-instructions" => [
		"display"		=> "block",
		"font-style"		=> "italic",
		],

	".contact-footer-secondary-details" => [
		"display"		=> "block",
		],

	];

function css_output($style_array=[]) {
	$css_string = null;
	foreach ($style_array as $selector_temp => $properties_array_temp):
		if (empty($properties_array_temp) || !(is_array($properties_array_temp))): continue; endif; // Skip if empty or invalid
		ksort($properties_array_temp);
		$css_string .= $selector_temp . " {";
		foreach ($properties_array_temp as $property_temp => $value_temp):
			if (empty($property_temp) || empty($value_temp)): continue; endif; // Skip if either are empty
			$css_string .= $property_temp . ":" . $value_temp .";";
			endforeach;
		$css_string .= "} ";
		endforeach;
	return $css_string; }

echo "<style amp-custom>";
echo css_output($style_array);
echo "</style>";

echo "</head><body>";

// Splash at top of page
echo "<div id='splash-header'>";
	echo "<span id='splash-header-topline'>". $translatable_elements["from-the-desk-of"][$language_request] ."</span>";
	echo "<h1 id='splash-header-name'>". $translatable_elements["dr-mordechai-zaken"][$language_request] ."</h1>";
	echo "</div>";

// Navigation buttons
echo "<div id='navigation-header'>";
	foreach ($pageview_request_allowed as $pageview_request_allowed_temp):
		if ($pageview_request_allowed_temp == $pageview_request):
			echo "<div class='navigation-header-button navigation-header-button-selected'>". $translatable_elements[$pageview_request_allowed_temp][$language_request] ."</div>";
			continue; endif;
		echo "<a href='/?pageview=".$pageview_request_allowed_temp."&language=".$language_request."'>";
		echo "<div class='navigation-header-button'>". $translatable_elements[$pageview_request_allowed_temp][$language_request] ."</div>";
		echo "</a>";
		endforeach;
	echo "</div>";

if ([$pageview_request, $language_request] == ["home", "en"]):

	echo "<ul><li>Representative of the community of Jews from Kurdistan to the Kurdistan Region.</li>";
	echo "<li>Author of <i>The Jews of Kurdistan</i>, the authoritative volume on the topic.</li>";
	echo "<li>Founder of the Israel-Kurdistan Friendship League.</li>";
	echo "<li>Adviser to the Prime Minister of Israel on Arab affairs.</li>";
	echo "<li>Director of the Institute of Students and Faculty on Israel, in New York.</li></ul>";

	echo "<hr>";

	echo "";

	endif;

if ([$pageview_request, $language_request] == ["bookstore", "en"]):

	echo "<h2>Bookstore</h2>";
	echo "<p>To buy <a href='https://kurdishjews.com/'>The Jews of Kurdistan and their Tribal Chieftains</a>.</p>";
	echo "<p></p>";

	endif;

if ([$pageview_request, $language_request] == ["kurdistan", "en"]):

	echo "<h2>Kurdistan</h2>";

	echo "<dl>";

		echo "<dt>What is the role of representative?</dt>";
		echo "<dd>The role of representtive is selected by the Nationnal Association, and awaiting confirmation by the Ministry of Endowments and Religious Affairs in the Krudistan Region.</dd>";
		
		echo "</dl>";
		
 	echo "<p></p>";
	
	endif;
	
if ([$pageview_request, $language_request] == ["israeli-arabs", "en"]):

	echo "<h2>Israeli Arabs</h2>";
	echo "<p>To buy <a href='https://kurdishjews.com/'>The Jews of Kurdistan and their Tribal Chieftains</a>.</p>";
	echo "<p></p>";
	
	endif;
	
if ([$pageview_request, $language_request] == ["israeli-and-zionism", "en"]):

	echo "<h2>Israel and Zionism</h2>";
	echo "<p>To buy <a href='https://kurdishjews.com/'>The Jews of Kurdistan and their Tribal Chieftains</a>.</p>";
	echo "<p></p>";

	endif;

// Contact footer
echo "<div id='contact-footer'>";

	echo "<div id='contact-footer-primary'>info@drmordechaizaken.com</div>";

	echo "<div class='contact-footer-secondary-instructions'>". $translatable_elements["to-contact-the-national-association"][$language_request] ."</div>";
	echo "<div class='contact-footer-secondary-details'>??@???</div>";

	echo "<div class='contact-footer-secondary-instructions'>". $translatable_elements["to-contact-foundation-of-ours"][$language_request] ."</div>";
	echo "<div class='contact-footer-secondary-details'>+1 (207) 216-5608 info@ours.foundation</div>";

	echo "</div>";

?>
