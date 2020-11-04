<?

include_once('translatable-elements.php');

// Kurdistan
// https://www.youtube.com/watch?v=UkSRVefP1Qw at Jewish World Congress
// https://www.youtube.com/watch?v=9FODj66nvkk  at JWC
// /media/mulla-mustafa-moshe-dayan.jpg

session_start();
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

// The pageview is passed in the URL
$sitemap_array = [
	"biographical-notes" => [
		"scholarly-achievement",
		"kurdish-advocacy",
		"condensed-highlights",
		],
	"publications-and-lectures" => [
		"lectures",
		"the-jews-of-kurdistan",
		],
	"kurdistan-region" => [
		"tomb-of-the-prophet-nahum",
		"kurdistan-region-and-israel",
		"world-kurdish-forum",
		],
	"israel" => [
		"minorities-affairs",
		],
	"press-coverage" => [
//		"press-history",
		],
	];
		
$pageview_request = ( empty($_REQUEST['pageview']) ? null : $_REQUEST['pageview'] );

// The language is also passed in the URL
// $language_request_allowed = [ "ar"=>"عربي", "en"=>"English", "he"=>"עברית", "ku"=>"کوردی", ];
// $language_request_allowed = [ "en"=>"English", "ku"=>"کوردی", "ar"=>"عربي", ];
$language_request_allowed = [ "en"=>"En", "ku"=>"کو", "ar"=>"عر", ];
$language_request = ( empty($_REQUEST['language']) ? null : $_REQUEST['language'] );

// Set up redirect array
$redirect_array_default = $redirect_array_validated = [ "pageview" => "pageview=".$pageview_request, "language" => "language=".$language_request, ];

// Check if pageview is valid
$pageview_valid = 0;
foreach ($sitemap_array as $pageview_allowed => $subpageview_allowed_array):
	if ($pageview_request == $pageview_allowed): $pageview_valid = 1; break; endif;
	if (in_array($pageview_request, $subpageview_allowed_array)): $pageview_valid = 1; break; endif;
	endforeach;
if ($pageview_valid !== 1): $redirect_array_validated['pageview'] = "pageview=biographical-notes"; endif;
if (!(isset($language_request_allowed[$language_request]))): $redirect_array_validated['language'] = "language=en"; endif;

if ($redirect_array_default !== $redirect_array_validated):
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: https://".$_SERVER['HTTP_HOST']."?".implode("&", $redirect_array_validated));
	exit;
	endif;

echo "<!doctype html><html amp lang='en'>";

echo "<head><meta charset='utf-8'>";

if (!(empty($google_analytics_code))):
	echo '<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>';
	endif;
	
echo "<script async src='https://cdn.ampproject.org/v0.js'></script>";

echo "<link rel='canonical' href='https://". $domain ."'>";

echo "<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>";

echo '<script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>';
echo '<script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js"></script>';
echo '<script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>';
echo '<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>';

// Latin Sans Serif
echo '<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">';

// Latin Serif
echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Alegreya+SC&display=swap" rel="stylesheet">';

// Hebrew
echo '<link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">';

// Material icons
echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';

echo "<title>". translatable_elements($pageview_request) ."</title>";

echo "<meta name='theme-color' content='#2878b4'>";

echo "<meta name='viewport' content='width=device-width,minimum-scale=1,initial-scale=1'>";

$style_array = [
	"body" => [
		"font-family" 		=> "Times",
		"background"		=> "#fff",
		"font-size"		=> "18px",
		"margin"		=> "0",
		"padding"		=> "0",
		],
	
	"a" => [
		"font-family" 		=> "inherit",
		"color"			=> "inherit",
		"font-size"		=> "inherit",
		"text-decoration"	=> "inherit",
		],
		
	"*:focus" => [
		"outline"		=> "none",
		"outline-width"		=> "none",
		],
	
	".hide" => [
		"display"		=> "none",
		],
	
	"#website-toggle-languages" => [
		"position"		=> "fixed",
		"top"			=> "5px",
		"right"			=> "10px",
		"z-index"		=> "10000",
//		"display"		=> "block",
		"text-align"		=> "right",
		"padding"		=> "0",
		"opacity"		=> "1",
		],
	
	".website-toggle-languages-item" => [
		"padding"		=> "8px",
		"min-width"		=> "15px",
		"display"		=> "inline-block",
		"background"		=> "#fff",
		"color"			=> "#999",
		"font-size"		=> "70%",
		"font-weight"		=> "700",
		"border-radius"		=> "100px",
		"margin"		=> "10px 10px",
		"box-shadow"		=> "5px 5px 15px -3px rgba(100,100,100,0.3)",
		"font-family"		=> "Arial",
		"text-align"		=> "center",
		],
	
	"#website-header" => [
		"display"		=> "block",
		"color"			=> "#333",
		"font-family"		=> "Arial",
		"padding"		=> "50px 20px 10px",
		"position"		=> "relative",
//		"background"		=> "rgba(100,100,100,0.4)",
		],
		
	"#website-header-title" => [
		"margin"		=> "0 auto 0",
		"padding"		=> "30px 0 3px",
		"display"		=> "block",
		"font-size"		=> "105%",
		"font-weight"		=> "700",
		],
	
	"#website-header-caption" => [
		"display"		=> "block",
		"padding"		=> "0 0 10px",
		"font-size"		=> "100%",
//		"font-family"		=> "'Noto Serif JP'",
//		"text-transform"	=> "uppercase",
//		"letter-spacing"	=> "1px",
		],
	
	"#website-header-byline" => [
		"display"		=> "block",
		"padding"		=> "0 0 15px",
		"font-size"		=> "80%",
		],
	
	"#website-header-sitemap" => [
		"font-family"		=> "Arial",
		"display"		=> "block",
		"padding"		=> "10px",
		"margin"		=> "0",
		"font-size"		=> "90%",
		"column-width"		=> "260px",
		"line-height"		=> "1.15em",
		],
	
	".website-header-sitemap-block" => [
		"margin"		=> "0",
		"padding"		=> "0",
		"display"		=> "inline-block",
		"width"			=> "270px",
		"box-sizing"		=> "border-box",
		"webkit-column-break-inside"	=> "avoid",
		"page-break-inside"		=> "avoid",
		"break-inside"			=> "avoid",
		"vertical-align"		=> "top",
		],	
	".website-header-sitemap-block-item" => [
		"margin"		=> "0",
		"padding"		=> "3px 0",
		"display"		=> "block",
		"font-weight"		=> "700",
		],
		
	".website-header-sitemap-block-subitem" => [
		"margin"		=> "0",
		"display"		=> "block",
		"padding"		=> "3px 15px 3px",
		],

	".website-header-sitemap-subitem span" => [
		"opacity"		=> "0.5",
		"font-size"		=> "70%",
		"vertical-align"	=> "middle",
		],
	
	"#body-content" => [
		"display"		=> "block",
		"color"			=> "#333",
		"padding"		=> "10px 0 100px",
		"font-family"		=> "Roboto",
		"line-height"		=> "1.45em",
		"text-align"		=> "center",
		],
	
	"h1, #body-content h2, #body-content p, 
	#body-content dt, #body-content dd,
	#body-content figure, #body-content .p-em,
	#body-content blockquote, #body-content amp-youtube" => [
		"display"		=> "block",
		"margin"		=> "50px auto",
		"max-width"		=> "800px",
		"padding"		=> "0 20px",
		"box-sizing"		=> "border-box",
		"vertical-align"	=> "top",
		"text-align"		=> "initial",
		],
	
	"#body-content p,
	#body-content dt, #body-content dd" => [
		"white-space"		=> "pre-wrap",
		"overflow-wrap"		=> "normal",
		],

	"#body-content dt" => [
//		"font-size"		=> "110%",
		"margin"		=> "50px auto 5px",
		],

	"#body-content dd" => [
		"padding"		=> "0 50px",
		"margin"		=> "0 auto 50px",
		],
	
	"#body-content .p-em" => [
		"display"		=> "inline-block",
		"max-width"		=> "550px",
		"padding"		=> "0 50px",
		"font-size"		=> "110%",
		"line-height"		=> "1.7em",
		"font-family"		=> "'Alegreya SC', 'Suez One', Serif",
		"text-align"		=> "center",
		"text-transform"	=> "uppercase",
		],

	"#body-content figure, #body-content amp-img, #body-content amp-youtube" => [
		"padding"		=> "0",
		],
		
	"#body-content amp-img, #body-content amp-youtube" => [
		"margin"		=> "0 auto",
		"border-radius"		=> "4px",
		],
	
	"#body-content figcaption" => [
		"font-size"		=> "80%",
		"font-family"		=> "Roboto",
		"padding"		=> "0",
		"margin"		=> "0",
		],
		
	"#body-content blockquote" => [
		"font-size"		=> "120%",
		"line-height"		=> "1.5",
		"font-family"		=> "Noto Serif JP",
		"padding"		=> "0 30px",
		"max-width"		=> "650px",
		],
	
	"#body-content blockquote::before" => [
		"content"		=> "'❝'",
		"font-size"		=> "180%",
		"float"			=> "left",
		"padding"		=> "2px 30px 0 2px",
		"margin"		=> "0 0 0 -20px",
		"display"		=> "inline-block",
		"line-height"		=> "1em",
		],
	
	"#body-content blockquote cite" => [
		"display"		=> "block",
		"font-style"		=> "italic",
		"font-size"		=> "70%",
		"text-transform"	=> "uppercase",
		"text-align"		=> "right",
		],
	
	"h1, #body-content h2" => [
//		"font-family"		=> "'Alegreya SC', 'Suez One', Serif",
		"font-family"		=> "Verdana",
		"font-weight"		=> "700",
		"line-height"		=> "1.4em",
		"text-align"		=> "center",
		],
	
	"h1" => [
		"margin"		=> "70px auto 10px",
		"font-size"		=> "220%",
		"text-shadow"		=> "2px 2px 20px -10px rgba(50,50,50,0.25)",
		],
	
	"#body-content a" => [
		"font-weight"		=> "700",
		"color"			=> "rgba(104, 179, 217, 1)",
		],
	
	"#Contact" => [
		"display"		=> "block",
		"color"			=> "rgba(220,220,220,1)",
		"background"		=> "rgba(50,50,50,1)",
		"padding"		=> "100px 0",
		],
	
	"#contact-footer-primary" => [
		"font-size"		=> "120%",
		],
	
	"#Contact dt, #Contact dd" => [
		"display"		=> "block",
		"margin"		=> "50px auto",
		"max-width"		=> "800px",
		"padding"		=> "0 20px",
		"box-sizing"		=> "border-box",
		"white-space"		=> "pre-wrap",
		"overflow-wrap"		=> "normal",
		],

	"#Contact dt" => [
		"font-style"		=> "italic",
		"margin"		=> "50px auto 20px",
		],

	"#Contact dd" => [
		"padding"		=> "0 50px",
		"margin"		=> "0 auto 50px",
		],
	
	];

if ($language_request == "en"):
	$style_array['body']['direction'] = "ltr";
	$style_array['body']['text-align'] = "left";
else:
	$style_array['body']['direction'] = "rtl";
	$style_array['body']['text-align'] = "right";
	endif;


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
echo "@media only screen and (max-width: 600px) { #body-content h1, #body-content h2 { padding: 0 35px 0 20px; font-size: 200%; } }";
echo "</style>";

echo "</head><body>";

echo '<amp-animation id="fadeTransition"
  layout="nodisplay">
  <script type="application/json">
    {
      "duration": "1",
      "fill": "both",
      "direction": "reverse",
      "animations": [{
        "selector": ".amp-img-fader",
        "keyframes": [{
            "opacity": "0.2",
            "offset": 0
          },
          {
            "opacity": "1",
            "offset": 0.4
          },
          {
            "opacity": "1",
            "offset": 0.6
          },
          {
            "opacity": "0.2",
            "offset": 1
          }
        ]
      }]
    }
  </script>
</amp-animation>';

function translatable_elements($string_id, $language_temp=null) {
	global $translatable_elements;
	global $language_request;
	if (empty($language_temp)): $language_temp = $language_request; endif;
	if (empty($translatable_elements[$string_id])): return; endif;
	if (empty($translatable_elements[$string_id][$language_temp])):
		foreach ($translatable_elements[$string_id] as $language_temp => $content_temp):
			if (!(empty($content_temp))): return $content_temp; endif;
			endforeach;
		endif;
	$string_temp = $translatable_elements[$string_id][$language_temp];

//	https://stackoverflow.com/questions/1960461/convert-plain-text-urls-into-html-hyperlinks-in-php
	$url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
	$string_temp = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">'.current(explode("/", '$4')).'</a>', $string_temp);	
	return $string_temp; }

function image_output ($media_url, $media_width, $media_height, $media_caption=null, $parallax_speed=null) {
	global $translatable_elements;
	global $language_request;
	
	$parallax_temp = null;
	if (!(empty($parallax_speed))): $parallax_temp =  "amp-fx='parallax' data-parallax-factor='". $parallax_speed ."'"; endif;
	
	$string_temp = "<figure class='amp-img-fader' ". $parallax_temp .">";
	$string_temp .= '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	$string_temp .= '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.3" layout="nodisplay"></amp-position-observer>';
	$string_temp .= "<amp-img src='" . $media_url ."' width='" . $media_width ."' height='". $media_height ."' layout='responsive'></amp-img>";
	if (!(empty($media_caption))): $string_temp .= "<figcaption>". translatable_elements($media_caption) ."</figcaption>"; endif;
	$string_temp .= "</figure>";
	return $string_temp;
	}

function blockquote($content_id, $attribution_id=null) {
	global $translatable_elements;
	global $language_request;
	if (empty($content_id)): return; endif;
	$string_temp = "<blockquote>". translatable_elements($content_id) ."";
	if (!(empty($attribution_id))): $string_temp .= "<cite>". translatable_elements($attribution_id) ."</cite>"; endif;
	$string_temp .= "</blockquote>";
	return $string_temp; }

function timeline_output ($date_begin, $date_end, $description) {
	$timeline = "<dl><dt>";
	$timeline .= $date_begin;
	if (!(empty($date_end))):  $timeline .= " — ". $date_end; endif;
	$timeline .= "</dt><dd>" . $description . "</dd></dl>";
	return $timeline; }

function publications_output($date, $description) {
	$timeline = "<dl><dt>" . $date . "</dt>";
	$description = explode("\n", $description);
	$description[0] = "<b>" . $description[0] . "</b>";
	$timeline .= "<dd>" . implode("\n", $description) . "</dd></dl>";
	return $timeline; }

function press_report_output($date, $article_name, $link_url, $link_name=null) {
	if (empty($link_name)): $link_name = $article_name; endif;
	$press_report = "<dl><dt>" . $date . "</dt>";
	if (empty($link_name)):
		$press_report .= "<dd><a href='" . $link_url . "'>" . $article_name . "</dd></dl>";		
	else:
		$press_report .= "<dd><a href='" . $link_url . "'>" . $link_name . "</a><br>";
		$press_report .= $article_name . "</dd></dl>";
		endif;

	return $press_report; }

// echo "<span id='website-toggle-languages' amp-fx='parallax' data-parallax-factor='1.4'>";
echo "<span id='website-toggle-languages'>";
	foreach ($language_request_allowed as $language_request_temp => $language_name_temp):
		echo "<a href='/?pageview=".$pageview_request."&language=".$language_request_temp."'><span class='website-toggle-languages-item'>". $language_name_temp ."</span></a>";
		endforeach;
	echo "</span>";

// Navigation buttons
echo "<div id='website-header'>";

	echo "<span id='website-header-title' amp-fx='parallax' data-parallax-factor='1.3'><a href='/?language=".$language_request."'>". translatable_elements("dr-mordechai-zaken") ."</a></span>";
	echo "<span id='website-header-caption' amp-fx='parallax' data-parallax-factor='1.3'>". translatable_elements("historian-expert-and-author") ."</span>";
	echo "<span id='website-header-byline' amp-fx='parallax' data-parallax-factor='1.3'>". translatable_elements("prepared-by-foundation-of-ours") ."</span>";

	echo "<div id='website-header-sitemap' amp-fx='parallax' data-parallax-factor='1.25'>";
		foreach ($sitemap_array as $pageview_allowed => $subpageview_allowed_array):
			echo "<div class='website-header-sitemap-block'>";
			echo "<div class='website-header-sitemap-block-item'><a href='/?pageview=".$pageview_allowed."&language=".$language_request."'>" . translatable_elements($pageview_allowed) . "</a></div>";
			foreach ($subpageview_allowed_array as $subpageview_allowed):
				echo "<div class='website-header-sitemap-block-subitem'><a href='/?pageview=".$subpageview_allowed."&language=".$language_request."'>" . translatable_elements($subpageview_allowed) . "</a></div>";
				endforeach;
			echo "</div>";
			endforeach;
		echo "</div>";

	echo "</div>";

echo "<h1 amp-fx='parallax' data-parallax-factor='1.07'>" . translatable_elements($pageview_request) ."</h1>";

echo "<div id='body-content'>";

if ($pageview_request == "biographical-notes"):

	echo image_output("/media/website-01.jpg", "1.5", "1", "biographical-notes-in-erbil", "1.07");

	echo "<p amp-fx='parallax' data-parallax-factor='1.05'>". translatable_elements('biographical-notes-dr-mordechai-zaken-born') ."</p>";

	echo "<p class='p-em' amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-authority-on') ."</p>";
	echo "<p class='p-em' amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-representative-assigned') ."</p>";
	echo "<p class='p-em' amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-current-head') ."</p>";
	echo "<p class='p-em' amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-author-of-the-jews-of-kurdistan') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-in-2019-he-received') ."</p>";

	echo "<figure>";
	echo "<amp-youtube data-videoid='kHz0rjXVwkg' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "<figcaption>". translatable_elements('biographical-notes-video-screened') ."</figcaption></figure>";

	echo "<p>". translatable_elements('biographical-notes-doctoral-thesis') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-speaks-fluently') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-expresses') ."</p>";

	echo image_output("/media/website-02.jpg", "1.5", "1", "biographical-notes-uzi-dayan");

	echo image_output("/media/website-03.jpg", "1.5", "1", "biographical-notes-bedouin-communities");

	echo image_output("/media/website-30.jpg", "1.5", "1", "biographical-notes-dr-zaken-at-the-synagogue");

	echo "<h2>". translatable_elements('biographical-notes-website-administration') ."</h2>";

	echo "<p>". translatable_elements('biographical-notes-this-website') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-thanks') ."</p>";

	endif;

if ($pageview_request == "scholarly-achievement"):

	echo image_output("/media/website-04.jpg", "1.5", "1", "scholarly-achievement-usually");

	echo blockquote("scholarly-achievement-became-curious");

	echo "<p>". translatable_elements('scholarly-achievement-as-a-student') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-he-had-to-resort') ."</p>";

	echo blockquote("scholarly-achievement-he-embarked");

	echo "<p>". translatable_elements('scholarly-achievement-he-devoted') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-he-was-lucky-enough') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-his-tireless-fieldwork') ."</p>";

	echo image_output("/media/website-05.jpg", "1.5", "1", "scholarly-achievement-dr-zaken-speaking");

	echo "<p>". translatable_elements('scholarly-achievement-main-scholarly-achievement') ."</p>";

	echo blockquote("scholarly-achievement-what-fascinated-me");

	echo image_output("/media/website-06.jpg", "1.5", "1", "scholarly-achievement-bapir-agha");

	echo "<p>". translatable_elements('scholarly-achievement-two-and-four-times') ."</p>";

	echo blockquote("scholarly-achievement-during-my-last-meeting");

	echo image_output("/media/website-07.jpg", "1.5", "1", "scholarly-achievement-jubilee");

	echo "<p><b>". translatable_elements('scholarly-achievement-important-contribution') ."</b></p>";

	echo "<p>". translatable_elements('scholarly-achievement-oral-history-fieldwork') ."</p>";

	endif;

if ($pageview_request == "kurdish-advocacy"):

	echo "<p>". translatable_elements('kurdish-advocacy-expert-on-tribal-kurdish-society') ."</p>";

	echo "<p>". translatable_elements('kurdish-advocacy-named-by-the-association') ."</p>";

	endif;

if ($pageview_request == "condensed-highlights"):

	echo blockquote("condensed-highlights-coexistence-and-mutual-traditions");
	
	echo image_output("/media/website-08.jpg", "1.5", "1", "condensed-highlights-flags-of-israel-and-jerusalem");

	echo timeline_output("2020", null, translatable_elements('condensed-highlights-timeline-2020-appointed'));

	echo timeline_output("2019", null, translatable_elements('condensed-highlights-timeline-2019-laureate'));

	echo timeline_output("2013-10", null, translatable_elements('condensed-highlights-timeline-2013-presentation'));

	echo timeline_output("2013", "2018", translatable_elements('condensed-highlights-timeline-2013-with-christian-leaders'));

	echo timeline_output("2012-10", null, translatable_elements('condensed-highlights-timeline-2012-visit'));

	echo timeline_output("2010-09", "2013-08", translatable_elements('condensed-highlights-timeline-2010-lecturer'));

	echo timeline_output("2010-10-22", null, translatable_elements('condensed-highlights-timeline-2010-speaker'));

	echo timeline_output("2007", null, translatable_elements('condensed-highlights-timeline-2007-published'));

	echo timeline_output("2007-05", "ongoing", translatable_elements('condensed-highlights-timeline-2007-head'));

	echo timeline_output("2003", null, translatable_elements('condensed-highlights-timeline-2003-published'));

	echo blockquote("condensed-highlights-kurdish-national-issue");
	
	echo image_output("/media/website-09.jpg", "1.5", "1", "condensed-highlights-akre-near-duhok");

	echo blockquote("condensed-highlights-within-my-jurisdiction");
	
	echo timeline_output("2001-05", "2007-05", translatable_elements('condensed-highlights-timeline-2001-adviser'));

	echo timeline_output("2001", "2003", translatable_elements('condensed-highlights-timeline-2001-coordinator'));

	echo timeline_output("1999-11", "2001-12", translatable_elements('condensed-highlights-timeline-1999-founder'));

	echo timeline_output("1999-06", null, translatable_elements('condensed-highlights-timeline-1999-married'));

	echo timeline_output("1997-05", "1999-12", translatable_elements('condensed-highlights-timeline-1997-adviser'));

	echo timeline_output("1997", null, translatable_elements('condensed-highlights-timeline-1997-published'));

	echo blockquote("condensed-highlights-kurdish-national-issue");
	
	echo image_output("/media/website-10.jpg", "1.5", "1", "condensed-highlights-with-the-prime-minister");

	echo blockquote("condensed-highlights-within-the-scope");

	echo timeline_output("1993", null, translatable_elements('condensed-highlights-timeline-1993-cofounder'));

	echo timeline_output("1992", null, translatable_elements('condensed-highlights-timeline-1992-taught'));

	echo timeline_output("1990", null, translatable_elements('condensed-highlights-timeline-1990-published'));

	echo timeline_output("1989-01", "1991-10", translatable_elements('condensed-highlights-timeline-1989-director'));

	echo timeline_output("1987", "1991", translatable_elements('condensed-highlights-timeline-1987-suny'));

	echo timeline_output("1988", null, translatable_elements('condensed-highlights-timeline-1988-ma'));

	echo blockquote("condensed-highlights-feel-safe");
	
	echo image_output("/media/website-11.jpg", "1.5", "1", "condensed-highlights-mala-mustafa");

	echo blockquote("condensed-highlights-the-relationship");
	
	echo timeline_output("1985", "2002", translatable_elements('condensed-highlights-timeline-1985-he-conducted'));

	echo timeline_output("1984", "1985", translatable_elements('condensed-highlights-timeline-1984-ma-student'));

	echo timeline_output("1983", null, translatable_elements('condensed-highlights-timeline-1983-co-chief-editor'));

	echo timeline_output("1982", null, translatable_elements('condensed-highlights-timeline-1982-editor-in-chief'));

	echo timeline_output("1980", "1984", translatable_elements('condensed-highlights-timeline-1980-baccalaureate-studies'));

	echo timeline_output("1958", null, translatable_elements('condensed-highlights-timeline-1958-born'));

//	echo timeline_output("", null, "");

	echo blockquote("condensed-highlights-many-kurdish-jews");

	echo image_output("/media/website-12.jpg", "1.5", "1", "condensed-highlights-the-road-to-the-monastery");

	endif;

if ($pageview_request == "publications-and-lectures"):

	echo blockquote("publications-and-lectures-the-book-of", "publications-and-lectures-lora-galichco");

	echo "<p>". translatable_elements('publications-and-lectures-below-is-an-abridged-list') ."</p>";

	echo publications_output("2018", translatable_elements('publications-and-lectures-2018-the-jewish-communities'));

	echo publications_output("2016", translatable_elements('publications-and-lectures-2016-minderheiten'));

	echo publications_output("2015", translatable_elements('publications-and-lectures-2015-the-jews-of-kurdistan'));

	echo publications_output("2007", translatable_elements('publications-and-lectures-2007-the-jews-of-kurdistan'));

	echo publications_output("2005", translatable_elements('publications-and-lectures-2005-juifs-kurdes-et-arabes'));

	echo publications_output("2003", translatable_elements('publications-and-lectures-2003-tribal-chieftains'));

	echo publications_output("2003", translatable_elements('publications-and-lectures-2003-kurdistan'));

	echo publications_output("2001", translatable_elements('publications-and-lectures-2001-the-lost-from-the-land-of-ashur'));

	echo publications_output("1999-03-29", translatable_elements('publications-and-lectures-1999-on-the-anfal'));

	echo publications_output("1997", translatable_elements('publications-and-lectures-1997-inventors-fate'));

	echo publications_output("1994", translatable_elements('publications-and-lectures-1994-the-kurdish-jews-in-transition'));

	echo publications_output("1991", translatable_elements('publications-and-lectures-1991-naysayers'));

	echo publications_output("1991", translatable_elements('publications-and-lectures-1991-kurdish-unity'));

	echo publications_output("1991", translatable_elements('publications-and-lectures-1991-israel-should-assist'));

	echo publications_output("1990", translatable_elements('publications-and-lectures-1990-the-book-of-ruth'));

	echo publications_output("1988", translatable_elements('publications-and-lectures-1988-the-kurdish-jews'));

	echo publications_output("1985", translatable_elements('publications-and-lectures-1985-social-and-economic-institutions'));

	endif;

if ($pageview_request == "lectures"):

	echo publications_output("2015-01-04", translatable_elements('lectures-2015-the-jews-of-kurdistan'));

	echo publications_output("2013-10-13", translatable_elements('lectures-2013-world-kurdish-congress'));

	echo publications_output("2011-05-17", translatable_elements('lectures-2011-jews-and-christians'));

	echo publications_output("2011-04-08", translatable_elements('lectures-2011-the-tribal-kurdish-society'));

	echo publications_output("2010-12-27", translatable_elements('lectures-2010-the-jews-and-the-tribal-kurdish-society'));

	echo publications_output("2010-10-22", translatable_elements('lectures-2010-on-the-jews-kurds-and-palestinians'));

	echo publications_output("2010-04-27", translatable_elements('lectures-2010-jews-and-the-christians-in-kurdistan'));

	echo publications_output("2008-12-18", translatable_elements('lectures-2008-some-aspects'));

	echo publications_output("2005-04-12", translatable_elements('lectures-2005-the-case-of-the-kurds'));

	echo publications_output("2004-11-30", translatable_elements('lectures-2004-research-of-the-jews-and-minorities-of-kurdistan'));

	echo publications_output("2003-11-14", translatable_elements('lectures-2003-remarks-on-kurdistani-jews'));

	echo publications_output("2000-06-19", translatable_elements('lectures-2000-notes-on-the-history'));

	echo publications_output("1998-03-04", translatable_elements('lectures-1998-minorities-in-israel'));

	echo publications_output("1997-06-22", translatable_elements('lectures-1997-the-kurdish-minority'));

	echo publications_output("1994-12", translatable_elements('lectures-1994-the-suffering-of-the-kurdish-people'));

//	echo publications_output("2015-01-04", translatable_elements('lectures-2015-the-jews-of-kurdistan'));

	endif;

if ($pageview_request == "the-jews-of-kurdistan"):

	echo image_output("/media/website-13.jpg", "3", "4");

	echo blockquote("the-jews-of-kurdistan-this-is-highly-original", "joyce-blau");

	echo blockquote("the-jews-of-kurdistan-this-is-an-original", "moshe-sharon");

	echo "<p>". translatable_elements("the-jews-of-kurdistan-tells-the-stories") ."</p>";

	echo blockquote("the-jews-of-kurdistan-the-aim-of-the-author", "joyce-blau");

	echo "<p>". translatable_elements("the-jews-of-kurdistan-it-so-happened") ."</p>";

	echo blockquote("the-jews-of-kurdistan-the-task-of-gathering", "joyce-blau");

	echo "<p>". translatable_elements("the-jews-of-kurdistan-kurdish-jews-from-kurdistan") ."</p>";

	echo blockquote("the-jews-of-kurdistan-many-years-were-needed", "moshe-sharon");

	echo "<p><b>". translatable_elements("the-jews-of-kurdistan-buy") ."</b></p>";

	echo blockquote("the-jews-of-kurdistan-the-study-portrays", "moshe-sharon");

	echo "<p>". translatable_elements("the-jews-of-kurdistan-dr-moshe-sharons-full-review") ."</p>";

	echo "<p>". translatable_elements("the-jews-of-kurdistan-dr-joyce-blaus-full-review") ."</p>";

	echo "<h2>". translatable_elements("the-jews-of-kurdistan-translations") ."</h2>";

	echo "<p>". translatable_elements("the-jews-of-kurdistan-the-book-the-jews-of-kurdistan") ."</p>";

	echo "<p>". translatable_elements("the-jews-of-kurdistan-descended-from") ."</p>";

	echo image_output("/media/website-14.jpg", "1", "2");

	echo "<p>". translatable_elements("the-jews-of-kurdistan-the-fact-that") ."</p>";

	echo image_output("/media/website-15.jpg", "465", "600");

	echo "<p>". translatable_elements("the-jews-of-kurdistan-interestingly-the-cover") ."</p>";

	echo "<p>". translatable_elements("the-jews-of-kurdistan-download-the-arabic") ."</p>";

	echo "<p>". translatable_elements("the-jews-of-kurdistan-download-the-sorani") ."</p>";

	echo "<h2>". translatable_elements("the-jews-of-kurdistan-naze-a-voice-from-the-past") ."</h2>";

	echo "<p>". translatable_elements("the-jews-of-kurdistan-the-publication") ."</p>";

	echo "<p>". translatable_elements("the-jews-of-kurdistan-her-grandchildren") ."</p>";

	echo "<p>". translatable_elements("the-jews-of-kurdistan-naze-was-coerced") ."</p>";

//	echo "<p>". translatable_elements("") ."</p>";

	endif;

if ($pageview_request == "kurdistan-region"):

	echo image_output("/media/website-16.jpg", "1.5", "1", "kurdistan-region-dr-zaken-left-with-yona-sabar-right");

	echo "<p>". translatable_elements("kurdistan-region-dr-zaken-is-the-counselor") ."</p>";

	echo image_output("/media/website-17.jpg", "1.5", "1", "kurdistan-region-newroz-celebrations");

	echo "<p>". translatable_elements("kurdistan-region-please-check-back-soon") ."</p>";

	endif;

if ($pageview_request == "tomb-of-the-prophet-nahum"):

	echo "<p>". translatable_elements("tomb-of-the-prophet-nahum-the-tomb-of-the-prophet") ."</p>";

	echo image_output("/media/website-18.jpg", "1.5", "1", "tomb-of-the-prophet-nahum-renovation-work");

	echo "<p>". translatable_elements("tomb-of-the-prophet-nahum-dr-zaken-serves") ."</p>";

	echo image_output("/media/website-19.jpg", "1.5", "1", "tomb-of-the-prophet-nahum-renovation-work");

	endif;

if ($pageview_request == "kurdistan-region-and-israel"):

	echo image_output("/media/website-20.jpg", "1.5", "1", "kurdistan-region-and-israel-senior-israeli-officials");

	echo blockquote("kurdistan-region-and-israel-in-1950-and-1951");

	echo "<p>". translatable_elements("kurdistan-region-and-israel-the-initial-immigrants") ."</p>";

	echo image_output("/media/website-21.jpg", "1.5", "1", "kurdistan-region-and-israel-dancing-at-the-sahrane");

	echo image_output("/media/website-11.jpg", "1.5", "1", "kurdistan-region-and-israel-mala-mustafa-at-an-israeli-air-force-base");

	echo blockquote("kurdistan-region-and-israel-eliyahu-gabai-was-the-leader");

	echo "<p>". translatable_elements("kurdistan-region-and-israel-the-late-kurdish-leader-mala-mustafa") ."</p>";

	echo image_output("/media/website-22.jpg", "3", "4", "kurdistan-region-and-israel-moti-right-with-natan-sharansky");

	echo blockquote("kurdistan-region-and-israel-israel-has-a-moral-obligation");

	echo "<p>". translatable_elements("kurdistan-region-and-israel-since-the-referendum") ."</p>";

	echo image_output("/media/website-23.jpg", "1.5", "1", "kurdistan-region-and-israel-israeli-agent-haimke-levakov");

	echo blockquote("kurdistan-region-and-israel-some-aghas-were-not-so-nice");

	echo "<p>". translatable_elements("kurdistan-region-and-israel-despite-historical-antisemitism") ."</p>";

	echo image_output("/media/website-24.jpg", "1.5", "1", "kurdistan-region-and-israel-mala-mustafa-on-a-visit-to-israel");

	echo "<p>". translatable_elements("kurdistan-region-and-israel-today-there-is-an-inextricable-relationship") ."</p>";

	echo blockquote("kurdistan-region-and-israel-the-kurds-are-entitled");

	echo "<figure>";
	echo "<amp-youtube data-videoid='8xh9hY1q0kE' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "<figcaption>". translatable_elements("kurdistan-region-and-israel-on-january-4th-2015") ."</figcaption></figure>";

	endif;

if ($pageview_request == "world-kurdish-forum"):

	echo "<p>". translatable_elements("world-kurdish-forum-in-early-october-2012") ."</p>";

	echo "<figure>";
	echo "<amp-youtube data-videoid='UkSRVefP1Qw' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "</figure>";

	echo blockquote("world-kurdish-forum-during-the-days", "dr-mordechai-zaken");

	echo image_output("/media/website-16.jpg", "1.5", "1", "world-kurdish-forum-moti-left-and-yona-sabar-right");

	echo blockquote("world-kurdish-forum-at-the-citadel", "dr-mordechai-zaken");

	echo image_output("/media/website-25.jpg", "1.5", "1", "world-kurdish-forum-families-atop-the-citadel");

	echo blockquote("world-kurdish-forum-i-visited-the-large-mosque", "dr-mordechai-zaken");

	echo image_output("/media/website-26.jpg", "1.5", "1", "world-kurdish-forum-moti-in-the-old-jewish-neighborhood");

	echo blockquote("world-kurdish-forum-thanks-to-the-office-of-the-kurdistan-regions-presidency", "dr-mordechai-zaken");

	endif;
	
if ($pageview_request == "israel"):

	echo image_output("/media/website-27.jpg", "1.5", "1", "israel-jaffa-street-in-jerusalem");

	echo blockquote("israel-israel-is-a-safe-haven", "dr-mordechai-zaken");

	echo "<p>". translatable_elements("israel-dr-zaken-served") ."</p>";

	echo "<p>". translatable_elements("israel-in-1997") ."</p>";

	echo blockquote("israel-in-my-humble-opinion", "dr-mordechai-zaken");

	echo image_output("/media/website-28.jpg", "1.5", "1", "israel-dr-zaken-right-with-prime-minister-netanyahu");

	endif;

if ($pageview_request == "minorities-affairs"):

	echo "<p>". translatable_elements("minorities-affairs-in-israel-he-founded") ."</p>";

	echo blockquote("minorities-affairs-in-my-position", "dr-mordechai-zaken");

	echo image_output("/media/website-29.jpg", "1.5", "1", "minorities-affairs-during-the-second-lebanon-war");

	echo "<figure>";
	echo "<amp-youtube data-videoid='6fvQdbLJOBQ' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "<figcaption>". translatable_elements("minorities-affairs-interview-about-the-importance") ."</figcaption></figure>";
	
	echo blockquote("minorities-affairs-it-is-very-important-that-we-will", "dr-mordechai-zaken");

	echo "<figure>";
	echo "<amp-youtube data-videoid='i8yI-SLzSKg' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "<figcaption>". translatable_elements("minorities-affairs-interview-about-meetings-organized") ."</figcaption></figure>";
	
	echo "<figure>";
	echo "<amp-youtube data-videoid='B3tVz2kAv1k' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "<figcaption>". translatable_elements("minorities-affairs-interview-about-combating") ."</figcaption></figure>";
	
	echo blockquote("minorities-affairs-its-not-enough-to-only-show-solidarity", "dr-mordechai-zaken");

	echo "<figure>";
	echo "<amp-youtube data-videoid='Mn88fWoYmYY' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "<figcaption>". translatable_elements("minorities-affairs-interview-about-combating") ."</figcaption></figure>";
	
	echo "<figure>";
	echo "<amp-youtube data-videoid='KK2l8vaqrLo' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "<figcaption>". translatable_elements("minorities-affairs-meeting-with-the-greek-orthodox-patriarch") ."</figcaption></figure>";
	
	endif;

if ($pageview_request == "press-coverage"):

//	echo "<p>". translatable_elements("") ."</p>";

//	echo blockquote("", "");

	echo "<figure>";
	echo "<amp-youtube data-videoid='dq0R5bZpOF0' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "</figure>";

	echo press_report_output("2020-08-29", "The Miracle of the Tomb of Prophet Nahum", "https://en.davar1.co.il/244830/", "davar1.co.il");

	echo press_report_output("2020-08-21", "הנס של קבר הנביא נחום", "https://www.davar1.co.il/242934/", "davar1.co.il");

	echo press_report_output("2020-07-14", "From Iraq to exodus: the flight of a country’s Jewish community", "https://www.rudaw.net/english/middleeast/iraq/140720202", "rudaw.net");

	echo press_report_output("2019-10-27", "Israel and the Kurds Strive to Maintain Post-US Relationship", "https://themedialine.org/by-region/whats-next-for-israel-and-the-kurds/", "themedialine.org");

	echo blockquote("press-coverage-this-affection-between-our-nations", "dr-mordechai-zaken");

	echo press_report_output("2019-03-05", "Lending a Helping Hand to Strangers and Sojourners", "https://www.hudson.org/research/14847-lending-a-helping-hand-to-strangers-and-sojourners", "hudson.org");

	echo press_report_output("2019-02-26", "Christian Leaders Disappointed After Israel Shuts Down Government Christian Forum", "https://www1.cbn.com/cbnnews/israel/2019/february/christian-leaders-disappointed-after-israel-shuts-down-government-christian-forum", "cbn.com");

	echo press_report_output("2018-12-04", "Government-Christian Forum promotes the Airport Trustee program", "https://www.gov.il/en/departments/news/gov_christian_forum_041218", "gov.il");

	echo press_report_output("2018-11-14", "Kurdistani Jews are caught between the Jewish state and the ethnonationalist ambitions of its Middle Eastern neighbors", "https://www.tabletmag.com/sections/israel-middle-east/articles/kurdistan-and-israel", "tabletmag.com");

	echo press_report_output("2017-11-29", "MKs unite to support Kurdish people at Knesset", "https://www.jpost.com/israel-news/mks-unite-to-support-kurdish-people-at-knesset-515613", "jpost.com");

	echo press_report_output("2017-10-10", "Kurd foes use Israeli stance to rally allies", "https://www.thejewishstar.com/stories/kurd-foes-use-israeli-stance-to-rally-allies,14560", "thejewishstar.com");

	echo press_report_output("2017-10-05", "Au Kurdistan irakien, la difficile renaissance du judaïsme (2/2), par Ines Gil", "https://www.tribunejuive.info/2017/10/05/au-kurdistan-irakien-la-difficile-renaissance-du-judaisme-22-par-ines-gil/", "tribubejuive.info");

	echo press_report_output("2017-07-18", "Temple Mount terror attack highlights sharp dichotomy between Israeli minorities", "https://www.jns.org/temple-mount-terror-attack-highlights-sharp-dichotomy-between-israeli-minorities/", "jns.org");

	echo "<figure>";
	echo "<amp-youtube data-videoid='6fvQdbLJOBQ' layout='responsive' width='640' height='360'></amp-youtube>";
	echo "</figure>";

	echo press_report_output("2017-01-27", "Israelis eager to welcome US Embassy to Jerusalem", "https://nypost.com/2017/01/27/israelis-eager-to-welcome-us-embassy-to-jerusalem/", "nypost.com");

	echo press_report_output("2015-12-07", "Publicity seeking Kurdish official [Sherzad Mamsani] brings back memories of Jewish Kurd aliya fiasco", "https://www.jpost.com/middle-east/use-of-jewish-issue-by-krg-official-may-cause-confusion-and-damage-436499", "jpost.com");

	echo press_report_output("2015-11-12", "So are there Jews in Kurdistan? Israeli expert says media reports of 430 families in region incorrect.", "https://www.jpost.com/middle-east/so-are-there-jews-in-kurdistan-432756", "jpost.com");

	echo press_report_output("2015-08-25", "How did the Kurdish Jews migrate to Israel?", "https://www.sbs.com.au/language/english/audio/how-did-the-kurdish-jews-migrate-to-israel", "sbs.com.au");

	echo press_report_output("2013", "Michael R. Fischbach, Jewish property claims against Arab countries, Columbia University Press, 2013, p. 205", "http://cup.columbia.edu/book/jewish-property-claims-against-arab-countries/9780231135382", "columbia.edu");

	echo press_report_output("1999-04-21", "Likud Denies It Is Exploiting Conflict", "http://articles.latimes.com/1999/apr/21/news/mn-29526/2", "latimes.com");

	echo press_report_output("1999-04-20", "Compromise on Nazareth", "http://www.nytimes.com/1999/04/20/world/israel-sets-forth-compromise-plan-on-nazareth-mosque-dispute.html", "nytimes.com");

	echo press_report_output("1999-04-07", "Protesting demolition of homes", "http://articles.latimes.com/1998/apr/07/news/mn-36961", "latimes.com");

	echo press_report_output("1999-04-06", "Demolition of homes", "http://www.apnewsarchive.com/1998/Israeli-Arabs-Protest-Demolition/id-debabd28296ea20a9d9a26c5de57ad57", "apnewsarchive.com");

	echo press_report_output("1999-04-28", "Unrecognized villages", "http://edition.cnn.com/WORLD/meast/9804/28/israel.forty.villages/index.old.html", "cnn.com");

	echo blockquote("press-coverage-there-is-a-desire", "dr-mordechai-zaken");

	echo press_report_output("1998-01-02", "Excerpts from Report of the Government Ministries' Activities in the Non-Jewish Sector in 1997", "https://mfa.gov.il/mfa/mfa-archive/1998/pages/report%20of%20the%20government%20ministries-%20activities%20in.aspx", "mfa.gov.il");

	echo press_report_output("1990", "With the Lubavitcher Rebbe, in 1990.", "https://www.youtube.com/watch?v=F6XMTZ_YANY ", "youtube.com");

//	echo press_report_output("", "", "", "");

//	http://israeli-kurdish-friendship-league.blogspot.com/

	endif;
	
echo "</div>";

// Contact footer
echo "<div id='Contact'>";

	echo "<dl id='contact-footer-primary'>";
		echo "<dt>". translatable_elements("footer-to-reach-dr-zaken") ."</dt>";
		echo "<dd><a href='mailto:info@drmordechaizaken.com'>info@drmordechaizaken.com</a></dd>";
		echo "</dl>";

//	echo "<dl>";
//		echo "<dt>". translatable_elements("footer-to-contact-the-national-association") ."</dt>";
//		echo "<dd><a href='https://kurdishjewry.org.il'>kurdishjewry.org.il</a><br>";
//		echo "<a href='mailto:info@kurdishjewry.org.il'>info@kurdishjewry.org.il</a></dd>";
//		echo "</dl>";

	echo "<dl>";
		echo "<dt>". translatable_elements("footer-with-motis-permission-and-support") ."</dt>";
		echo "<dd><a href='https://ours.foundation'>ours.foundation</a><br>";
		echo "<a href='mailto:info@ours.foundation'>info@ours.foundation</a><br>";
		echo "<a href='https://wa.me/12072165608'>+1 (207) 216-5608</a> (WhatsApp)</dd>";
		echo "</dl>";

	echo "<p>". translatable_elements("footer-last-updated") ."</p>";

	echo "</div>"; ?>
