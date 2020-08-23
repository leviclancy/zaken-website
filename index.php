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
$pageview_request_allowed = [ "home", "bookstore", "kurdistan-region", "israel", ];
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
	
	"a" => [
		"font-family" 		=> "inherit",
		"color"			=> "inherit",
		"font-size"		=> "inherit",
		"text-decoration"	=> "inherit",
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

	echo "<span id='navigation-header-topline' amp-fx='parallax' data-parallax-factor='1.1'>". $translatable_elements["the-official-website-of"][$language_request] ."</span>";
	echo "<span id='navigation-header-name' amp-fx='parallax' data-parallax-factor='1.1'>". $translatable_elements["dr-mordechai-moti-zaken"][$language_request] ."</span>";
	echo "<span id='navigation-header-topline' amp-fx='parallax' data-parallax-factor='1.1'>". $translatable_elements["prepared-by-foundation-of-ours"][$language_request] ."</span>";

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

	echo "<p amp-fx='parallax' data-parallax-factor='1.1'>Dr. Mordechai \"Moti\" Zaken is an eminent scholar on Jews of Kurdistan, as well as on Assyrians, and is fluent in the Neo-Aramaic that the Jews of Kurdistan spoke, as well as English and his native Hebrew. His book <i>The Jews of Kurdistan</i> is a leading resource on the topic, and was compiled from decades of interviews with Jews who were born in Kurdistan and immigrated to Israel. In his academic career, he has pushed the field of Kurdish and Assyrian studies forward in Israel and internationally.</p>";


	echo "<p amp-fx='parallax' data-parallax-factor='1.1'>This website has been developed and maintained by <a href='https://ours.foundation'>Foundation of Ours</a>, which supports Jewish expression in the Kurdistan Region.</p>";

	echo "<h1 amp-fx='parallax' data-parallax-factor='1.07'>Career summary of Dr. Mordechai Zaken</h1>";

	echo "<ul>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>Authoritative expert on the history and heritage of the Jews of Kurdistan.</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>Representative of the community of Jews from Kurdistan to the Kurdistan Region (2020 - now).</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>Author of <i>The Jews of Kurdistan</i>.</li>";
//	echo "<li>Founder of the Israel-Kurdistan Friendship League.</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>Adviser on Arab Affairs to the Prime Minister of Israel.</li>";
	echo "<li amp-fx='parallax' data-parallax-factor='1.04'>Head of Minority Affairs Desk at Israel's Ministry of Public Security.</li>";
//	echo "<li>Director of the Institute of Students and Faculty on Israel, in New York.</li>";
	echo "</ul>";

	echo "<figure class='amp-img-fader' amp-fx='parallax' data-parallax-factor='1.03'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF5567-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Flags of Israel and Jerusalem, overlooking the ramparts.</figcaption></figure>";

	echo "<h2>Condensed highlights</h2>";

	echo "<blockquote>Coexistence and mutual traditions are the foundation of the relationship between Jews and Kurds.</blockquote>";

	echo "<table><tbody>";
	echo "<tr><td>2020</td><td>Appointed by the National Association of Jews from Kurdistan to oversee Jewish affairs and Jewish sites in the Kurdistan Region.</td></tr>";
	echo "<tr><td>2019</td><td>2019 Laureate, Prime Minister Prize for Research of the Jews of the Orient.</td></tr>";
	echo "<tr><td>2016</td><td>Within the Public Security Ministry, Dr. Zaken formed a new governmental forum for dialogue with local Arab leaders.</td></tr>";
//	echo "<tr><td>2015</td><td>Published: <i>Jewish Subjects</i> is translated into Sorani Kurdish, in Erbil.</td></tr>";
	echo "<tr><td>2013 Oct</td><td>Presentation to the World Kurdish Forum at their convention in Stockholm.</td></tr>";
//	echo "<tr><td>2013</td><td>Published: <i>Jewish Subjects</i> is translated into Arabic, in Beirut.</td></tr>";
	echo "<tr><td>2013 — 2018</td><td>With Christian leaders, Dr. Zaken initiaited the Government-Christians Forum that addressed the Evangelical Christian community's concerns regarding the government. Two prominent Christian leaders in this forum have been Rev. Charles (Chuck) Kopp, of the Baptist Church and Rev. David Pillegi, Rector of the Christ Church in Jaffa Gate. The Forum came to a conclusion in 2018, once the government concluded it was not part of government's scope.</td></tr>";
	echo "<tr><td>2012 Oct</td><td>Visit to the Kurdistan Region, at the invitation of the World Kurdish Forum.</td></tr>";
	echo "<tr><td>2010 Sep — 2013 Aug</td><td>Lecturer, The Hebrew University of Jerusalem</td></tr>";
	echo "<tr><td>2010</td><td>Spoke in the Parliament of Berlin, Germany (22 October 2010)</td></tr>";
	echo "<tr><td>2007</td><td>Published: <i>Jewish Subjects and their Tribal Chieftains in Kurdistan: A Study in Survival</i>. This book was partly based on his doctorate dissertation.</td></tr>";
	echo "<tr><td>2007 May - present</td><td>Head of the Minority Affairs Desk at Israel's Ministry of Internal Security.</td></tr>";
	echo "<tr><td>2003</td><td>Published: Thesis on Jews of Kurdistan, through Hebrew University. He began working on this research project around 1985, culminating in his dissertation which unfolds the story of the Jews in Kurdistan in urban centers and villages, and their relations with their tribal chieftains (aghas) from whom they received patronage and protection in the tribal Kurdish society, in return for their loyalty and other social and financial duties and obligations. The second part of the thesis deals with the history of the Assyrians in Kurdistan, during the 19th and 20th centuries.</td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</tbody></table>";

	echo "<blockquote>The Kurdish national issue started long before the establishment of the Jewish state, and like the establishment of the Jewish state it is a moral cause.</blockquote>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF4565-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Akre, near Duhok in the Kurdistan Region of Iraq.</figcaption></figure>";

	echo "<blockquote>within the scope of my jurisdiction as the head of minorities affairs at the Ministry of Public Security, and as a consultant to the National Assocation, I continue to work and cooperate with leaders in Israel and abroad to foster Israeli-Christian, Israeli-Kurdish, and Israeli-Assyrian friendship</blockquote>";

	echo "<table><tbody>";
	echo "<tr><td>2001 May — 2007 May</td><td>Adviser on Minorities Affairs at Israel's Ministry of Internal Security.</td></tr>";
	echo "<tr><td>2001 — 2003</td><td>Dr. Zaken was the coordinator of the Ministerial Committee to resolve the dispute between Christans and Muslims at the Basilica of the Anunciation in Nazareth.</td></tr>";
	echo "<tr><td>1999 Nov — 2001 Dec</td><td>Founder of East-Up Inc, which aimed to enhance medical services to the Arabic-speaking world in the Middle East, through the internet.</td></tr>";
	echo "<tr><td>1997 May - 1999 Dec</td><td>Prime Minister's Adviser on Arab Affairs.</td></tr>";
	echo "<tr><td>1997</td><td>Published: <i>\"Inventors' Fate\", A Folk-Tale in the Neo-Aramaic of Zakho</i>.</td></tr>";
	echo "<tr><td>1993</td><td>Co-founder of The Israel-Kurdistan Friendship League, established in Jerusalem to faciliate friendship and dialogue between Israel and Kurdistan, as well as the Kurdish (mostly Muslim) world and the communities of Jews from Kurdistan as well as Jews interested in Kurdistan.</td></tr>";
	echo "<tr><td>1992</td><td> When he returned to Israel, he taught at the Hebrew University of Jerusalem for several years.</td></tr>";
	echo "<tr><td>1990</td><td>Published: Translation of the <i>Book of Ruth</i> into New-Aramaic, by Drs. Gideon Goldberg and Mordechai Zaken.</td></tr>";
	echo "<tr><td>1989 Jan — 1991 Oct</td><td>National Director of the Institute of Students and Faculty on Israel (ISFI), an organization under the auspices of the Israeli Foreign Ministry and the Israeli Consulate in New York City, while living there.</td></tr>";
	echo "<tr><td>1989 — 1990</td><td>He received a study grant from New York University.</td></tr>";
	echo "<tr><td>1988</td><td>Completed his MA in Near Eastern and Islamic Studies at the Hebrew University of Jerusalem, with specialization in the minorities in the Middle East and in particular the Jews and the Assyrian Christians within Kurdish-majority areas.</td></tr>";
	echo "<tr><td>1987 - 1988</td><td>He received a study grant from the State university of New York (SUNY) at Binghamton.</td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</table>";

	echo "<blockquote>The Kurdistan Region is a place where Jews can feel safe. Unlike Iraq and other countries, it does not operate as an enemy state, and Israel should acknowledge this special status.</blockquote>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF4377-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>Rawanduz, near Erbil in the Kurdistan Region of Iraq.</figcaption></figure>";

	echo "<blockquote>The relationship between Israel and the Jews, and the Kurds, should be strengthened and encouraged because these two people have a lot of common. I welcome all Kurds to establish contact with Jews.</blockquote>";

	echo "<table><tbody>";
	echo "<tr><td>1999 Jun</td><td>Married in Jerusalem, in Monunt Scopus, with a wedding attended by Prime Minister (and First Lady) Netanyahu, whom Zaken advised at the time on local Arab Affairs, as well as other leaders. Dr. Zaken and Riki continue to live in Jerusalem and have three children: Tzah, Tahel, and Ohad.</td></tr>";
	echo "<tr><td>1985 - 2002</td><td>He conducted hundreds of first-hand oral history accounts in Israel and abroad with more than 60 elderly Kurdish Jews, originally from Kurdistan, who shared their knowledge on the tribal Kurdish society and setting with him. From this, Dr. Zaken was able to reconstruct and tell the history of the Jews and the tribal Kurdish society.</td></tr>";
	echo "<tr><td>1984 - 1985</td><td>As an MA student at Hebrew University, he wished to write a paper on the economy of Kurdistani Jews. To his astonishment, he discovered that there was hardly any written material on the Kurds and on the Jews of Kurdistan. Because of the lack of written material, he had to resort to oral-history and interviewed 12 elderly Kurdistani Jews for that paper alone.</td></tr>";
	echo "<tr><td>1984</td><td>Completed his BA in Political Science and Near Eastern & Islamic Studies at the Hebrew University of Jerusalem.</td></tr>";
	echo "<tr><td>1983</td><td>Co-Chief Editor of 'Tipul Shoresh', an annual about activism at the Hebrew Universe of the public activists' program at the Hebrew University, the circulation of which was stopped by the directors and university administration, due to its critical approach towards the university policy regarding social issues.</td></tr>";
	echo "<tr><td>1982</td><td>Editor-in-Chief of 'Pi Ha-Aton' (פי-האתון), a student newspaper. On 26 April 1982, for a special Independence Day edition, Dr. Zaken published photos (and the story behind their uncovering) taken in 1948 by Arabs, which showed mutilated faces and bodies of Jewish soldiers who had been in an army unit which later became know as the 'Nabi Daniel Caravan' (שיירת נבי דניאל).</td></tr>";
	echo "<tr><td>1980</td><td>Began his baccalaureate studies at the Hebrew University of Jerusalem.</td></tr>";
	echo "<tr><td>1958</td><td>Moti is born in Jerusalem to his mother Batyah and his father Saleh; his mother was born in Israel, and his father was born in Zakho in the Kurdistan Region.</td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</tbody></table>";

	echo "<blockquote>In the neighborhood where I grew up, we spoke Aramaic and Kurdish together. These people left Kurdistan, but Kurdistan did not leave them.</blockquote>";

	echo "<figure class='amp-img-fader'>";
	echo '<amp-position-observer on="scroll:fadeTransition.seekTo(percent=event.percent)" intersection-ratios="0" layout="nodisplay"></amp-position-observer>';
	echo '<amp-position-observer on="enter:slideTransition.start; exit:slideTransition.start,slideTransition.reverse" intersection-ratios="0.8" layout="nodisplay"></amp-position-observer>';
	echo "<amp-img src='_DSF2224-compressed.jpg' width='1.6' height='1' layout='responsive'></amp-img>";
	echo "<figcaption>The Arab neighborhood of the Old City in Jerusalem.</figcaption></figure>";

//	echo "<h2>References</h2>";
// 	echo "<blockquote>I am grateful to scholars such as... Who have accomplished... .</blockquote>";
// 	echo "<p>His most favored and inspiring teachers have been Professor Moshe Sharon (under whom he studied Islamic civilization and culture as well as Arabic and Farsi); Professor B. Z. Kedar (general History and comparative history); Professor Gideon Goldenberg (Neo-Aramaic of the Jews and Assyrians of the Kurdish regions); Professor Michael Zand (Farsi); and the late Prof. Amnon Netzer (Farsi and Persian Jewish History).</p>";

	echo "<h2>Media summary</h2>";

	echo "<table><tbody>";
	echo "<tr><td>2019 Mar</td><td><a href='https://www.hudson.org/research/14847-lending-a-helping-hand-to-strangers-and-sojourners'>Hudson Institute</a></td></tr>";	
	echo "<tr><td>2018 Nov</td><td><a href='https://www.tabletmag.com/sections/israel-middle-east/articles/kurdistan-and-israel'>Interview with Tablet Mag about the Kurdistan Region</a></td></tr>";	
	echo "<tr><td>2017 Oct</td><td><a href='https://www.thejewishstar.com/stories/kurd-foes-use-israeli-stance-to-rally-allies,14560'>The Jewish Star</a></td></tr>";
	echo "<tr><td>2017 Apr</td><td><a href='https://www.youtube.com/watch?v=i8yI-SLzSKg'>Interview on CBN about Israel-Christian relations</a></td></tr>";	
	echo "<tr><td>2017 Jan</td><td><a href='https://nypost.com/2017/01/27/israelis-eager-to-welcome-us-embassy-to-jerusalem/'>NY Post</a></td></tr>";	
	echo "<tr><td>2015 Dec</td><td><a href='https://www.jpost.com/middle-east/use-of-jewish-issue-by-krg-official-may-cause-confusion-and-damage-436499'>Interview on impostors in the Kurdistan Region</a></td></tr>";	
	echo "<tr><td>2015 Nov</td><td><a href='https://www.jpost.com/middle-east/so-are-there-jews-in-kurdistan-432756'>Interview on impostors in the Kurdistan Region</a></td></tr>";	
	echo "<tr><td>2015 Aug</td><td><a href='https://www.sbs.com.au/language/english/audio/how-did-the-kurdish-jews-migrate-to-israel'>Interview with SBS</a></td></tr>";	
	echo "<tr><td>2006 May 11</td><td>Meeting with Hamas: <a href='http://cbgonzo.blogspot.co.il/2006/05/10-more-questions.html'>Yahoo news</a></td></tr>";	
	echo "<tr><td>1999 Apr 21</td><td>Likud Denies It Is Exploiting Conflict: <a href='http://articles.latimes.com/1999/apr/21/news/mn-29526/2'>LA Times</a></td></tr>";	
	echo "<tr><td>1999 Apr 20</td><td>Compromise on Nazareth: <a href='http://www.nytimes.com/1999/04/20/world/israel-sets-forth-compromise-plan-on-nazareth-mosque-dispute.html'>NY Times</a></td></tr>";	
	echo "<tr><td>1999 Apr 07</td><td>Protesting demolition of homes: <a href='http://articles.latimes.com/1998/apr/07/news/mn-36961'>LA Times</a></td></tr>";	
	echo "<tr><td>1999 Apr 06</td><td>Demolition of homes: <a href='http://www.apnewsarchive.com/1998/Israeli-Arabs-Protest-Demolition/id-debabd28296ea20a9d9a26c5de57ad57'>AP</a></td></tr>";	
	echo "<tr><td>1998 Apr 28</td><td>Unrecognized villages: <a href='http://edition.cnn.com/WORLD/meast/9804/28/israel.forty.villages/index.old.html'>CNN</a></td></tr>";	
	echo "<tr><td></td><td></td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "<tr><td></td><td></td></tr>";
	echo "</tbody></table>";

//	http://israeli-kurdish-friendship-league.blogspot.com/

	endif;

if ([$pageview_request, $language_request] == ["bookstore", "en"]):

	echo "<h1>Bookstore</h1>";

	echo "<blockquote>The book of Dr. Mordechai Zaken is the most important book written on the Jews of Kurdistan. <i>(Lora Galichco, scholar and descendant of Kurdish Jews)</i></blockquote>";

	echo "<p><i>The Jews of Kurdistan</i> tells the stories of Jewish subjects that had lived and survived under the patronage of their tribal chieftains (or “aghas,” i.e., masters) during the 19th and 20th centuries, in towns as well as in distant villages.</p>";

	echo "<p><b>Buy <i>The Jews of Kurdistan: A Study in Survival</i> for $15 at <a href='https://kurdishjews.com/'>kurdishjews.com</a>.</b></p>";

	echo "<blockquote>This is an original, comprehensive study on the Jewish community in Kurdistan in the last stages of its existence, during the first half of the 20th century. The scope of this study is far wider than its name. <i>(Moshe Sharon, Hebrew University)</i></blockquote>";

	endif;

if ([$pageview_request, $language_request] == ["kurdistan-region", "en"]):

	echo "<h1>The Kurdistan Region</h1>";

//	echo "<blockquote>The Kurds are proud people, and smart people. They are smart enough to draw their own conclusion from the political and historical situation.</blockquote>";

	echo "<p>Dr. Zaken's role with the National Association </p>";

	echo "<h2>Shrine of Nahum</h2>";

	echo "<p>Credit to ARCH and the KRG. Dr. Zaken is a member in the Board, the joint statement, the rehabilitation of the tomb, etc.</p>";

	echo "<h2>Historical information</h2>";

	echo "<blockquote>In 1950 and 1951, the entire Kurdish Jewish community immigrated to Israel. Over the years, Israeli Kurds followed the struggle of their Muslim brothers with great interest.</blockquote>";

	echo "<p>There are at present in Israel...</p>";

	echo "<blockquote>The late Kurdish leader Mula Mustafa Barzani secretly visited Israel twice to meet with Israeli authorities. He also saw his Kurdish Jewish friend, David Gabai. In the 1930s, Gabai's father, Eliyahu, the leader of the Iraqi Jewish community of Aqara, Iraq, supplied food and aid to the Kurds who were revolting against the British. Some say that this special connection between the two families held increase Barzani's confidence in Israel.</blockquote>";

	echo "<p>During the referendum on independence...</p>";

//	echo "<blockquote>I became invovled in Kurdistan in a very pecular way. I was a student at the Hebrwe University of Jerusalem when I wanted to write a paper about the economy of Kurdistan. My professor said <i>fine</i> but then I realized there were hardly any documents in Hebrew, in Arabic, nor other other languages. So I had to interview people for this apper. For this paper on ethe economy of Zakho, whre my father is from, I itnerviewe 12 people. This fantastic mechanism, this experience fo interviewing old Kurdish Jews really fascinated me and drew me into the subject. These Krudish people, these Jewish Kurds who lived in Israel, but they lived for fifty eyars,for sitxy years in Kurdistan, ahd grown up in an oral culture. They spoke four, five, six languages; tey knew the map by ehart because they traveld by donkey or mule; and they knew all the villages, all the aghas, all the histories of Kurdsitan becaue they lived it. </blockquote>";

	echo "<blockquote>Israel has a moral obligation to help the Kurds. The Iraqi genocide against the Kurds is a signal that sympathy is not enough for survival in the Middle East.</blockquote>";

	echo "<p>Attitudes toward...</p>";

//	echo "<blockquote>The Kurdish people often forgot their history because they were busy with their struggle, with being oppressed. They had so many economic, social, military problems — and the Assyrians also, were dispersed. So the only people who kept the memory of Kurdistan were Kurdish Jews from Kurdistan who immigrated to Israel and continued wearing Kurdish clothes, eating Kurdish food, and listening to Kurdish music every day of their lives. They kept the traditions of Kurdistan alive.</blockquote>";

	echo "<blockquote>The Kurds are entitled to an independent Kurdish national home just like the Jews, and they will sooner or later be granted this statehood.</blockquote>";

//	echo "<blockquote>Some aghas were not so nice, exploited the Jews, and took advantage of the Jews economically, physicially, and other ways. However, I want to emphasize the good values, the good memories the Jews had from Kurdistan. And I want to share this with people.</blockquote>";
		
	echo "<p></p>";
	
	endif;
	
if ([$pageview_request, $language_request] == ["israel", "en"]):

	echo "<h1>Israel, Zionism, and Minorities Affairs</h1>";

	echo "<blockquote>Israel is a safe haven in this region, in the Middle East, and in the cradle of mankind.</blockquote>";
	
	echo "<p>Dr. Zaken served as National Director of the Institute of Students and Faculty on Israel (ISF), and has also served both the Ministry of Public Security and the Prime Minister of Israel. ISFI provided political and cultural resources, ideas and tools, for Jewish and pro-Israel student activists throughout the US and Canada, through which Israeli-oriented activities and the message of Israel could be promoted in US campuses. At the core of Dr. Zaken's work on Arab, Bedouin, Christian, and other minority affairs is attention to improving life for all Israelis, a committment to Israeli democracy, and a dedication to eradicating hate crimes and extremism.</p>";
	
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
		echo "<i>". $translatable_elements["this-website-has-been-developed"][$language_request] ."</i><br>";
		echo "&nbsp;&nbsp; <a href='https://ours.foundation'>ours.foundation</a><br>";
		echo "&nbsp;&nbsp; <a href='mailto:info@ours.foundation'>info@ours.foundation</a><br>";
		echo "&nbsp;&nbsp; <a href='https://wa.me/12072165608'>+1 (207) 216-5608</a> (WhatsApp)";
		echo "</div>";

	echo "<div class='contact-footer-secondary'>";
		echo $translatable_elements["last-updated"][$language_request];
		echo "</div>";

	echo "</div>";

?>
