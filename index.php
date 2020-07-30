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
$pageview_request_allowed = [ "home", "bookstore", "jews-of-kurdistan", "arab-affairs", "israel-and-zionism", ];
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
// echo '<link href="https://fonts.googleapis.com/css2?family=Alegreya+SC:ital,wght@1,500&family=Noto+Serif+JP&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Alegreya+SC&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">';

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
	
	"#navigation-header" => [
		"display"		=> "block",
		"background-image"	=> "linear-gradient(45deg, rgba(30,30,30,1), rgba(70,70,70,1))",
		"color"			=> "#fff",
//		"column-width"		=> "300px",
//		"column-count"		=> "2",
//		"column-gap"		=> "30px",
		"font-family"		=> "Assistant",
		"text-align"		=> "center",
		"padding"		=> "50px 0 20px",
		],
	
	"#navigation-header-topline" => [
		"display"		=> "block",
		"font-size"		=> "65%",
		"font-family"		=> "'Noto Serif JP'",
		"text-transform"	=> "uppercase",
		"letter-spacing"	=> "1px",
		],
	
	"#navigation-header-name" => [
		"margin"		=> "5px auto 30px",
		"display"		=> "block",
		"font-size"		=> "135%",
		"font-weight"		=> "700",
		"font-family"		=> "'Alegreya SC'",
		],
	
	"#navigation-header hr" => [
		"display"		=> "block",
		"width"			=> "100%",
		"height"		=> "1px",
		"border"		=> "none",
		"background"		=> "rgba(255,255,255,0.2)",
		],
	
	".navigation-header-button" => [
//		"background"		=> "rgba(255,255,255,1)",
		"color"			=> "rgba(255,255,255,1)",
		"display"		=> "inline-block",
		"padding"		=> "20px 22px 0 22px",
//		"border-radius"		=> "100px",
		"margin"		=> "0",
		"cursor"		=> "pointer",
		"font-size"		=> "90%",
		"text-align"		=> "center",
		"letter-spacing"	=> "1px",
		"text-transform"	=> "uppercase",
//		"border"		=> "2px solid #777",
		],
	
	".navigation-header-button-selected" => [
//		"background"		=> "rgba(100,100,100,1)",
		"color"			=> "rgba(255,255,255,0.65)",
		],
	
	"#body-content" => [
		"display"		=> "block",
		"color"			=> "#333",
		"padding"		=> "100px 20px",
		],
	
	"#body-content h1, #body-content h2, #body-content p, #body-content ul, #body-content ol, #body-content amp-img" => [
		"display"		=> "block",
		"margin"		=> "20px auto",
		"max-width"		=> "800px",
		],
	
	"h1, h2" => [
		"font-family"		=> "'Alegreya SC', 'Suez One', Serif",
		"font-style"		=> "700",
		"text-align"		=> "center",
		],

	"h1" => [
		"margin"		=> "20px auto 8px",
		"font-size"		=> "180%",
		],	
	
	"#contact-footer" => [
		"display"		=> "block",
		"color"			=> "rgba(220,220,220,1)",
		"background"		=> "rgba(50,50,50,1)",
		"padding"		=> "100px 0",
		],
	
	"#contact-footer div" => [
		"max-width"		=> "800px",
		"display"		=> "block",
		"text-align"		=> "left",
		"padding"		=> "0 20px",
		],
	
	"#contact-footer-primary" => [
		"font-size"		=> "120%",
		"margin"		=> "20px auto 50px",
		],
	
	".contact-footer-secondary" => [
		"margin"		=> "0 auto 30px",
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

// Navigation buttons
echo "<div id='navigation-header'>";

	echo "<span id='navigation-header-topline'>". $translatable_elements["from-the-desk-of"][$language_request] ."</span>";
	echo "<span id='navigation-header-name'>". $translatable_elements["dr-mordechai-zaken"][$language_request] ."</span>";

	echo "<hr>";

	foreach ($pageview_request_allowed as $pageview_request_allowed_temp):
		if ($pageview_request_allowed_temp == $pageview_request):
			echo "<div class='navigation-header-button navigation-header-button-selected'>". $translatable_elements[$pageview_request_allowed_temp][$language_request] ."</div>";
			continue; endif;
		echo "<a href='/?pageview=".$pageview_request_allowed_temp."&language=".$language_request."'>";
		echo "<div class='navigation-header-button'>". $translatable_elements[$pageview_request_allowed_temp][$language_request] ."</div>";
		echo "</a>";
		endforeach;

	echo "</div>";

echo "<div id='body-content'>";

if ([$pageview_request, $language_request] == ["home", "en"]):

	echo "<div id='body-content-splash'>";

		echo "<h1>Dr. Mordechai Zaken</h1>";

		echo "<amp-img src='_DSF4377.jpg' width='4' height='3' layout='responsive'></amp-img>";

		echo '<h2>' . 'ד"ר מרדכי זקן' . '<br>' . 'د. موردەخای زاکێن' . '</h2>';

		echo "</div>";

	echo "<p>Dr. Zaken invites the public to learn from his career, drawing on a variety of resources presented here. Dr. Zaken's career </p>";

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

if ([$pageview_request, $language_request] == ["jews-of-kurdistan", "en"]):

	echo "<h2>Jews of Kurdistan</h2>";

	echo "<dl>";

		echo "<dt>What is the role of representative?</dt>";
		echo "<dd>The role of representtive is selected by the Nationnal Association, and awaiting confirmation by the Ministry of Endowments and Religious Affairs in the Krudistan Region.</dd>";
		
		echo "</dl>";
		
 	echo "<p></p>";
	
	endif;
	
if ([$pageview_request, $language_request] == ["arab-affairs", "en"]):

	echo "<h2>Arab Affairs</h2>";
	echo "<p>To buy <a href='https://kurdishjews.com/'>The Jews of Kurdistan and their Tribal Chieftains</a>.</p>";
	echo "<p></p>";
	
	endif;
	
if ([$pageview_request, $language_request] == ["israeli-and-zionism", "en"]):

	echo "<h2>Israel and Zionism</h2>";
	echo "<p>To buy <a href='https://kurdishjews.com/'>The Jews of Kurdistan and their Tribal Chieftains</a>.</p>";
	echo "<p></p>";

	endif;

echo "</div>";

// Contact footer
echo "<div id='contact-footer'>";

	echo "<div id='contact-footer-primary'>";
		echo "To reach Dr. Zaken,<br>";
		echo "E-mail, info@drmordechaizaken.com";
		echo "</div>";

	echo "<div class='contact-footer-secondary'>";
		echo "<i>". $translatable_elements["to-contact-the-national-association"][$language_request] ."</i><br>";
		echo "E-mail, info@kurdishjewry.org.il";
		echo "</div>";

	echo "<div class='contact-footer-secondary'>";
		echo "<i>". $translatable_elements["to-contact-foundation-of-ours"][$language_request] ."</i><br>";
		echo "Telephone, +1 (207) 216-5608<br>";
		echo "E-mail, info@ours.foundation";
		echo "</div>";

	echo "<div class='contact-footer-secondary'>";
		echo $translatable_elements["last-updated"][$language_request];
		echo "</div>";

	echo "</div>";

?>
