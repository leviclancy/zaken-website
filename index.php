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
	
	"#body-content h1, #body-content h2, #body-content p, #body-content ul, #body-content ol, #body-content figure, #body-content table, #body-content blockquote" => [
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
	
	"#body-content amp-img" => [
		"border-radius"		=> "4px",
		],
	
	"#body-content figcaption" => [
		"font-size"		=> "80%",
		"font-family"		=> "Assistant",
		],
	
	"#body-content blockquote" => [
		"font-size"		=> "110%",
		"font-family"		=> "Noto Serif JP",
		"padding"		=> "0 30px",
		"max-width"		=> "650px",
		],
	
	"#body-content blockquote::before" => [
		"content"		=> "\275D",
		"font-size"		=> "150%",
		"line-height"		=> "1.4",
		"float"			=> "left",
		"padding"		=> "5px",
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

	echo "<table><tbody>";
	echo "<tr><td>2019</td><td>2019 Laureate, Prime Minister Prize for Research of the Jews of the Orient.</td></tr>";
	echo "<tr><td>2016</td><td>In 2016, within the Public Security Ministry, he formed a new governmental forum for dialogue with local Arab leader</td></tr>";
	echo "<tr><td>2015</td><td>Published: <i>Jewish Subjects</i> is translated into Sorani Kurdish, in Erbil.</td></tr>";
	echo "<tr><td>2013 Oct</td><td>Presentation to the World Kurdish Forum at their convention in Stockholm.</td></tr>";
	echo "<tr><td>2013</td><td>Published: <i>Jewish Subjects</i> is translated into Arabic, in Beirut.</td></tr>";
	echo "<tr><td>2013</td><td>In 2013 he initiated with Christian leaders the Government – Christians Forum that addresses the concerns of the Evangelical Christian community vis a vis the government.[45][46][47][48][49] Two prominent Christian leaders in this forum have been Rev. Charles (Chuck) Kopp, of the Baptist Church and Rev. David Pillegi, Rector of the Christ Church in Jaffa Gate.</td></tr>";
	echo "<tr><td>2012 Oct</td><td>Visit to the Kurdistan Region, at the invitation of the World Kurdish Forum.</td></tr>";
	echo "<tr><td>2010 Sep — 2013 Aug</td><td>Lecturer, The Hebrew University of Jerusalem</td></tr>";
	echo "<tr><td>2010</td><td>He recently spoke in the Parliament of Berlin, Germany (22 October 2010)</td></tr>";
	echo "<tr><td>2007</td><td>Published: <i>Jewish Subjects and their Tribal Chieftains in Kurdistan: A Study in Survival</i>. This book was partly based on his doctorate dissertations.</td></tr>";
	echo "<tr><td>2007 May - present</td><td>Head of the Minority Affairs Desk at Israel's Ministry of Internal Security.</td></tr>";
	echo "<tr><td>2003</td><td>Published: Thesis on Jews of Kurdistan, through Hebrew University. He began working on this research project around 1985, culminating in his dissertation which unfolds the story of the Jews in Kurdistan in urban centers and villages, and their relations with their tribal chieftains (aghas) from whom they received patronage and protection in the tribal Kurdish society, in return for their loyalty and other social and financial duties and obligations. The second part of the thesis deals with the history of the Assyrians in Kurdistan, during the 19th and 20th centuries.</td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</tbody></table>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF4565-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Akre, near Duhok in the Kurdistan Region of Iraq.</figcaption></figure>";

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

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF4377-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Rawanduz, near Erbil in the Kurdistan Region of Iraq.</figcaption></figure>";

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

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF2224-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>The Arab neighborhood of the Old City in Jerusalem.</figcaption></figure>";

	echo "<h2>References</h2>";

	echo "<p>His most favored and inspiring teachers have been Prof. Moshe Sharon (under whom he studied Islamic civilization and culture as well as Arabic and Farsi); Prof. B. Z. Kedar (general History and comparative history); Prof. Gideon Goldenberg (Neo-Aramaic of the Jews and Assyrians of the Kurdish regions); Prof. Michael Zand (Farsi); and the late Prof. Amnon Netzer (Farsi and Persian Jewish History).</p>";

	echo "<h2>Articles summary</h2>";

	echo "<table><tbody>";
	echo "<tr><td></td><td></td></tr>";	
	echo "<tr><td>2017 Apr</td><td><a href='https://www.youtube.com/watch?v=i8yI-SLzSKg'>Interview on CBN about Israel-Christian relations.</a></td></tr>";	
	echo "<tr><td></td><td></td></tr>";	
	echo "<tr><td></td><td></td></tr>";	
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

	echo "<dl>";

		echo "<dt>What is the role of representative?</dt>";
		echo "<dd>The representative is responsible for advising on</dd>";

		echo "<dt>How is the representative appointed?</dt>";
		echo "<dd>The role of representtive is selected by the Nationnal Association, and awaiting confirmation by the Ministry of Endowments and Religious Affairs in the Krudistan Region.</dd>";
	
		echo "<dt>What sparked Dr. Zaken's interest?</dt>";
		echo "<dd>and was fascinated by meeting people who were the product of a disappearing oral and verbal culture; people who had so much life experience and knowledge about subjects that were hardly discussed in written literature. Some of these informants were natural story-tellers; some had encyclopedic knowledge; most of them were ordinary people who had to speak 2 or 3 languages from the languages spoken in and around Kurdistan (Kurdish, Arabic, Turkish, Farsi, Armenian etc.) in order to survive in their travels throughout the Kurdish mountains and plains and in their daily encounters with their members of the communities that lived around them, among them Kurdish masters (aghas), tribesmen, brigands and outlaws ('firars'). Some of the Jewish travellers developed the talent of being story tellers, because in the rigid and tribal setting of the Kurdish society, they were merchants or peddlers, who would roam through the Kurdish villages, sell their products and earn their living. During the evening leisure time, they would sit in the company of the tribal or village dignitaries, in the 'diwan-khane' (guest rooms or guest houses) of the tribal or village chieftains (aghas, drink tea or coffee and tell the updated tribal and local news to their tribal hosts and chieftains (aghas) under whose tribal jurisdiction they stayed.</dd>";

		echo "<dt>What are some common misconceptions about the representative?</dt>";
		echo "<dd>As an appointment made between the National Association of Jews from Kurdistan and the Ministry of Endowments of Religious Affairs in the Kurdistan Region, the representative is not involved in issues outside the scope of these two institutions. The role of represenative does not include bilateral relations between any two countries, nor is the role of representative devoted in any way to economic or other activities within or between countries. The role of represenative is stricly limited to Jewish affairs and Jewish sites in areas administered by the Kurdistan Region.</dd>";

		echo "<dt>Are there Jews in Kurdistan now?</dt>";
		echo "<dd>To be born Jewish, someone must have a Jewish mother. There is no longer anybody born anywhere in the Kurdistan Region who can show this to be true according to rabbinical requirements. For this reason, it is important to be clear that there are zero Jews remaining in the Kurdistan Region except for a small number of expatriates.</dd>";

		echo "<dt>What about Kurdish Jews in Kurdistan in the news?</dt>";
		echo "<dd>As stated above, there are zero Jews remaining who were born in the Kurdistan Region. Recently, some eccentric individuals from Muslim families have claimed to be Jewish. Although there are surely many people with distant Jewish ancestry, there is nobody whose claims were verified. Certain individuals have been found to be committing total fraud, such as ___ and ___.</dd>";

		echo "<dt>What about the Friendship league?</td>";
		echo "<dd>The founder was Mordechai Zaken[4][5] and the main activists who worked together were the late Moshe Zaken, a business man from Jerusalem, Meir Baruch, a retired military person, Michael Niebur who spent some time in NGOs helping the Kurds, and Mathew B. Hand an American who promoted activity of coexistence with Muslims. The response of Kurdish representatives and organizations both in Kurdistan and the diaspora was enthusiastic as can be judged from hundreds of letters, phone calls and also email received in Jerusalem within short time after the announcement of its founding in the world press and in The Voice of America in the Kurdish language, which conducted interviews with the founder, Mordechai Zaken. The League also published a newsletter called yedidut (heb., friendship) carrying the message of Israeli and Jewish friendship to Kurds worldwide.</dd>";
		
		echo "</dl>";
		
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
