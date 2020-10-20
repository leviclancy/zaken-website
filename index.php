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
	"press-and-bookings" => [
//		"press-history",
		],
	];
		
$pageview_request = ( empty($_REQUEST['pageview']) ? null : $_REQUEST['pageview'] );

// The language is also passed in the URL
// $language_request_allowed = [ "ar"=>"عربي", "en"=>"English", "he"=>"עברית", "ku"=>"کوردی", ];
$language_request_allowed = [ "en"=>"English", "ku"=>"کوردی", "ar"=>"عربي", ];
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
echo '<link href="https://fonts.googleapis.com/css2?family=Molengo&display=swap" rel="stylesheet">';

// Latin Serif
echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Alegreya+SC&display=swap" rel="stylesheet">';

// Hebrew
echo '<link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">';

// Material icons
echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';

echo "<title>". $title_temp ."</title>";

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
	
	"#website-header" => [
		"display"		=> "block",
		"color"			=> "#333",
		"font-family"		=> "Arial",
		"padding"		=> "20px 30px 30px",
		"position"		=> "relative",
//		"background"		=> "rgba(100,100,100,0.4)",
		],
	
	"#website-header-languages" => [
		"display"		=> "block",
		"color"			=> "#000",
		"font-size"		=> "80%",
		"font-weight"		=> "700",
		"text-align"		=> "right",
		"padding"		=> "0",
		"opacity"		=> "0.45",
		],
	
	".website-header-languages-item" => [
		"padding"		=> "5px 0 5px 15px",
		"display"		=> "inine-block",
		],

		
	"#website-header-title" => [
		"margin"		=> "0 auto 0",
		"padding"		=> "30px 10px 3px",
		"display"		=> "block",
		"font-size"		=> "105%",
		"font-weight"		=> "700",
		"text-align"		=> "left",
		],
	
	"#website-header-caption" => [
		"display"		=> "block",
		"padding"		=> "0 10px 10px",
		"font-size"		=> "100%",
//		"font-family"		=> "'Noto Serif JP'",
//		"text-transform"	=> "uppercase",
//		"letter-spacing"	=> "1px",
		],
	
	"#website-header-byline" => [
		"display"		=> "block",
		"padding"		=> "0 10px 15px",
		"font-size"		=> "80%",
		],
	
	"#website-header-sitemap" => [
		"font-family"		=> "Arial",
		"display"		=> "block",
		"padding"		=> "10px",
		"margin"		=> "0",
		"font-size"		=> "90%",
		"text-align"		=> "left",
		"column-width"		=> "260px",
		],
	
	".website-header-sitemap-block" => [
		"margin"		=> "0",
		"padding"		=> "0",
		"text-align"		=> "left",
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
		"padding"		=> "4px 0",
		"display"		=> "block",
		"font-weight"		=> "700",
		],
		
	".website-header-sitemap-block-subitem" => [
		"margin"		=> "0",
		"display"		=> "block",
		"padding"		=> "4px 0 4px 15px",
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
		"font-family"		=> "Molengo",
		"line-height"		=> "1.5em",
		],
	
	"h1, #body-content h2, #body-content p, 
	#body-content dl, #body-content ul, #body-content ol, 
	#body-content figure, #body-content table, 
	#body-content blockquote, #body-content amp-youtube" => [
		"display"		=> "block",
		"margin"		=> "50px auto",
		"max-width"		=> "800px",
		"padding"		=> "0 20px",
		"text-align"		=> "left",
		"box-sizing"		=> "border-box",
		],
	

	"#body-content figure, #body-content amp-img" => [
		"padding"		=> "0",
		],
	
	"#body-content amp-img" => [
//		"max-height"		=> "600px",
		],
	
	"#body-content amp-img, #body-content amp-youtube" => [
		"border-radius"		=> "4px",
		],
	
	"#body-content figcaption" => [
		"font-size"		=> "80%",
		"font-family"		=> "Molengo",
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
	
	"#body-content td" => [
		"display"		=> "block",
		"margin"		=> "0",
		"padding"		=> "0 0 0 15px",		
		],
	
	"#body-content td:first-child" => [
		"margin"		=> "30px 0 10px",
		"font-weight"		=> "700",
		"padding"		=> "0 0 0 0",
		],
	
	"h1, #body-content h2" => [
		"padding"		=> "0 50px",
//		"font-family"		=> "'Alegreya SC', 'Suez One', Serif",
		"font-family"		=> "Verdana",
		"font-weight"		=> "700",
		"line-height"		=> "1.4em",
		],
	
	"h1" => [
		"margin"		=> "70px auto 10px",
		"font-size"		=> "220%",
		"text-align"		=> "center",
		"text-shadow"		=> "2px 2px 20px -10px rgba(50,50,50,0.25)",
		],

	"#body-content ul" => [	
//		"column-width"		=> "300px",
//		"column-count"		=> "3",
//		"column-gap"		=> "30px",
		"list-style-type"	=> "none",
		],

	"#body-content li" => [
		"max-width"		=> "500px",
		"display"		=> "block",
		"margin"		=> "20px auto 30px",
		"font-size"		=> "120%",
		"line-height"		=> "1.6em",
		"font-family"		=> "'Alegreya SC', 'Suez One', Serif",
		"text-align"		=> "center",
		],
	
	"#body-content dt" => [
		"font-size"		=> "110%",
		],
	
	"#body-content dd" => [
		"margin-bottom"		=> "30px",
		],
	
	"#Contact" => [
		"display"		=> "block",
		"color"			=> "rgba(220,220,220,1)",
		"background"		=> "rgba(50,50,50,1)",
		"padding"		=> "100px 0",
		],
	
	"#Contact div" => [
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
	
	".timeline-output-time" => [
		"display"		=> "block",
		"font-weight"		=> "700",
		"margin"		=> "30px 0 30px",
		],

	".timeline-output-content" => [
		"display"		=> "block",
		"font-weight"		=> "400",
		"margin"		=> "0 0 100px 30px",
		"white-space"		=> "pre",
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
	return $translatable_elements[$string_id][$language_temp]; }

function blockquote($content, $attribution=null) {
	if (empty($content)): return; endif;
	$string_temp = "<blockquote>\"". $content ."\"";
	if (!(empty($attribution))): $string_temp .= "<i>". $attribution ."</i>"; endif;
	$string_temp .= "</blockquote>";
	return $string_temp; }

// Navigation buttons
echo "<div id='website-header'>";

	echo "<span id='website-header-languages' amp-fx='parallax' data-parallax-factor='1.4'>";
		foreach ($language_request_allowed as $language_request_temp => $language_name_temp):
			echo "<a href='/?pageview=".$pageview_request."&language=".$language_request_temp."'><span class='website-header-languages-item'>". $language_name_temp ."</span></a>";
			endforeach;
		echo "</span>";

	echo "<span id='website-header-title' amp-fx='parallax' data-parallax-factor='1.3'>". translatable_elements("dr-mordechai-zaken") ."</span>";
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

	echo "<figure class='amp-img-fader' amp-fx='parallax' data-parallax-factor='1.07'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/uzi-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>". translatable_elements('biographical-notes-in-erbil') ."</figcaption></figure>";

	echo "<p amp-fx='parallax' data-parallax-factor='1.05'>". translatable_elements('biographical-notes-dr-mordechai-zaken-born') ."</p>";

	echo "<ul>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-authority') ."</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-representative') ."</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-author') ."</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-adviser') ."</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>". translatable_elements('biographical-notes-head') ."</li>";
	echo "</ul>";

	echo "<p>". translatable_elements('biographical-notes-video-screened') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-uzi-dayan') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-doctoral-thesis') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-also-expresses') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-bedouin-communities') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-speaks-fluently') ."</p>";

	echo "<h2>". translatable_elements('biographical-notes-website-administration') ."</h2>";

	echo "<p>". translatable_elements('biographical-notes-this-website') ."</p>";

	echo "<p>". translatable_elements('biographical-notes-thanks') ."</p>";

	endif;

if ($pageview_request == "scholarly-achievement"):

	echo "<p>". translatable_elements('scholarly-achievement-usually') ."</p>";

	echo blockquote("scholarly-achievement-became-curious");

	echo "<p>". translatable_elements('scholarly-achievement-as-a-student') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-he-had-to-resort') ."</p>";

	echo blockquote("scholarly-achievement-he-embarked");

	echo "<p>". translatable_elements('scholarly-achievement-he-devoted') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-he-was-lucky-enough') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-his-tireless-fieldwork') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-dr-zaken-speaking') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-main-scholarly-achievement') ."</p>";

	echo blockquote("scholarly-achievement-what-fascinated-me");

	echo "<p>". translatable_elements('scholarly-achievement-bapir-agha') ."</p>";

	echo "<p>". translatable_elements('scholarly-achievement-two-and-four-times') ."</p>";

	echo blockquote("scholarly-achievement-during-my-last-meeting");

	echo "<p>". translatable_elements('scholarly-achievement-jubilee') ."</p>";

	echo "<p><b>". translatable_elements('scholarly-achievement-important-contribution') ."</b></p>";

	echo "<p>". translatable_elements('scholarly-achievement-oral-history-fieldwork') ."</p>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/3666-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>View of Shaqlawa, near Erbil.</figcaption></figure>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/7258-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Renovation work underway at the Shrine of the Prophet Nahum.</figcaption></figure>";

	endif;

if ($pageview_request == "kurdish-advocacy"):

	echo "<p>". translatable_elements('kurdish-advocacy-expert-on-tribal-kurdish-society') ."</p>";

	echo "<p>". translatable_elements('kurdish-advocacy-named-by-the-association') ."</p>";

	endif;

if ($pageview_request == "condensed-highlights"):

	echo blockquote("condensed-highlights-coexistence-and-mutual-traditions");
	
	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/5567-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Flags of Israel and Jerusalem, overlooking the ramparts.</figcaption></figure>";

	function timeline_output ($date_begin, $date_end, $description) {
		$timeline = "<div class='timeline-output-time'>";
		$timeline .= $date_begin;
		if (!(empty($date_end))):  $timeline .= " — ". $date_end; endif;
		$timeline .= "</div><div class='timeline-output-content'>" . $description . "</div>";
		return $timeline; }

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
	
	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/4565-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>". translatable_elements('condensed-highlights-akre-near-duhok') ."</figcaption></figure>";

	echo blockquote("condensed-highlights-within-the-scope");
	
	echo timeline_output("2001-05", "2007-05", translatable_elements('condensed-highlights-timeline-2001-adviser'));

	echo timeline_output("2001", "2003", translatable_elements('condensed-highlights-timeline-2001-coordinator'));

	echo timeline_output("1999-11", "2001-12", translatable_elements('condensed-highlights-timeline-1999-founder'));

	echo timeline_output("1999-06", null, translatable_elements('condensed-highlights-timeline-1999-married'));

	echo timeline_output("1997-05", "1999-12", translatable_elements('condensed-highlights-timeline-1997-adviser'));

	echo timeline_output("1997", null, translatable_elements('condensed-highlights-timeline-1997-published'));

	echo blockquote("condensed-highlights-kurdish-national-issue");
	
	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/4565-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>". translatable_elements('condensed-highlights-with-the-prime-minister') ."</figcaption></figure>";

	echo blockquote("condensed-highlights-within-the-scope");

	echo timeline_output("1993", null, translatable_elements('condensed-highlights-timeline-1993-cofounder'));

	echo timeline_output("1992", null, translatable_elements('condensed-highlights-timeline-1992-taught'));

	echo timeline_output("1990", null, translatable_elements('condensed-highlights-timeline-1990-published'));

	echo timeline_output("1989-01", "1991-10", translatable_elements('condensed-highlights-timeline-1989-director'));

	echo timeline_output("1987", "1991", translatable_elements('condensed-highlights-timeline-1987-suny'));

	echo timeline_output("1988", null, translatable_elements('condensed-highlights-timeline-1988-ma'));

	echo blockquote("condensed-highlights-feel-safe");
	
	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/4377-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>". translatable_elements('condensed-highlights-mala-mustafa') ."</figcaption></figure>";

	echo blockquote("condensed-highlights-the-relationship");
	
	echo timeline_output("1985", "2002", translatable_elements('condensed-highlights-timeline-1985-he-conducted'));

	echo timeline_output("1984", "1985", translatable_elements('condensed-highlights-timeline-1984-ma-student'));

	echo timeline_output("1983", null, translatable_elements('condensed-highlights-timeline-1983-co-chief-editor'));

	echo timeline_output("1982", null, translatable_elements('condensed-highlights-timeline-1982-editor-in-chief'));

	echo timeline_output("1980", "1984", translatable_elements('condensed-highlights-timeline-1980-baccalaureate-studies'));

	echo timeline_output("1958", null, translatable_elements('condensed-highlights-timeline-1958-born'));

//	echo timeline_output("", null, "");

	echo blockquote("condensed-highlights-many-kurdish-jews");

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/8510-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>". translatable_elements('condensed-highlights-the-road-to-the-monastery') ."</figcaption></figure>";

	endif;

if ($pageview_request == "publications-and-lectures"):

	function publications_output($date, $description) {
		$timeline = "<div class='timeline-output-time'>" . $date . "</div>";
		$description = explode("\n", $description);
		$description[0] = "<b>" . $description[0] . "</b>";
		$timeline .= "<div class='timeline-output-content'>" . implode("\n", $description) . "</div>";
		return $timeline; }

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

	echo publications_output("2015-01-04", translatable_elements('publications-and-lectures-2015-the-jews-of-kurdistan'));

	echo publications_output("2013-10-13", translatable_elements('publications-and-lectures-2013-world-kurdish-congress'));

	echo publications_output("2011-05-17", translatable_elements('publications-and-lectures-2011-jews-and-christians'));

	echo publications_output("2011-04-08", translatable_elements('publications-and-lectures-2011-the-tribal-kurdish-society'));

	echo publications_output("2010-12-27", translatable_elements('publications-and-lectures-2010-the-jews-and-the-tribal-kurdish-society'));

	echo publications_output("2010-10-22", translatable_elements('publications-and-lectures-2010-on-the-jews-kurds-and-palestinians'));

	echo publications_output("2010-04-27", translatable_elements('publications-and-lectures-2010-jews-and-the-christians-in-kurdistan'));

	echo publications_output("2008-12-18", translatable_elements('publications-and-lectures-2008-some-aspects'));

	echo publications_output("2005-04-12", translatable_elements('publications-and-lectures-2005-the-case-of-the-kurds'));

	echo publications_output("2004-11-30", translatable_elements('publications-and-lectures-2004-research-of-the-jews-and-minorities-of-kurdistan'));

	echo publications_output("2003-11-14", translatable_elements('publications-and-lectures-2003-remarks-on-kurdistani-jews'));

	echo publications_output("2000-06-19", translatable_elements('publications-and-lectures-2000-notes-on-the-history'));

	echo publications_output("2015-01-04", translatable_elements('publications-and-lectures-2015-the-jews-of-kurdistan'));

	endif;

if ($pageview_request == "the-jews-of-kurdistan"):

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/book-compressed.jpg' width='1.8' height='1' layout='responsive'></amp-img>";
	echo "</figure>";

	echo "<blockquote>[This] is highly original and makes a significant contribution … His documentation is based on firsthand information, and is of the highest value. <i>(Dr. Joyce Blau, scholar)</i></blockquote>";

	echo "<p>The Jews of Kurdistan tells the stories of Jewish subjects that had lived and survived under the patronage of their tribal chieftains (or ‘aghas,’ i.e., masters) during the 19th and 20th centuries, in towns as well as in distant villages. It so happened that  the Jews of Kurdistan were able to preserve their own history and the history of their neighbours. Kurdish Jews from Kurdistan who immigrated to Israel and continued wearing Kurdish clothes, eating Kurdish food, and listening to Kurdish music every day of their lives. They kept the traditions of Kurdistan alive, and their stories are recorded in this authoritative book.</p>";

	echo "<p><b>Buy 'The Jews of Kurdistan: A Study in Survival' for $15 at <a href='https://kurdishjews.com/'>kurdishjews.com</a>.</b></p>";

	echo "<blockquote>This is an original, comprehensive study on the Jewish community in Kurdistan in the last stages of its existence, during the first half of the 20th century. The scope of this study is far wider than its name. <i>(Moshe Sharon, Hebrew University)</i></blockquote>";

	echo "<h2>Translations</h2>";

	echo "<p>The Jews of Kurdistan has been translated into multiple languages, including an Arabic translation published in Beirut without the  previous knowledge or consent of the author.  The fact that he is an Israeli was removed from the biography printed on the book cover in Arabic. The author is indeed highly praised, but he is introduced as an American Jewish scholar from NYU.</p>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/jews-praying-compressed.jpg' width='465' height='600' layout='responsive'></amp-img>";
	echo "</figure>";

	echo "<p>Interestingly, the cover is the famous 1878 artwork 'Jews Praying in the Synagogue on Yom Kippur', by Jewish painter Mauryey Gottlieb (1856-1879). He was a Polish Jewish realist painter who made significant contributions towards creating the genre of Jewish Art. The editors of the book in Arabic needed a picture for its cover, and when looking for a picture of Jews or some sort of symbol of Judaism, someone must have pulled this painting from the internet. Imagery and symbolism about Yom Kippur (the holiest day of the year for Jews) is prominent in the piece, which exemplifies many artistic values that are significant to Eastern European Jews at the time. It also contains many deeper allusions about Gottlieb’s short life. However, it has nothing to do with the Jews of the East and the Jews of Kurdistan.</p>";

	endif;

if ($pageview_request == "full-bibliography"):

	endif;

if ($pageview_request == "kurdistan-region"):

	echo "<p>Dr. Zaken was named as the Counselor to the Kurdistan Region regarding Jewish concerns, religious sites, heritage sites, and culture, on behalf of the community of Jews from Kurdistan by the authority of the National Association of Jews from Kurdistan in Israel.</p>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.3" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/1853-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Newroz celebrations at the Peshmerga frontline.</figcaption></figure>";

	echo "<p>Please check back soon for more announcements on additional projects.</p>";

	endif;

if ($pageview_request == "tomb-of-the-prophet-nahum"):

	echo "<p>The tomb of the Prophet Nahum, located in alQosh, is being renovated under the management of the Alliance for the Restoration of Cultural Heritage (ARCH) and the Kurdistan Regional Government. Dr. Zaken serves as a member of the board which is entrusted with monitoring the site, and has been instrumental in providing the blessing of the community of Jews from Kurdistan for whom the tomb complex served as a beating heart for thousands of years.</p>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.3" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/5271-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Renovation work on the Shrine of the Prophet Nahum.</figcaption></figure>";

//	echo "<figure class='amp-img-fader'>";
//	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
//	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.3" layout="nodisplay"></amp-position-observer>';
//	echo "<amp-img src='/media/t53whxjai2ijosfm-compressed.jpg' width='1.67' height='1' layout='responsive'></amp-img>";
//	echo "<figcaption>Early 20th century postcard of Erbil.</figcaption></figure>";

	endif;

if ($pageview_request == "historical-information"):

	echo "<blockquote>In 1950 and 1951, the entire Kurdish Jewish community immigrated to Israel. Over the years, Israeli Kurds followed the struggle of their Muslim brothers with great interest.</blockquote>";

	echo "<p>The initial immigrants have established in Israel a community of hundreds of thousands of Jews from Kurdistan, through their children, grandchildren, and further descendants.</p>";

	echo "<blockquote>The late Kurdish leader Mala Mustafa Barzani secretly visited Israel twice to meet with Israeli authorities. He also saw his Kurdish Jewish friend, David Gabai. In the 1930s, Gabai's father, Eliyahu, the leader of the Iraqi Jewish community of Aqra, Iraq, supplied food and aid to the Kurds who were revolting against the British. Some say that this special connection between the two families helped to increase Barzani's confidence in Israel.</blockquote>";
	
	echo "<figure>";
	echo "<amp-img src='/media/sharansky-compressed.jpg' width='3' height='4' layout='responsive'></amp-img>";
	echo "<figcaption>Moti (right) with Natan Sharansky, decorated Israeli political scientist and politician.</figcaption></figure>";

	echo "<p>Since the referendum on independence, there has emerged a renewed solidarity between Jews in Israel and Kurds in Kurdistan. Israeli flags waved at rallies in the Kurdistan Region, while Kurdish flags waved at rallies in Israel.</p>";

	echo "<blockquote>Israel has a moral obligation to help the Kurds. The Iraqi genocide against the Kurds is a signal that sympathy is not enough for survival in the Middle East.</blockquote>";

//	echo "<figure class='amp-img-fader'>";
//	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
//	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.3" layout="nodisplay"></amp-position-observer>';
//	echo "<amp-img src='/media/3277-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
//	echo "<figcaption>Details from a mosque in Erbil.</figcaption></figure>";

	echo "<p>Despite historical antisemitism by Kurdish chieftains, including attacks and abuses against the Jews under their authority, the Kurdish society has expressed an interest in the survival of Jews and Israel that reflects their own quest for self-determination.</p>";

	echo "<blockquote>Some aghas were not so nice, exploited the Jews, and took advantage of the Jews economically, physically, and other ways. However, I want to emphasize the good values, the good memories the Jews had from Kurdistan. And I want to share this with people.</blockquote>";

//	echo "<figure class='amp-img-fader'>";
//	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
//	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.3" layout="nodisplay"></amp-position-observer>';
//	echo "<amp-img src='/media/6916-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
//	echo "<figcaption>Kurdish Jews near Jerusalem.</figcaption></figure>";

	echo "<figure>";
	echo "<amp-img src='/media/uzi-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Moti (right) with Brigadier General (Reserve) Uzi Dayan, a staunch supporter of the Kurds, in the Old City of Jerusalem.</figcaption></figure>";

	echo "<p>Today, there is an inextricable relationship between Jewish people and Kurdish people in terms of culture, heritage, and existence in the Arab-majority Middle East.</p>";

	echo "<blockquote>The Kurds are entitled to an independent Kurdish national home just like the Jews, and they will sooner or later be granted this statehood.</blockquote>";

	endif;

if ($pageview_request == "world-kurdish-forum"):

	echo "<p>In early October 2012, Moti was invited by Prof. Alan Dilani, founder of the World Kurdish Forum, to attend the Forum’s conference in Erbil, the capital of the autonomous Kurdistan Region.</p>";

	echo "<blockquote>During the days of the conference, I met many people and was able to see Kurdistan for myself, after more than two decades of research from afar.</blockquote>";

	echo "<figure>";
	echo "<amp-img src='/media/citadel-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Moti (left) and Yona Sabar (right) at the doorway of a former Jewish residence in Erbil.</figcaption></figure>";

	echo "<blockquote>At the Citadel, I came across several houses whose doorways had a small socket for a mezuzah, the case for a Hebrew scroll containing passages from the Torah, indicating of course that it had been a residence of a Jewish family.</blockquote>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/7987-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Families atop the Citadel.</figcaption></figure>";

	echo "<blockquote>I visited the large mosque of the Citadel, located in a structure that had been previously a Jewish synagogue, as could be judged from its Jewish characteristics including the many symbols painted on its walls, and the purification bath adjacent to it.</blockquote>";

	echo "<figure>";
	echo "<amp-img src='/media/zakho-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Moti in Zakho.</figcaption></figure>";

	echo "<blockquote>Thanks to the office of the Kurdistan Region’s Presidency, I was driven to the city of Zakho, where my father was born and which was previously home to a large Jewish community. I visited the Jewish neighborhood and the Jewish market, and I visited the remains of the small synagogue in Zakho. I also spoke with elderly local Kurds.</blockquote>";

	echo "<amp-youtube data-videoid='UkSRVefP1Qw' layout='responsive' width='640' height='360'></amp-youtube>";

	endif;
	
if ($pageview_request == "israel"):

	echo "<blockquote>Israel is a safe haven in this region, in the Middle East, and in the cradle of mankind.</blockquote>";
	
	echo "<p>Dr. Zaken served as the National Director of the Institute of Students and Faculty on Israel (ISFI) in New York (1988-1991), and when returning to Israel, he continued his academic career, studying Islamic and Middle Eastern studies at the Hebrew university of Jerusalem. In 1997, he was asked to serve as the adviser on Arab Affairs to Prime Minister Benjamin Netanyahu (1997-1999), focusing on the Israeli Arab minority. He later served as the advisor on Arab Affairs at the Ministry of Public Security (2001-until now).</p>";
	
	echo "<blockquote>In my humble opinion, it is incumbent upon the Jewish people, as a people that has lived as a minority for thousands of years, to be sensitive to, and have a high degree of consciousness vis-a-vis the minorities living in their midst. I seek to operate in my position in accordance with this belief, to bring hearts together, and to widen the circles of co-existence between Arabs and Jews.</blockquote>"; 
	
	echo "<p>While at ISFI, he provided cultural resources, ideas, and tools for pro-Israel student activists throughout the US and Canada, through which Israeli-oriented activities and the message of Israel could be promoted on US campuses.</p>";

	endif;

if ($pageview_request == "minorities-affairs"):

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='/media/6541-compressed.jpg' width='1.5' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Clergy and pilgrims in Jerusalem.</figcaption></figure>";

	echo "<p>In Israel, he founded the Government - Christians Forum (2015) which was devoted to the needs of Christians of Western denominations (mostly evangelical) in Israel. At the core of Dr. Zaken's work on Arab, Bedouin, Christian, and other minority affairs is attention to improving life for all Israelis, a commitment to Israeli democracy, and a dedication to eradicating hate crimes and extremism.</p>";

	echo "<blockquote>In my position, I understand the importance of having a strong, defended and prospering Christian community in Israel.</blockquote>";

	echo "<p>Interview about the importance of Christians in the region and in Israel,</p>";

	echo "<amp-youtube data-videoid='6fvQdbLJOBQ' layout='responsive' width='640' height='360'></amp-youtube>";
	
	echo "<blockquote>It is very important that we will cooperate to solve problems, and to improve relations. We value the Christian groups and representatives. They are a very important asset for the Jewish state.</blockquote>";
	
	echo "<p>Interview about meetings organized by Dr. Zaken between Israeli officials and Christian leaders,</p>";
	echo "<amp-youtube data-videoid='i8yI-SLzSKg' layout='responsive' width='640' height='360'></amp-youtube>";
	
	echo "<p>Interview about combatting anti-Christian hate,</p>";
	echo "<amp-youtube data-videoid='B3tVz2kAv1k' layout='responsive' width='640' height='360'></amp-youtube>";
	
	echo "<blockquote>It's not enough to only show solidarity. We must continue to educate those who are responsible for hate. Also, we have to make sure that the police and other authorities will find those responsible for hate crimes. They must be caught and brought into trial.</blockquote>";
	
	echo "<p>Interview about combatting anti-Christian hate,</p>";
	echo "<amp-youtube data-videoid='Mn88fWoYmYY' layout='responsive' width='640' height='360'></amp-youtube>";
	
	echo "<p>Meeting with the Greek Orthodox Patriarch,</p>";
	echo "<amp-youtube data-videoid='KK2l8vaqrLo' layout='responsive' width='640' height='360'></amp-youtube>";
	
	endif;

if ($pageview_request == "press"):

	function press_report_output($date, $article_name, $link_url, $link_name=null) {
		if (empty($link_name)): $link_name = $article_name; endif;
		$press_report = "<tr><td>" . $date . "</td>";
		if (empty($link_name)):
			$press_report .= "<td><a href='" . $link_url . "'>" . $article_name . "</td></tr>";		
		else:
			$press_report .= "<td><a href='" . $link_url . "'>" . $link_name . "</a></td>";
			$press_report .= "<td>" . $article_name . "</td></tr>";
			endif;

		return $press_report; }

	echo "<table><tbody>";

	echo press_report_output("2020-08-29", "The Miracle of the Tomb of Prophet Nahum", "https://en.davar1.co.il/244830/", "davar1.co.il");

	echo press_report_output("2020-08-21", "הנס של קבר הנביא נחום", "https://www.davar1.co.il/242934/", "davar1.co.il");

	echo press_report_output("2020-07-14", "From Iraq to exodus: the flight of a country’s Jewish community", "https://www.rudaw.net/english/middleeast/iraq/140720202", "rudaw.net");

	echo press_report_output("2019-10-27", "Israel and the Kurds Strive to Maintain Post-US Relationship", "https://themedialine.org/by-region/whats-next-for-israel-and-the-kurds/", "themedialine.org");

	echo "</tbody></table>";

	echo "<blockquote>This affection between our nations is mutual. Not only are the Kurds very popular in Israel, but Israel and the Jews enjoy a good deal of respect and sympathy among the Kurds.</blockquote>";

	echo "<table><tbody>";

	echo press_report_output("2019-03-05", "Lending a Helping Hand to Strangers and Sojourners", "https://www.hudson.org/research/14847-lending-a-helping-hand-to-strangers-and-sojourners", "hudson.org");

	echo press_report_output("2019-02-26", "Christian Leaders Disappointed After Israel Shuts Down Government Christian Forum", "https://www1.cbn.com/cbnnews/israel/2019/february/christian-leaders-disappointed-after-israel-shuts-down-government-christian-forum", "cbn.com");

	echo press_report_output("2018-11-14", "Kurdistani Jews are caught between the Jewish state and the ethnonationalist ambitions of its Middle Eastern neighbors", "https://www.tabletmag.com/sections/israel-middle-east/articles/kurdistan-and-israel", "tabletmag.com");

	echo press_report_output("2017-11-29", "MKs unite to support Kurdish people at Knesset", "https://www.jpost.com/israel-news/mks-unite-to-support-kurdish-people-at-knesset-515613", "jpost.com");

	echo press_report_output("2017-10-10", "Kurd foes use Israeli stance to rally allies", "https://www.thejewishstar.com/stories/kurd-foes-use-israeli-stance-to-rally-allies,14560", "thejewishstar.com");

	echo press_report_output("2017-10-05", "Au Kurdistan irakien, la difficile renaissance du judaïsme (2/2), par Ines Gil", "https://www.tribunejuive.info/2017/10/05/au-kurdistan-irakien-la-difficile-renaissance-du-judaisme-22-par-ines-gil/", "tribubejuive.info");

	echo press_report_output("2017-07-18", "Temple Mount terror attack highlights sharp dichotomy between Israeli minorities", "https://www.jns.org/temple-mount-terror-attack-highlights-sharp-dichotomy-between-israeli-minorities/", "jns.org");

	echo "</tbody></table>";

	echo "<amp-youtube data-videoid='6fvQdbLJOBQ' layout='responsive' width='640' height='360'></amp-youtube>";

	echo "<table><tbody>";

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

	echo "</tbody></table>";

	echo "<blockquote>There is a desire to work to promote equal rights and opportunities in Israel.</blockquote>";

	echo "<table><tbody>";

	echo press_report_output("1998-01-02", "Excerpts from Report of the Government Ministries' Activities in the Non-Jewish Sector in 1997", "https://mfa.gov.il/mfa/mfa-archive/1998/pages/report%20of%20the%20government%20ministries-%20activities%20in.aspx", "mfa.gov.il");

//	echo press_report_output("", "", "", "");

	echo "</tbody></table>";

//	http://israeli-kurdish-friendship-league.blogspot.com/

	endif;
	
echo "</div>";

// Contact footer
echo "<div id='Contact'>";

	echo "<div id='contact-footer-primary'>";
		echo "To reach Dr. Zaken,<br>";
		echo "<a href='mailto:info@drmordechaizaken.com'>info@drmordechaizaken.com</a>";
		echo "</div>";

	echo "<div class='contact-footer-secondary'>";
		echo "<i>". $translatable_elements["to-contact-the-national-association"][$language_request] ."</i><br>";
		echo "&nbsp;&nbsp; <a href='https://kurdishjewry.org.il'>kurdishjewry.org.il</a><br>";
		echo "&nbsp;&nbsp; <a href='mailto:info@kurdishjewry.org.il'>info@kurdishjewry.org.il</a>";
		echo "</div>";

	echo "<div class='contact-footer-secondary'>";
		echo "<i>With Moti’s permission and support, this website has been developed and maintained by Foundation of Ours as part of the Foundation’s mission to support Jewish expression in the Kurdistan Region.</i>";
		echo "&nbsp;&nbsp; <a href='https://ours.foundation'>ours.foundation</a><br>";
		echo "&nbsp;&nbsp; <a href='mailto:info@ours.foundation'>info@ours.foundation</a><br>";
		echo "&nbsp;&nbsp; <a href='https://wa.me/12072165608'>+1 (207) 216-5608</a> (WhatsApp)";
		echo "</div>";

	echo "<div class='contact-footer-secondary'>";
		echo $translatable_elements["last-updated"][$language_request];
		echo "</div>";

	echo "</div>";

?>
