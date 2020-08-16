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
$pageview_request_allowed = [ "home", "bookstore", "jews-of-kurdistan", "arab-and-minority-affairs", "israel-and-zionism", ];
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

echo '<script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>';
echo '<script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js"></script>';
echo '<script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>';
echo '<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>';

echo '<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Alegreya+SC&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Molengo&display=swap" rel="stylesheet">';

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
		"background-image"	=> "linear-gradient(0deg, rgba(200,200,200,0.35), rgba(255,255,255,1))",
		"color"			=> "#333",
//		"column-width"		=> "300px",
//		"column-count"		=> "2",
//		"column-gap"		=> "30px",
		"font-family"		=> "Assistant",
		"text-align"		=> "center",
		"padding"		=> "50px 0 40px",
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
		"font-size"		=> "140%",
		"font-weight"		=> "700",
		"font-family"		=> "'Alegreya SC'",
		],
	
	"#navigation-header hr" => [
		"display"		=> "block",
		"width"			=> "100%",
		"height"		=> "1px",
		"border"		=> "none",
		"background"		=> "rgba(150,150,150,0.8)",
		],
	
	".navigation-header-button" => [
//		"background"		=> "rgba(255,255,255,1)",
		"color"			=> "rgba(100,100,100,1)",
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
//		"color"			=> "rgba(255,255,255,0.65)",
		"font-weight"		=> "700",
		"text-shadow"		=> "3px 3px 12px rgba(50,50,50,0.2)",
		],
	
	"#body-content" => [
		"display"		=> "block",
		"color"			=> "#333",
		"padding"		=> "30px 0 100px",
		"font-family"		=> "Molengo",
		"line-height"		=> "1.5em",
		],
	
	"#body-content h1, #body-content h2, #body-content p, 
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
		"max-width"		=> "950px",
		"padding"		=> "0",
		],
	
	"#body-content amp-img, #body-content amp-youtube" => [
		"border-radius"		=> "4px",
		],
	
	"#body-content figcaption" => [
		"font-size"		=> "80%",
		"font-family"		=> "Assistant",
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
	
	"#body-content h1, #body-content h2" => [
		"padding"		=> "0 100px 0 20px",
		"font-family"		=> "'Alegreya SC', 'Suez One', Serif",
		"font-weight"		=> "700",
		"line-height"		=> "1.4em",
		],
	
	"#body-content h1" => [
		"margin"		=> "50px auto",
		"font-size"		=> "240%",
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

// Navigation buttons
echo "<div id='navigation-header' amp-fx='parallax' data-parallax-factor='1.3'>";

	echo "<span id='navigation-header-topline' amp-fx='parallax' data-parallax-factor='1.1'>". $translatable_elements["from-the-desk-of"][$language_request] ."</span>";
	echo "<span id='navigation-header-name' amp-fx='parallax' data-parallax-factor='1.1'>". $translatable_elements["dr-mordechai-zaken"][$language_request] ."</span>";

	echo "<hr>";

	foreach ($pageview_request_allowed as $pageview_request_allowed_temp):
		if ($pageview_request_allowed_temp == $pageview_request):
			echo "<div class='navigation-header-button navigation-header-button-selected'>". $translatable_elements[$pageview_request_allowed_temp][$language_request] ."</div>";
			continue; endif;
		echo "<a href='/?pageview=".$pageview_request_allowed_temp."&language=".$language_request."'>";
		echo "<div class='navigation-header-button'>". $translatable_elements[$pageview_request_allowed_temp][$language_request] ."</div>";
		echo "</a>";
		endforeach;

	echo "<a href='#Contact'>";
	echo "<div class='navigation-header-button'>". $translatable_elements['contact'][$language_request] ."</div>";
	echo "</a>";

	echo "</div>";

echo "<div id='body-content'>";

if ([$pageview_request, $language_request] == ["home", "en"]):

	echo "<figure class='amp-img-fader' amp-fx='parallax' data-parallax-factor='1.14'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF9626-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Moti, during a meeting in Jerusalem.</figcaption></figure>";

	echo "<h1 amp-fx='parallax' data-parallax-factor='1.1'>Career summary of Dr. Mordechai Zaken</h1>";

	echo "<p amp-fx='parallax' data-parallax-factor='1.07'>Dr. Mordechai Zaken, born in 1958 in Jerusalem of Kurdistani descent, has devoted his career to researching and documenting Jews and Assyrian Christians within Kurdish-majority areas, as well as Kurds and Kurdistan, and to serving as an activist and consultant for these communities as well as for coexistence between all communities.</p>";

	echo "<ul>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>Representative of the community of Jews from Kurdistan to the Kurdistan Region (2020 - now).</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>Author of <i>The Jews of Kurdistan</i>, the authoritative volume on the topic (2007).</li>";
//	echo "<li>Founder of the Israel-Kurdistan Friendship League.</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>Adviser to the Prime Minister of Israel on Arab affairs, and Head of Minority Affairs Desk at the Home Ministry, Israeli Ministry of Public Security.</li>";
//	echo "<li>Director of the Institute of Students and Faculty on Israel, in New York.</li>";
	echo "</ul>";

	echo "<figure class='amp-img-fader' amp-fx='parallax' data-parallax-factor='1.03'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF5567-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Flags of Israel and Jerusalem, overlooking the ramparts.</figcaption></figure>";

	echo "<h2>Condensed highlights</h2>";

	echo "<blockquote>Being approached to represent hte community of Jews from Kurdistan is the fulfillment of ... From a childhood spent in awe of my father, who was himself born... To the years of seeing the Kurdistan Region one of the Middle East's rare success stories...</blockquote>";

	echo "<table><tbody>";
	echo "<tr><td>2020</td><td>Appointed by the National Association of Jews from Kurdistan to oversee Jewish affairs and Jewish sites in the Kurdistan Region.</td></tr>";
	echo "<tr><td>2019</td><td>2019 Laureate, Prime Minister Prize for Research of the Jews of the Orient.</td></tr>";
	echo "<tr><td>2016</td><td>Within the Public Security Ministry, Dr. Zaken formed a new governmental forum for dialogue with local Arab leaders.</td></tr>";
	echo "<tr><td>2015</td><td>Published: <i>Jewish Subjects</i> is translated into Sorani Kurdish, in Erbil.</td></tr>";
	echo "<tr><td>2013 Oct</td><td>Presentation to the World Kurdish Forum at their convention in Stockholm.</td></tr>";
	echo "<tr><td>2013</td><td>Published: <i>Jewish Subjects</i> is translated into Arabic, in Beirut.</td></tr>";
	echo "<tr><td>2013</td><td>With Christian leaders, Dr. Zaken initiaited the Government-Christians Forum that addressed the Evangelical Christian community's concerns regarding the government. Two prominent Christian leaders in this forum have been Rev. Charles (Chuck) Kopp, of the Baptist Church and Rev. David Pillegi, Rector of the Christ Church in Jaffa Gate.</td></tr>";
	echo "<tr><td>2012 Oct</td><td>Visit to the Kurdistan Region, at the invitation of the World Kurdish Forum.</td></tr>";
	echo "<tr><td>2010 Sep — 2013 Aug</td><td>Lecturer, The Hebrew University of Jerusalem</td></tr>";
	echo "<tr><td>2010</td><td>Sspoke in the Parliament of Berlin, Germany (22 October 2010)</td></tr>";
	echo "<tr><td>2007</td><td>Published: <i>Jewish Subjects and their Tribal Chieftains in Kurdistan: A Study in Survival</i>. This book was partly based on his doctorate dissertations.</td></tr>";
	echo "<tr><td>2007 May - present</td><td>Head of the Minority Affairs Desk at Israel's Ministry of Internal Security.</td></tr>";
	echo "<tr><td>2003</td><td>Published: Thesis on Jews of Kurdistan, through Hebrew University. He began working on this research project around 1985, culminating in his dissertation which unfolds the story of the Jews in Kurdistan in urban centers and villages, and their relations with their tribal chieftains (aghas) from whom they received patronage and protection in the tribal Kurdish society, in return for their loyalty and other social and financial duties and obligations. The second part of the thesis deals with the history of the Assyrians in Kurdistan, during the 19th and 20th centuries.</td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</tbody></table>";

	echo "<blockquote>Where others have shut the door, the Kurdistan Region has emerged as a sort of training ground for what sort of development can occur... </blockquote>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF4565-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Akre, near Duhok in the Kurdistan Region of Iraq.</figcaption></figure>";

	echo "<blockquote>By working on Assyrian... I learned the language fo Neo-Aramaic and found it to be...</blockquote>";

	echo "<table><tbody>";
	echo "<tr><td>2001 May — 2007 May</td><td>Advisor on Minorities Affairs at Israel's Ministry of Internal Security.</td></tr>";
	echo "<tr><td>2001 — 2003</td><td>Dr. Zaken was the coordinator of the Ministerial Committee to resolve the dispute between Christans and Muslims at the Basilica of the Anunciation in Nazareth.</td></tr>";
	echo "<tr><td>1999 Nov — 2001 Dec</td><td>Founder of East-Up Inc, which aimed to enhance medical services to the Arabic-speaking world in the Middle East, through the internet.</td></tr>";
	echo "<tr><td>1997 May - 1999 Dec</td><td>He was asked to serve as the Prime Minister's Adviser on Arab Affairs (1997-1999)</td></tr>";
	echo "<tr><td>1997</td><td>Published: <i>\"Inventors' Fate\", A Folk-Tale in the Neo-Aramaic of Zakho</i>.</td></tr>";
	echo "<tr><td>1993</td><td>Co-founder of The Israel-Kurdistan Friendship League, established in Jerusalem to faciliate friendship and dialogue between Israel and Kurdistan, as well as the Kurdish (mostly Muslim) world and the communities of Jews from Kurdistan as well as Jews interested in Kurdistan.</td></tr>";
	echo "<tr><td>1992</td><td> When he returned to Israel, he taught at the Hebrew University of Jerusalem for several years.</td></tr>";
	echo "<tr><td>1990</td><td>Published: Translation of the <i>Book of Ruth</i> into New-Aramaic, by Drs. Gideon Goldberg and Mordechai Zaken.</td></tr>";
	echo "<tr><td>1989 Jan — 1991 Oct</td><td>He served as the National Director of the Institute of Students & Faculty on Israel (ISFI), while living in New York City, an organization under the auspices of the Israeli Foreign Ministry and the Israeli Consulate in New York City.</td></tr>";
	echo "<tr><td>1989 — 1990</td><td>He received a study grant from New York University.</td></tr>";
	echo "<tr><td>1988</td><td>Completed his MA in Near Eastern and Islamic Studies at the Hebrew University of Jerusalem, with specialization in the minorities in the Middle East and in particular the Jews and the Assyrian Christians within Kurdish-majority areas.</td></tr>";
	echo "<tr><td>1987 - 1988</td><td>He received a study grant from the State university of New York (SUNY) at Binghamton.</td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</table>";

	echo "<blockquote>Since a young age, I have been committed to... My upbrining gave me a commitment to... Seeing the experience of the Jews of Kurdistan, I was raised with an....</blockquote>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF4377-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Rawanduz, near Erbil in the Kurdistan Region of Iraq.</figcaption></figure>";

	echo "<blockquote>Being born Israeli meant being born into a responsibility to stand up for human rights... .</blockquote>";

	echo "<table><tbody>";
	echo "<tr><td>1990ish</td><td>Dr. Zaken is married to Riki, and the two continue to have three children: Tzah, Tahel, and Ohad.</td></tr>";
	echo "<tr><td>1985 - 2002</td><td>He conducted hundreds of first-hand oral history accounts in Israel and abroad with more than 60 elderly Kurdish Jews, originally from Kurdistan, who shared their knowledge on the tribal Kurdish society and setting with him. From this, Dr. Zaken was able to reconstruct and tell the history of the Jews and the tribal Kurdish society.</td></tr>";
	echo "<tr><td>1984 - 1985</td><td>As an MA student at Hebrew University, he wished to write a paper on the economy of Kurdistani Jews. To his astonishment, he discovered that there was hardly any written material on the Kurds and on the Jews of Kurdistan. Because of the lack of written material, he had to resort to oral-history and interviewed 12 elderly Kurdistani Jews for that paper alone.</td></tr>";
	echo "<tr><td>1984</td><td>Completed his BA in Political Science and Near Eastern & Islamic Studies at the Hebrew University of Jerusalem.</td></tr>";
	echo "<tr><td>1983</td><td>Co-Chief Editor of 'Tipul Shoresh', an annual about activism at the Hebrew Universe of the public activists' program at the Hebrew University, the circulation of which was stopped by the directors and university administration, due to its critical approach towards the university policy regarding social issues.</td></tr>";
	echo "<tr><td>1982</td><td>Editor-in-Chief of 'Pi Ha-Aton' (פי-האתון), a student newspaper. On 26 April 1982, for a special Independence Day edition, Dr. Zaken published photos (and the story behind their uncovering) taken in 1948 by Arabs, which showed mutilated faces and bodies of Jewish soldiers who had been in an army unit which later became know as the 'Nabi Daniel Caravan' (שיירת נבי דניאל).</td></tr>";
	echo "<tr><td>1980</td><td>Began his baccalaureate studies at the Hebrew University of Jerusalem.</td></tr>";
	echo "<tr><td>1958</td><td>Moti is born in Jerusalem of Kurdistani and Iraqi background.</td></tr>";
	echo "<tr><td></td><td>Moti's father Saleh is born in Zakho in Iraqi Kurdistan.</td></tr>";
	echo "<tr><td></td><td>Moti's mother Batyah is born in Elroi, in northern Israel, of ___ background.</td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</tbody></table>";

	echo "<blockquote>In the neighborhood where I grew up, we spoke, they spoke Aramaic and Kurdish together. These people left Kurdistan, but Kurdistan did not leave them.</blockquote>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF2224-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>The Arab neighborhood of the Old City in Jerusalem.</figcaption></figure>";

	echo "<h2>References</h2>";

	echo "<blockquote>I am grateful to scholars such as... Who have accomplished... .</blockquote>";

	echo "<p>His most favored and inspiring teachers have been Prof. Moshe Sharon (under whom he studied Islamic civilization and culture as well as Arabic and Farsi); Prof. B. Z. Kedar (general History and comparative history); Prof. Gideon Goldenberg (Neo-Aramaic of the Jews and Assyrians of the Kurdish regions); Prof. Michael Zand (Farsi); and the late Prof. Amnon Netzer (Farsi and Persian Jewish History).</p>";

	echo "<h2>Media summary</h2>";

	echo "<table><tbody>";
	echo "<tr><td>2017 Apr</td><td><a href='https://www.youtube.com/watch?v=i8yI-SLzSKg'>Interview on CBN about Israel-Christian relations</a></td></tr>";	
	echo "<tr><td>2006 May 11</td><td>Meeting with Hamas: <a href='http://cbgonzo.blogspot.co.il/2006/05/10-more-questions.html'>Yahoo news</a></td></tr>";	
	echo "<tr><td>1999 Apr 21</td><td>Likud Denies It Is Exploiting Conflict: <a href='http://articles.latimes.com/1999/apr/21/news/mn-29526/2'>LA Times</a></td></tr>";	
	echo "<tr><td>1999 Apr 20</td><td>Compromise on Nazareth: <a href='http://www.nytimes.com/1999/04/20/world/israel-sets-forth-compromise-plan-on-nazareth-mosque-dispute.html'>NY Times</a></td></tr>";	
	echo "<tr><td>1999 Apr 07</td><td>Protesting demolition of homes: <a href='http://articles.latimes.com/1998/apr/07/news/mn-36961'>LA Times</a></td></tr>";	
	echo "<tr><td>1999 Apr 06</td><td>Demolition of homes: <a href='http://www.apnewsarchive.com/1998/Israeli-Arabs-Protest-Demolition/id-debabd28296ea20a9d9a26c5de57ad57'>AP</a></td></tr>";	
	echo "<tr><td>1998 Apr 28</td><td>Unrecognized villages: <a href='http://edition.cnn.com/WORLD/meast/9804/28/israel.forty.villages/index.old.html'>CNN</a></td></tr>";	
	echo "<tr><td></td><td></td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</tbody></table>";

	endif;

if ([$pageview_request, $language_request] == ["bookstore", "en"]):

	echo "<h2>Bookstore</h2>";
	echo "<p>To buy <a href='https://kurdishjews.com/'>The Jews of Kurdistan and their Tribal Chieftains</a>.</p>";
	echo "<p></p>";

	endif;

if ([$pageview_request, $language_request] == ["jews-of-kurdistan", "en"]):

	echo "<h2>Jews of Kurdistan</h2>";

	echo "<blockquote>The Kurds are proud people, and smart people. They are smart enough to draw their own conclusion from the political and historical situation.</blockquote>";

	echo "<dl>";

		echo "<dt>Who is the representative for Jewish affairs and Jewish sites in the Kurdistan Region?</dt>";
		echo "<dd>Dr. Mordechai Zaken is the representative appointed by the National Association of Jews of Kurdistan in Israel regarding Jewish affairs and Jewish sites in the Kurdistan Region, and he also serves as National Association's cultural and historical expert of the Jewish Kurdish history and heritage. He was nominated by the National Association, and the National Association has communicated twice with the Kurdistan Region President's bureau in the KRG through two letters that Dr. Zaken and the National Association's National Chair Ammon Ashkenazi sent expressing their concern regarding acts such as taking over or abusing the Tomb of Nahum by politicians and others. It was agreed that the Kurdistan Region would be glad to be advised by Dr. Zaken in such matters related to the Jewish community and heritage, pending officialization which is on hold due to the cornavirus pandemic.</dd>";

		echo "<dt>What is the role of representative?</dt>";
		echo "<dd>The Jews of Kurdistan are happy to share hands with the Kurdistan Region's authorities, Muslim Kurdish leaders, and Assyrian and Chaldean communities in alQosh to protect and burnish religious and spiritual sites such as the Tomb of Nahum and others, in the name of guarding sites from damage and abuse. The representative supports reconciliation, coexistence, and positive mutuality for all.</dd>";

		echo "<dt>What is the scope of the role of representative?</dt>";
		echo "<dd>The scope of the role of representative is Jewish affairs and Jewish sites in areas administered by the Kurdistan Region.</dd>";

		echo "<dt>Who does the representative represent?</dt>";
		echo "<dd>The representative represents the community of Jews from Kurdistan, with regards to issues within the jurisdiction of the Ministry of Endowments and Religious Affairs in the Kurdistan Region. Although there are no Jews in the Kurdistan Region except for some expatriates, there is Jewish heritage and goodwill towards Jews in the Kurdistan Region which is of deep importance to the community of Jews from Kurdistan.</dd>";
	
		echo "<dt>How is the representative appointed?</dt>";
		echo "<dd>The role of representative is selected by the National Association of Jews from Kurdistan. Authority is vested in the representative by the National Association, and recognized by the Ministry of Endowments and Religious Affairs in the Kurdistan Region.</dd>";
	
		echo "</dl>";

	echo "<blockquote>I became invovled in Kurdistan in a very pecular way. I was a student at the Hebrwe Uni of Jerusalem when I wanted to write a paper about the economy of Kurdistan. My professor said <i>fine</i> but then I realized there were hardly any documents in Hebrew, in Arabic, nor other other languages. So I had to interview people for this apper. For this paper on ethe economy of Zakho, whre my father is from, I itnerviewe 12 people. This fantastic mechanism, this experience fo interviewing old Kurdish Jews really fascinated me and drew me into the subject. These Krudish people, these Jewish Kurds who lived in Israel, but they lived for fifty eyars,for sitxy years in Kurdistan, ahd grown up in an oral culture. They spoke four, five, six languages; tey knew the map by ehart because they traveld by donkey or mule; and they knew all the villages, all the aghas, all the histories of Kurdsitan becaue they lived it. </blockquote>";

	echo "<dl>";

		echo "<dt>What sparked Dr. Zaken's role?</dt>";
		echo "<dd>Dr. Zaken's family is from Zakho, in the Kurdistan Region. Over the course of his life, he has supported his heritage and has devoted his academic, political, and personal life to this cause.</dd>";

		echo "<dt>What is the population of Jews from Kurdistan?</dt>";
		echo "<dd>There are approximately 200,000 Jews who are ancestrally from Kurdistan. The community of Jews from Kurdistan has maintained continuous rabbinical, social, and other institutions from the time they were in Kurdistan through today.</dd>";

		echo "<dt>Are there Jews in Kurdistan now?</dt>";
		echo "<dd>To be born Jewish, someone must have a Jewish mother as recognized by a Rabbi. There are zero Jews remaining in the Kurdistan Region, except for a small number of expatriates.</dd>";

		echo "<dt>Who does the representative <i>not</i> represent?</dt>";
		echo "<dd>The representative is not representing the governments of Israel nor the Kurdistan Region in this role. It is an appointment made by the civil and religious leadership of the Jews of Kurdistan, and the community's desired leadership is respectfully recognized by the Ministry of Endowments and Religious Affairs in the Kurdistan Region.</dd>";
		
		echo "<dt>What issues does the representative <i>not</i> represent?</dt>";
		echo "<dd>As an appointment made by the National Association of Jews from Kurdistan and recognized by the Ministry of Endowments of Religious Affairs in the Kurdistan Region, the representative is not involved in issues beyond the authority of these institutions. The role of represenative does not include bilateral relations between any two countries, nor is the role of representative devoted in any way to broader issues such as infrastructure.</dd>";

		echo "<dt id='kurdish-jews-in-the-news-question'><a href='kurdish-jews-in-the-news'>What about Kurdish Jews in Kurdistan in the news?</a></dt>";
		echo "<dd id='kurdish-jews-in-the-news-answer'>As stated above, there are zero Jews remaining in the Kurdistan Region. Recently, some eccentric Muslims have claimed to be Jewish. This is a total fraud, and a deeply antisemitic betrayal of Judaism, Jewish people, and Jewish values.</dd>";

		echo "<dt>Can I be part Jewish?</dt>";
		echo "<dd>There are many people with distant Jewish relatives who converted to Islam and Christianity, and intermarried. They are not Jewish. However, well-intentioned interest in learning about their family history is a welcomed and personal basis for enhancing mutual respect between Jewish and non-Jewish communities.</dd>";

		echo "<dt>Can I visit Israel?</dt>";
		echo "<dd>Iraq does not recognize Israel's existence. This makes it almost impossible for Israel to grant visas to Iraqi passport holders. However, Israel has remained committed to providing exceptions for international organizations that bring Iraqis to Israel for life-saving medical treatments.</dd>";

		echo "<dt>How can educators arrange exchanges?</dt>";
		echo "<dd>If you are interested in arranging exchanges online, we are happy to encourage projects that bring students in the Kurdistan Region together with Jewish students outside the Kurdistan Region.</dd>";

		echo "<dt>What if I want to be Jewish or consider myself Jewish?</dt>";
		echo "<dd>Jewish status is based on recognition by a Rabbi. There are no Jews remaining in the Kurdistan Region, except for expatriates. The community of Jews from Kurdistan is not at all interested in conversion.</dd>";

		echo "</dl>";

	echo "<blockquote>My book, my research contains hundreds of stories. Some are about aghas who are not so nice, who exploited the jews, who took advantage of the Jews economically, physicially, and other ways. but I want to emphasize the good values, the good memroies the jewish had from Kurdistan. And I want to share it with you.</blockquote>";

	echo "<dl>";

		echo "<dt>What was life like for Kurdish Jews in Kurdistan?</dt>";
		echo "<dd>Like other places, there was antisemitism in the broader society that targeted Jews in unique, bitter, and harmful ways. However, the Kurdish world is overwhelmingly dynamic and this is not the defining feature of Jewish life in Kurdistan. The focus is on reconciliation, including acknowleding happy and painful parts of history, and learning from both for a positive future.</dd>";

		echo "<dt>?</dt>";
		echo "<dd>.</dd>";

		echo "<dt>What about the Friendship league?</td>";
		echo "<dd>The founder was Mordechai Zaken[4][5] and the main activists who worked together were the late Moshe Zaken, a business man from Jerusalem, Meir Baruch, a retired military person, Michael Niebur who spent some time in NGOs helping the Kurds, and Mathew B. Hand an American who promoted activity of coexistence with Muslims. The response of Kurdish representatives and organizations both in Kurdistan and the diaspora was enthusiastic as can be judged from hundreds of letters, phone calls and also email received in Jerusalem within short time after the announcement of its founding in the world press and in The Voice of America in the Kurdish language, which conducted interviews with the founder, Mordechai Zaken. The League also published a newsletter called yedidut (heb., friendship) carrying the message of Israeli and Jewish friendship to Kurds worldwide.</dd>";
		
		echo "</dl>";
		
	echo "<blockquote>The Kurdish people often forgot their history because they were busy with their struggle, with being oppressed. They had so many economic, social, military problems — and the Assyrians also, were dispersed. So the only people who kept the memory of Kurdistan were the memory of Kurdish Jews from Kurdistan who immigrated to israel and continued wearing Kurdish clothes, eating Kurdish food, and listening to Kurdish music every day of their lives. They kept the tradition of Kurdistan alive./blockquote>";
	echo "<p></p>";
	
	endif;
	
if ([$pageview_request, $language_request] == ["arab-and-minority-affairs", "en"]):

	echo "<h1>Arab and Minority Affairs</h1>";
	
	echo "<p>At the core of Dr. Zaken's work on Arab, Christian, and other minority affairs is attention to improving life for all Israelis, a committment to israeli democracy, and a dedication to eradicating hate crimes and extremism.</p>";
	
	echo "<h2>Arab affairs</h2>";
	
	echo "<h2>Christian affairs</h2>";
	
	echo "<blockquote>In my position, I understand the importance of having a strong, defended and prospering Christian community in Israel.</blockquote>"; 
	
	echo "<p>Interview about the importance of Chritians in the region and in Israel,</p>";
	echo "<amp-youtube data-videoid='6fvQdbLJOBQ' layout='responsive' width='640' height='360'></amp-youtube>";
	
	echo "<blockquote>It is very important that we will be cooperating to solve problems, and to improve relations. We value the Christian groups and representatives. They are a very important asset for the Jewish state.</blockquote>";
	
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
	
if ([$pageview_request, $language_request] == ["israeli-and-zionism", "en"]):

	echo "<h2>Israel and Zionism</h2>";
	echo "<p>ISFI provided political and cultural resources, ideas and tools, for Jewish and pro-Israel student activists throughout the US and Canada, through which Israeli oriented activities and the message of Israel could be promoted in US campuses.</p>";
	echo "<p></p>";

	endif;

echo "</div>";

// Contact footer
echo "<div id='Contact'>";

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
