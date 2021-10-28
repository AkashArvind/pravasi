<?php
session_start();
$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];
include_once("connection/conection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('includes/head.php'); ?>
  <style type="text/css">
  	@font-face {
		  font-family: 'dyuthi';
		  src: url('css/Dyuthi-Regular.ttf');
		}
  	.ml-dyuthi
	{
	   font-family: 'dyuthi' !important;
	}


  	/*timeline*/
  	.timelineSection
  	{
  		/*background-color: #bb7f60;*/
  		margin-top: 30px;
  		padding-top: 30px;
  		padding-bottom: 30px;
  		padding-left: 10px;
  		padding-right: 10px;
  	}
  	.circle {
	  padding: 13px 20px;
	  border-radius: 50%;
	  background-color: #ED8D8D;
	  color: #fff;
	  max-height: 50px;
	  z-index: 2;
	}

	.how-it-works.row .col-2 {
	  align-self: stretch;
	}
	.how-it-works.row .col-2::after {
	  content: "";
	  position: absolute;
	  border-left: 3px solid #ED8D8D;
	  z-index: 1;
	}
	.how-it-works.row .col-2.bottom::after {
	  height: 50%;
	  left: 50%;
	  top: 50%;
	}
	.how-it-works.row .col-2.full::after {
	  height: 100%;
	  left: calc(50% - 3px);
	}
	.how-it-works.row .col-2.top::after {
	  height: 50%;
	  left: 50%;
	  top: 0;
	}
	.timeline div {
	  padding: 0;
	  height: 40px;
	}
	.timeline hr {
	  border-top: 3px solid #ED8D8D;
	  margin: 0;
	  top: 17px;
	  position: relative;
	}
	.timeline .col-2 {
	  display: flex;
	  overflow: hidden;
	}
	.timeline .corner {
	  border: 3px solid #ED8D8D;
	  width: 100%;
	  position: relative;
	  border-radius: 15px;
	}
	.timeline .top-right {
	  left: 50%;
	  top: -50%;
	}
	.timeline .left-bottom {
	  left: -50%;
	  top: calc(50% - 3px);
	}
	.timeline .top-left {
	  left: -50%;
	  top: -50%;
	}
	.timeline .right-bottom {
	  left: 50%;
	  top: calc(50% - 3px);
	}
	/*card style*/
	
	/* FontAwesome for working BootSnippet :> */

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#team {
    background: #ffffff !important;
    border-top: 5px double #c0282c;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #c0282c;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    background: #ffffff;
}

.image-flip:hover .backside,
.image-flip.hover .backside {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
}

.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
	transform: none;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
	transform: none;
    z-index: 2;
    margin-bottom: 30px;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    color: #c0282c !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #c0282c !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}
.justifyText 
{
  word-break: break-all;
  text-align: justify;
}
.textDiv
{
	height: 300px;
	overflow: auto;
}
.textDiv::-webkit-scrollbar 
{
 width: 0 !important;
}
.dsib
{
	border:8px ridge #b2714d;
}
.imgCenter
{
	display: block;
	margin-left: auto;
	margin-right: auto;
}
.headQbg
{
	background-image: url("img/fire.jpg");
	background-repeat: no-repeat;
  	background-size: cover;
}
.engContent
{
	font-size: 14px;
	text-align: justify;
	margin: 5px;
}	
  </style>
  <style type="text/css">
    .bg-image-full
    {
      background-image: url('img/bg1.jpg');
    }
  </style>

	<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet"> 

</head>
<body>
    <?php include('includes/header.php'); ?>
	<?php include('includes/slider.php'); ?>
  <main id="main">
  	<div class="profile">
	    <div class="container">
	    	<div class="row head">
	    		<div class="col-md-12">
	    			<?php
					if($ln=='en')
					{
						?>
						<h1 class="wow fadeInUp" data-wow-delay="0.2s">Kshethrakala akademi</h1>
	    				<p class="wow fadeInUp" data-wow-delay="0.4s">Malabar devaswom board</p>
						<?php
					}
					else
					{
						?>
						<h1 class="wow fadeInUp ml-dyuthi" data-wow-delay="0.2s">ക്ഷേത്രകല അക്കാദമി</h1>
	    				<p class="wow fadeInUp ml-dyuthi" data-wow-delay="0.4s">കേരള സർക്കാർ ദേവസ്വം വകുപ്പിന്റെ കീഴിൽ, മലബാർ ദേവസ്വം ബോർഡിന്റെ നിയന്ത്രണത്തിനു വിധേയമായി പ്രവർത്തിക്കുന്ന ഒരു കലാ സാംസ്‌കാരിക വിദ്യാഭ്യാസ സ്ഥാപനമാണ് ക്ഷേത്ര കല അക്കാദമി.</p>
						<?php
					}
					?>
	    		</div>
	    	</div>
	    	<div class="row content">
	    		<div class="col-md-3">
	    			<img src="img/shilpam1.png" class="img-fluid wow fadeInUp" data-wow-delay="0.2s">
	    		</div>
	    		<div class="col-md-9 content-text wow fadeInUp" data-wow-delay="0.2s">
	    			<?php
					if($ln=='en')
					{
						?>
							<p><b>Kshetrakala Akademi</b> was formed as a cultural and educational institution formed under the the leadership of <b>Malabar Devaswom Board of Kerala Devaswom</b>. The primary objective of <b>Kshetrakala Akademi</b> is to encourage. the temple art forms, propagate and popularize them and to renovate the temple art forms which are in a vanishing stage from the cultural scenario.  The method for these activities were planned to be in an effective method by providing training and development of temple arts, collecting, organizing and protecting valuable cultural treasures of temples arts, give opportunity for the artistes and public to perform and appreciate the different variety of temple art forms, giving aid to the suffering artistes, recognizing the skilled artistes, conducting cultural events for the young generation to introduce these art forms and so on.  </p>
							<p><b>Kshetrakala Akademi</b> was formed officially in <b>2013</b> but the full functionalities were channelized in <b>2016</b>.</p>
							<p>Structure of organization of the <b>Kshethakala Akademi</b> includes a Chairman, the present Chairman is <b>Dr. K.H. Subramanian</b>, a Secretary, present secretary is <b>Sree Krishnan Naduvalath</b> and a governing body including six members for the entire functioning of Kshetrakala Akademi.  Now this establishment has become a active presence in the socio cultural environment of Malabar. </p> 
						<?php
					}
					else
					{
						?>
						<p class="mlText justifyText" style="font-size: 16px">
						ക്ഷേത്രകലകളുടെ പ്രോത്സാഹനം, പ്രചാരണം, ജനകീയ വൽക്കരണം എന്ന ലക്ഷ്യ സാക്ഷാത്ക്കാരത്തിനായി സമഗ്രമായ പ്രവർത്തനം കൊണ്ട് സജീവമാക്കലാണ് പ്രഥമ ഉദ്ദേശ്യം. നഷ്ടപ്രായമായിക്കൊണ്ടിരിക്കുന്ന ക്ഷേത്ര കലകളിൽ പരിശീലനം നൽകുക, വിദ്യാഭ്യാസ കലാ സാംസ്കാരിക സ്ഥാപനങ്ങളിൽ സോദാഹരണ ക്‌ളാസ്സുകൾ സംഘടിപ്പിക്കുക , ക്ഷേത്ര കലാകാരന്മാർക്കു പുരസ്‌ക്കാരങ്ങൾ നൽകുക, അവശ കലാകാരന്മാരെ സഹായിക്കുക എന്ന് തുടങ്ങി കേരള കലാമണ്ഡലം പോലെ ഒരു കല്പിത സർവകലാശാലയാക്കി ക്ഷേത്രകലാ അക്കാദമിയെ മാറ്റിത്തീർക്കുകയാണ് അക്കാദമിയുടെ പ്രഖ്യാപിത ലക്‌ഷ്യം. അതിനുള്ള പ്രാഥമിക നടപടികൾ അക്കാദമി കൈക്കൊണ്ടു വരികയാണ്.</p>
						<p class="mlText justifyText" style="font-size: 16px">ഡോക്ടർ എ. കെ. നമ്പ്യാർ ടി. വി. രാജേഷ് എം.എൽ.എ എന്നിവരുടെ നേതൃത്വത്തിൽ 2013 ൽ പ്രാഥമിക ആലോചനകൾ നടന്നുവെങ്കിലും ക്ഷേത്രകലാ അക്കാദമിയുടെ ആദ്യ ഭരണ സമിതി സർക്കാർ ഉത്തരവ് സ:ഉ (സാധാ) നമ്പർ 1197/2014 ആർ.ഡി  പ്രകാരം നിലവിൽ വന്ന്  അധികാരം ഏറ്റെടുത്തത് 05-3-2014 ന് ആയിരുന്നു. ഡോ. കോറമംഗലം നാരായണൻ നമ്പൂതിരി ചെയർമാനും, പി സി രാമകൃഷ്ണൻ സെക്രട്ടറിയുമായ പ്രസ്തുത ഭരണ സമിതിക്കു കാര്യമായ പ്രവർത്തനങ്ങൾ നടത്താന്‍ സാധ്യമായില്ല. എന്നാല്‍ റവന്യൂ (ദേവസ്വം) വകുപ്പ് സ. ഉ (സാധാ) നമ്പർ 5362/2016/  റവ തിരുനന്തപുരം, തീയതി 14-12-2016 ഉത്തരവ് പ്രകാരം 06-01-2017 ന് ഡോ.കെ.എച്ച്. സുബ്രഹ്മണ്യന്‍  ചെയര്‍മാനും ഡോ. വൈ.വി കണ്ണന്‍ സെക്രട്ടറിയുമായി അധികാരമേറ്റ ഭരണസമിതിയാണ് തുടര്‍ന്ന് സജീവമായി പ്രവര്‍ത്തിച്ചത്.</p>
						<p class="mlText justifyText" style="font-size: 16px">
							ആരോഗ്യപരമായ  കാരണങ്ങളാൽ  ഡോ  വൈ.വി.  കണ്ണൻ  രാജിവച്ചതിന്റെ  ഫലമായി റവന്യു (ദേവസ്വം) സ.ഉ (സാധാ) നമ്പർ 1743/2018  റവ  തിരുവനന്തുപുരം , 18-05-2018 പ്രകാരം ഭരണസമിതി  അംഗമായ  കൃഷ്ണൻ നടുവലത്തിനെ  സെക്രട്ടറിയായി നിയമിച്ച്  ഉത്തരവ്  പുറപ്പെടുവിച്ചു.
						</p>
						
						
						<?php
					}
					?>

	    		</div>
	    	</div>
	    </div>
	</div>

	<section style="background-color: #5e3b28;padding: 35px 0px; 20px 0px;" class="headQbg">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					
					<?php
					if($ln=='en')
					{
						?>
						<p style="color: #d2d2d2;margin: 0px;font-family: 'Anton', sans-serif;font-size: 30px;text-shadow: 2px 2px 6px rgba(1,1,1,0.90);">Administrative Council</p>

						<?php
					}
					else
					{
						?>
						<p style="color: #d2d2d2;margin: 0px;font-size: 33px;text-shadow: 2px 2px 6px rgba(1,1,1,0.90);" class="ml-dyuthi">ഭരണ സമിതിയംഗങ്ങൾ </p>
						<?php
					}
					?>

				</div>
				<div class="col-md-4">

				</div>
			</div>
		</div>		
	</section>

	<section style="padding: 10px 0px; 20px 0px">
		<div class="container">
			<div class="row">
				<div class="col-md-2 text-center" >
				</div>
				<div class="col-md-4 text-center" style="margin-bottom: 20px">
					
					<?php
					if($ln=='en')
					{
						?>
						
						<div style="background-color: #b2714d;" class="wow fadeInUp" data-wow-delay="0.2s">
							<img src="img/directorBoard2019/Krishnan_Naduvilath.jpg" class="img-fluid" style="border: 5px solid white;margin-top: 20px;width: 40%">
							<h2 style="color: white;font-size: 22px;margin-top: 15px;margin-bottom: 5px">Secretary </h2>
							<h3 style="color: white;font-size: 15px;margin: 0px">Sree Krishnan Naduvilath </h3>
						</div>
						<div style="border:5px #b2714d ridge" class="textDiv">
							<p style="margin-top: 40px;margin: 0px;padding: 20px 30px 10px 30px;font-size: 14px;font-weight: 100;line-height: 30px" class="text-left">
								Native of <b>Cheruthazham</b> in <b>Kannur</b> district. Father Late <b>Govindhan Nair</b>.  Mother Late <b>Naduvilath Parvathi amma</b>. Graduated in Malayalam literature from University of Calicut. He was written poem compilations named <b>Harithapurathe Ekaki, Oronningane, Ettavum priyankaranaya shathruvinod ithramathram, Attuveezhunnund uchaveyilil viralukal, Kakka perukkunna kutty, Karuthal, Rathrivarum mumb</b> and novels named <b>Pulimada, Arathiparamb</b>. Honored with <b>Vidyarangam Award of Department of Education Govt. of Kerala. Adyapaka kala sahithya samithi Award, thulunad novel Award</b> etc. Writer of stage shows named <b>Madhavam, Bhagathsing</b>. More than three hundred songs, drama named <b>Uchasooryante sheersham, Peedith sathayude pin nottangal</b> etc. Now working as secretary of kshethrakala academy.
							</p>
							<p style="margin-top: 40px;margin: 0px;padding: 0px 30px 30px 30px;font-size: 14px;font-weight: 100;line-height: 30px" class="text-left">
								Spouse dhanalakshmi. Children Nivedh Krishnan, Amrth Krishnan 
							</p>
						</div>


						<?php
					}
					else
					{
						?>
						
						<div style="background-color: #b2714d;" class="wow fadeInUp" data-wow-delay="0.2s">
							<img src="img/directorBoard2019/Krishnan_Naduvilath.jpg" class="img-fluid" style="border: 5px solid white;margin-top: 20px;width: 40%">
							<h2 class="mlText" style="color: white;font-size: 22px;margin-top: 15px;margin-bottom: 5px">സെക്രട്ടറി </h2>
							<h3 class="mlText" style="color: white;font-size: 15px;margin: 0px">ശ്രീ  കൃഷ്ണൻ നടുവലത്ത് </h3>
						</div>
						<div style="border:5px #b2714d ridge" class="textDiv">
							<p style="color: black;margin-top: 40px;margin: 0px;padding: 20px 30px 30px 30px" class="mlText justifyText">കണ്ണൂര്‍ ജില്ലയിലെ ചെറുതാഴം സ്വദേശി. അച്ഛന്‍ പരേതനായ ഗോവിന്ദന്‍ നായര്‍. അമ്മ പരേതയായ നടുവലത്ത് പാര്‍വതി അമ്മ. കോഴിക്കോട് സര്‍വ്വകലാശാലയില്‍ നിന്ന് മലയാള സാഹിത്യത്തില്‍ ബിരുദാനന്തര ബിരുദം നേടി. <b>ഹരിതപുരത്തെ ഏകാകി, ഓരോന്നിങ്ങനെ, ഏറ്റവും പ്രീയങ്കരനായ ശത്രുവിനോട് ഇത്രമാത്രം, അറ്റുവീഴുന്നുണ്ട് ഉച്ചവെയിലില്‍ വിരലുകള്‍, കക്കപെറക്കുന്ന കുട്ടി, കരുതല്‍, രാത്രിവരുംമുമ്പ്,
							വെയിൽ  അൽപ്പം  പുഞ്ചിരിക്കവേ
							എന്നീ കവിതാ സമാഹാരങ്ങളും, പുലിമട, അറത്തിപ്പറമ്പ് </b>എന്നീ നോവലുകളും രചിച്ചു. സംസ്ഥാന വിദ്യാഭ്യാസ വകുപ്പിന്‍റെ <b>വിദ്യാരംഗം അവാര്‍ഡ്, അധ്യാപക കലാ സാഹിത്യസമിതി അവാര്‍ഡ്, തുളുനാട് നോവല്‍ അവാര്‍ഡ് തുടങ്ങിയവ ലഭിച്ചിട്ടുണ്ട്. കനല്‍വരമ്പുകള്‍, മാധവം, ഭഗത് സീംഗ്,</b> തുടങ്ങിയ സംഗീതശില്പങ്ങള്‍, മുന്നൂറോളം ഗാനങ്ങള്‍, <b>ഉച്ചസൂര്യന്‍റെ ശീര്‍ഷം എന്ന നാടകം, ശ്യാമ മാധവ പഠനമായ പീഡിത സത്തയുടെ പിന്‍ നോട്ടങ്ങള്‍ </b>തുടങ്ങിയവയുടെയും രചയിതാവാണ്. ഇപ്പോള്‍ ക്ഷേത്രകലാ അക്കാദമി സെക്രട്ടറിയായി പ്രവര്‍ത്തിക്കുന്നു. ഭാര്യ ധനലക്ഷ്മി. പി.വി. മക്കള്‍ നിവേദ്കൃഷ്ണന്‍, അമൃത് കൃഷ്ണന്‍</p>
							<p style="color: black;margin-top: 0px;margin: 0px;padding: 10px 30px 30px 30px" class="mlText">
								ഇമെയിൽ naduvalathkrishnan@gmail.com
								9847510589<br>
								നിറവ്<br>
								ചെറുതാഴം  സെന്റർ<br>
								പോസ്റ്റ്  മണ്ടൂർ
								670501 
							</p>
						</div>
						<?php
					}
					?>
					
				</div>


				<div class="col-md-4 text-center" >
					<?php
					if($ln=='en')
					{
						?>
						<div style="background-color: #b2714d;" class="wow fadeInUp" data-wow-delay="0.2s">
							<img src="img/directorBoard2019/khs.jpg" class="img-fluid" style="border: 5px solid white;margin-top: 20px;width: 40%">
							<h2 style="color: white;font-size: 22px;margin-top: 15px;margin-bottom: 5px">Chairman</h2>
							<h3 style="color: white;font-size: 15px;margin: 0px">
							Dr. K H Subrahmanyan</h3>
						</div>
						<div style="border:5px #b2714d ridge" class="textDiv">
							<div class="mlText text-left" style="padding: 20px 30px 30px 30px">
							
								<b>His Fields</b><br>
								<ol>
									<li>Sanskrit literature.</li>
									<li>Criticism and appreciation of literature in deferent languages.</li>
									<li>Administrator.</li>
									<li>Socio-cultural orator </li>
								</ol>
								
								<b>Experiences</b><br>
								<ol>
									<li>Have been the head and professor in the Department of Sanskrit, Payyanur College, Payyanur more than 25 years.</li>
									<li>Was in the position of Registrar of the university of Kannur for the tenure of 4 years.</li>
									<li>More than 3 and half years he had been the Director at Mahathma HandhiUniversity, Chinmaya International Foundation.</li>
									<li>Research Guide in both universities of Kannur and Calicut.</li>
									<li>Prefect in the various departments of Sanskrit including the universities of Kannur, Calicut, and Sree Sankaracharya University of Sanskrit.</li>
									<li>He had been the program officer of NSS and Continuous Education </li>
									<li>Member and coordinator in various university and board examination wings.</li>
									<li>At present, there are 4 research scholars perusing their thesis whereas 12 already PhD awarded students had done their research under him.</li>
								</ol>
								<b>Achievements and Awards</b><br>
								<ol>
									<li>Merit Fellowship of UGC.</li>
									<li>“The Sasthra Choodamani” position assigned by The Ministry of Human Resource Development.</li>
									<li>The Dean of the Sree Sankaracharya University of Sanskrit, Kalady.</li>
									<li>Abudabi Sakthi Puraskar-2005.</li>
									<li>Samskritha Prathibha Puraskar-2012.</li>
									<li>Poonthottam Samskritha Puraskaram 2018.</li>
								</ol>
								<b>Publications</b><br>
								<ol>
									<li>He has contributed more than 50 research writings in both national and international levels apart from other research publications.</li>
									<li>Published 46 books in all the three languages: Malyalam, English and Sanskrit. Those books can be categorized in the following heads; scholastic and research, criticism, children’s literature, translations, debate oriented books etc.</li>
								</ol>
								<b>List of some of his notable works.</b><br>
									<ol>
										<li>Deepasigha ( Sanskrit)</li>
										<li>Kalidhaasanum Bhavabhoothiyum ( translation)</li>
										<li>Mathilukalillatha Manavalokam ( critical writing)</li>
										<li>Paryeshanam (critical writing)</li>
										<li>Kerala Panini and Sanskrit Works.</li>
										<li>Panchathanthra Kadhakal.</li>
										<li>Kuttikalude Swargam.</li>
										<li>Navarasa Kadhakal.</li>
									</ol>
									<b>Address</b><br>
									<p>Harikiranam, Othayammadam, Cherukunnu, Kannur-670301</p>
									<b>Family</b><br>
									<p>Sarala P K (Retired High School Teacher)
									Sons 	:	 1) S Karikishore I A S
									2) Dr. S Sreekiran (Pediatrician)</p>
									<b>Phone number</b><br><p>049852861922 (home), 9447851970 (mob)</p>
							</div>
						</div>
						<?php
					}
					else
					{
						?>
						<div style="background-color: #b2714d;" class="wow fadeInUp" data-wow-delay="0.2s">
							<img src="img/directorBoard2019/khs.jpg" class="img-fluid" style="border: 5px solid white;margin-top: 20px;width: 40%">
							<h2 class="mlText" style="color: white;font-size: 22px;margin-top: 15px;margin-bottom: 5px">ചെയർമാൻ </h2>
							<h3 class="mlText" style="color: white;font-size: 15px;margin: 0px">ഡോ  കെ  എച്ച്  സുബ്രഹ്മണ്യൻ  </h3>
						</div>
						<div style="border:5px #b2714d ridge" class="textDiv">
							<div class="mlText text-left" style="padding: 20px 30px 30px 30px">
							<b>പ്രത്യക രംഗങ്ങൾ:-</b><br>
							<ol>
								<li>സംസ്കൃത സാഹിത്യം.</li>
								<li>സഹിത്യപഠനം  -  നിരൂപണം </li>
								<li>ഭരണ രംഗം.</li>
								<li>സാമൂഹ്യ -സാംസ്കാരിക പ്രഭാഷണ രംഗങ്ങൾ</li>
							</ol>
							<b>അനുഭവപരിചയം :-</b><br>
							<ol>
								<li>25 വർഷം 4 മാസം പയ്യന്നൂർ കോളേജ് സംസ്കൃത വിഭാഗം തലവനും പ്രൊഫസറും.</li>
								<li>നാലുവർഷം  കണ്ണൂർ  സർവ്വകലാശാല രജിസ്ട്രാർ.</li>
								<li>മൂന്നരവർഷം ചിന്മയ  ഇന്റർനാഷണൽ ഫൌണ്ടേഷൻ (മഹാത്മാഗാന്ധി  സർവ്വകലാശാല ) ഡയറക്ടർ.</li>
								<li>കണ്ണൂർ -കോഴിക്കോട്  സർവ്വകലാശാലകളിലെ ഗവേഷണ മാർഗ്ഗനിർദേശകൻ</li>
								<li>സംസ്കൃതപഠനവകുപ്പ് അദ്ധ്യക്ഷൻ / അംഗം  എന്നീ  നിലകളിൽ  കേരള / ശ്രീശങ്കരാചാര്യ/ കോഴിക്കോട് / കണ്ണൂർ സർവ്വകലാശാലകളിൽ </li>
								<li>നാഷണൽ സർവീസ് സ്കീം /  ദേശീയ വയോജന വിദ്യാഭ്യാസ പരിപാടി എന്നിവകളുടെ പ്രോഗ്രാം ഓഫീസർ.</li>
								<li>സർവ്വകലാശാല / സർക്കാർ  പരീക്ഷാ ബോർഡുകളിൽ അദ്ധ്യക്ഷൻ/ അംഗം.</li>
								<li>ഇദ്ദേഹത്തിന്റെ  കീഴിൽ  നിരവധി വിദ്യാർഥികൾക്ക് ഇതിനകം പി .എച് .ഡി  ബിരുദം ലഭിച്ചു. വിദ്യാർത്ഥികൾ ഇപ്പോൾ ഗവേഷണം തുടരുന്നു.</li>
							</ol>
							<b>അംഗീകാരങ്ങൾ / പുരസ്കാരങ്ങൾ  :-</b><br>
							<ol>
								<li>യു .ജി .സി .യുടെ  എമെറിറ്റസ് ഫെല്ലോഷിപ്പ്.</li>
								<li>കേന്ദ്ര മാനവ വിഭവശേഷി മന്ത്രാലയത്തിന്റെ "ശാസ്ത്ര ചൂഡാമണി" പദവി.</li>
								<li>ശ്രീശങ്കരാചാര്യ സംസ്കൃത സർവ്വകലാശാലയിൽ സംസ്കൃതം ഡീൻ.</li>
								<li>അബുദാബി - ശക്തി പുരസ്കാരം 2005.</li>
								<li>സംസ്കൃതപ്രതിഭാ പുരസ്കാരം 2012.</li>
								<li>പൂന്തോട്ടം സംസ്കൃത പുരസ്കാരം 2018.</li>
							</ol>
							<b>പ്രസിദ്ധീകരണങ്ങൾ :-</b><br>
							<ol>
								<li>ദേശീയ/ അന്തർദേശീയ സെമിനാറുകളിലും ഗവേഷണ പ്രസിദ്ധീകരണങ്ങളിലുമായി 50 ലധികം ഗവേഷണ പ്രബന്ധങ്ങൾ.</li>
								<li>സംസ്കൃതം/ ഇംഗ്ലീഷ് /മലയാളം എന്നീ ഭാഷകളിലായി ഇതിനകം 46 പുസ്തകങ്ങൾ പ്രസിദ്ധീകരിക്കപ്പെട്ടിട്ടുണ്ട്.</li>
							</ol>
							<i>പഠന-ഗവേഷണം/ നിരൂപണം /ബാലസാഹിത്യം /സംവാദിത കൃതികൾ/ വിവർത്തനം എന്നിങ്ങനെ ഈ കൃതികളെ തരംതിരിക്കാം</i>
							<br>
							<b>ഏതാനും കൃതികളുടെ പേര് :-</b><br>
							<ol>
								<li>ദീപശിഖ  : സംസ്കൃതം</li>
								<li>കാളിദാസനും ഭവഭൂതിയും - വിവർത്തനം.</li>
								<li>മതിലുകളില്ലാത്ത മാനവലോകം [നിരൂപണ-പഠനം ]</li>
								<li>പര്യേഷണം  [നിരൂപണ-പഠനം ]</li>
								<li>Kerala Panini and Sanskrit Works</li>
								<li>പഞ്ചതന്ത്ര കഥകൾ</li>
								<li>കുട്ടികളുടെ സ്വർഗം</li>
								<li>നവരസ കഥകൾ</li>
							</ol>
							<b>വ്യക്തിഗത വിവരങ്ങൾ :</b><br>
							ജനനം    : 15-05-1950 .<br>
							വിലാസം : "ഹരികിരണം"<br>
							ഒതയമ്മാടം,ചെറുകുന്ന്,കണ്ണൂർ - 670 301<br> 
							ഭാര്യ     : സരള പി.കെ (റിട്ട.ഹൈസ്കൂൾ അദ്ധ്യാപിക)<br>
							മക്കൾ    :<br> 
							(1) എസ്.ഹരികിഷോർ ഐ.എ.എസ്<br> 
							(2) ഡോ: എസ്.ശ്രീകിരൺ (ശിശുരോഗവിദഗ്ദ്ധൻ)<br>
							ദൂരഭാഷ  : 04985-2861922 [വീട്] 
							9447851970<br>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>

	</section>

	<section style="background-color: #5e3b28;padding: 25px 0px; 20px 0px;border-top: 10px solid white">
		
		<div class="container">
			<div class="row">
				
				<?php
				if($ln=='en')
				{
					?>
					
					<div class="col-md-10">
						<p style="color: white;margin-top: 35px" class="justifyText wow fadeInUp" data-wow-delay="0.2s">
							Born as sun of <b>Vadakkan Veetil Chandukkuty</b> and <b>T V Madhavi</b> in small village of Kulappuram of Cheruthazham Panchayath in Kannur district. He was active member of Balasangam and SFI during school days. Elementary education at Cheruthazham Govt High school. Later completed higher education fom Madayi College, Payyannur College and Law College Thrivunananthupuram. During University education at Payyanur college performed as district authority of <b>SFI</b> and Senate member of university of Calicut. Later designated as district secretary of <b>DYFI</b>. Currently is a member of state committee of <b>CPIM</b>. Lead many struggles on protection of rights in Kerala. Has been <b>MLA</b> of Kerala assembly representing Kallyasheri legislative for the last two terms Spouse Sheena TP Daughter Diya Rajesh Son Adal Rajesh 
						</p>
					</div>
					<div class="col-md-2 text-center imgCenters">
						<img src="img/directorBoard2019/tvr.jpg" class="img-fluid wow fadeInUp" data-wow-delay="0.2s" style="border: 5px solid white;margin-top: 15px;width:70%">
						<h2 class="" style="color: white;font-size: 20px;margin-top: 15px;margin-bottom: 5px">T V Rajesh MLA </h2>
					</div>


					<?php
				}
				else
				{
					?>
					
					<div class="col-md-10">
						<p style="color: white;margin-top: 35px" class="mlText justifyText wow fadeInUp" data-wow-delay="0.2s">
						കണ്ണൂർ ജില്ലയിലെ  ചെറുതാഴം പഞ്ചായത്തിൽ കുളപ്പുറം ഗ്രാമത്തിൽ വടക്കൻ വീട്ടിൽ  ചന്തുക്കുട്ടിയുടെയും ടി  വി  മാധവിയുടെയും  മകനായി  ജനിച്ചു. ചെറുതാഴം  ഗവൺമെണ്ട് ഹൈസ്കൂളിലെ  പ്രാഥമിക വിദ്യാഭ്യാസത്തോടൊപ്പം ബാലസംഘം, SFI പ്രവർത്തകനായി. തുടർന്ന് മാടായി കോളേജ്, പയ്യന്നൂർ കോളേജ്,  തിരുവനന്തപുരം  ലോ  കോളേജ് തുടങ്ങിയ സ്ഥാപനങ്ങളിൽ നിന്നും ഉന്നത വിദ്യാഭ്യാസം  പൂർത്തിയായി, പയ്യന്നൂർ കോളേജിൽ  പഠിക്കുന്ന  കാലഘട്ടത്തിൽ  SFIയുടെ ജില്ലാ ഭാരവാഹിയും  കാലിക്കറ്റ്  യൂണിവേഴ്സിറ്റി  സെനറ്റ്  മെമ്പർ ആയും പ്രവർത്തിച്ചു.  പിന്നീട്  SFI  ജില്ലാ സെക്രട്ടറി, സംസ്ഥാന സെക്രട്ടറി,  DYFI സംസ്ഥാന  സെക്രട്ടറി  എന്നി  സ്ഥാനങ്ങൾ വഹിച്ചു. നിലവിൽ സിപിഎം  സംസ്ഥാന  കമ്മിറ്റിഅംഗവുമാണ്.  കേരളത്തിൽ  നടന്ന  പല അവകാശ  സമരങ്ങൾക്കും നേതൃത്വം  നൽകി. കഴിഞ്ഞ രണ്ടു  തവണ ആയി കേരള നിയമസഭയിൽ കല്യാശേരി  മണ്ഡലത്തെ  പ്രതിനിധീകരിച്ച്‌  MLA ആണ്. ഭാര്യ  ഷീന ടി  പി . മകൾ  ദിയ രാജേഷ്  മകൻ ആദൽ  രാജേഷ്.
						</p>
					</div>
					<div class="col-md-2 text-center imgCenters">
						<img src="img/directorBoard2019/tvr.jpg" class="img-fluid wow fadeInUp" data-wow-delay="0.2s" style="border: 5px solid white;margin-top: 15px;width:70%">
						<h2 class="mlText" style="color: white;font-size: 20px;margin-top: 15px;margin-bottom: 5px">ശ്രീ  ടി.വി. രാജേഷ് MLA </h2>
					</div>


					<?php
				}
				?>

			</div>
		</div>

	</section>


	<section>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
				</div>
				<?php
				if($ln=='en')
				{
					?>
					<div class="col-sm-2 text-center">
					<img src="img/directorBoard2019/ppd.jpg" class="img-fluid dsib wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 10px">
					<h2 class="wow fadeInUp" data-wow-delay="0.2s" style="font-size: 20px;margin-top: 15px;margin-bottom: 5px;color: black;">P P<br> Damodharan</h2>

					<button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#pp">View Profile</button>

					</div>
					<div class="col-sm-2 text-center">
					<img src="img/directorBoard2019/gk.jpg" class="img-fluid dsib wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 10px">
					<h2 class="wow fadeInUp" data-wow-delay="0.2s" style="font-size: 20px;margin-top: 15px;margin-bottom: 5px;color: black">Govindhan<br> Kannapuram </h2>

					<button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#gk">View Profile</button>

					</div>
					<div class="col-sm-2 text-center">
					<img src="img/directorBoard2019/cc.jpg" class="img-fluid dsib wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 10px">
					<h2 class="wow fadeInUp" data-wow-delay="0.2s" style="font-size: 20px;margin-top: 15px;margin-bottom: 5px;color: black">Cheruthazham<br> Chandran</h2>

					<button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#cc">View Profile</button>

					</div>
					<div class="col-sm-2 text-center">
					<img src="img/directorBoard2019/rvr.jpg" class="img-fluid dsib wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 10px">
					<h2 class="wow fadeInUp" data-wow-delay="0.2s" style="font-size: 20px;margin-top: 15px;margin-bottom: 5px;color: black">C K Ravindra<br> Varma Raja</h2>

					<button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#rvr">View Profile</button>

					</div>
					<?php
				}
				else
				{
					?>
					<div class="col-sm-2 text-center">
					<img src="img/directorBoard2019/ppd.jpg" class="img-fluid dsib wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 10px">
					<h2 class="mlText wow fadeInUp" data-wow-delay="0.2s" style="font-size: 20px;margin-top: 15px;margin-bottom: 5px;color: black;">പി പി<br> ദാമോദരൻ </h2>
					
					<button type="button" class="btn btn-primary btn-sm ml-dyuthi"  data-toggle="modal" data-target="#pp">വിവരങ്ങൾ കാണുക</button>

					</button>

					</div>
					<div class="col-sm-2 text-center">
						<img src="img/directorBoard2019/gk.jpg" class="img-fluid dsib wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 10px">
						<h2 class="mlText wow fadeInUp" data-wow-delay="0.2s" style="font-size: 20px;margin-top: 15px;margin-bottom: 5px;color: black">ഗോവിന്ദൻ<br> കണ്ണപുരം </h2>

					<button type="button" class="btn btn-primary btn-sm ml-dyuthi"  data-toggle="modal" data-target="#gk">വിവരങ്ങൾ കാണുക</button>	

					</div>
					<div class="col-sm-2 text-center">
					<img src="img/directorBoard2019/cc.jpg" class="img-fluid dsib wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 10px">
					<h2 class="mlText wow fadeInUp" data-wow-delay="0.2s" style="font-size: 20px;margin-top: 15px;margin-bottom: 5px;color: black">ചെറുതാഴം<br> ചന്ദ്രൻ </h2>

					<button type="button" class="btn btn-primary btn-sm ml-dyuthi"  data-toggle="modal" data-target="#cc">വിവരങ്ങൾ കാണുക</button>

					</div>
					<div class="col-sm-2 text-center">
					<img src="img/directorBoard2019/rvr.jpg" class="img-fluid dsib wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 10px">
					<h2 class="mlText wow fadeInUp" data-wow-delay="0.2s" style="font-size: 20px;margin-top: 15px;margin-bottom: 5px;color: black">സി കെ<br>  രവീന്ദ്രവർമ  രാജ </h2>
					
					<button type="button" class="btn btn-primary btn-sm ml-dyuthi"  data-toggle="modal" data-target="#rvr">വിവരങ്ങൾ കാണുക</button>

					</div>
					<?php
				}
				?>
				<div class="col-sm-2">
				</div>
			</div>	
		</div>


		<div class="modal fade bd-example-modal-lg" tabindex="-1" id="pp" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-body">
		      	<h5 class="modal-title" id="exampleModalScrollableTitle" style="marg">
		        	
		        	<?php
					if($ln=='en')
					{
						?>
						<span>P P DAMODARAN</span>
						<?php
					}
					else
					{
						?>
						<span class="ml-dyuthi">പി പി ദാമോദരൻ</span>
						<?php
					}
					?>
					<span style="float: right;">
						<a type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </a>
					</span>
		        </h5>
		        <div class="bgRepeatedNOBorder"></div>
		        <div class="row">
		        	<div class="col-md-3">
		        		<img src="img/directorBoard2019/ppd.jpg" class="img-fluid" style="margin-top: 12px">
		        	</div>
		        	<div class="col-md-9">
		        		<?php
						if($ln=='en')
						{
							?>
							<p style="margin-bottom: 10px;margin-top: 30px" class="engContent">
		        				P P DAMODARAN is a very famous artist in different fields like poorakkali, marathu kali and even drama. He is a well flourished personality found not only in art, but in the field of other socio-cultural scenarios too. He has been working as president of many local organizations apart from the position of President to the Madayi Co-op Rural Bank. Now he is the president of Kadannappalli-Panapppuzha village. He hails from Kadannappalli, Thumbotta.
		        				<br><br>
		        				<b>Address</b>: Thumbotta Kadannappally Medical college Post 670503<br>  9446677886 
							</p>
							<?php
						}
						else
						{
							?>
							<p style="margin-bottom: 10px;margin-top: 30px" class="mlText justifyText">
		        				നാടകം,പൂരക്കളി, മറത്തുകളി എന്നി രംഗങ്ങളിൽ അറിയപ്പെടുന്ന കലാകാരൻ. കലാ-സാംസ്കാരിക സാമൂഹ്യമേഖലകളിൽ സജീവ സാനിധ്യം . മാടായി കോ -ഓപ്പറേറ്റിവ് റൂറൽ ബാങ്ക് പ്രസിഡണ്ട്, നിരവധി സാംസ്കാരിക സ്ഥാപങ്ങളുടെ  രക്ഷാധികാരി എന്നി നിലകളിൽ പ്രവർത്തിച്ചു വരുന്നു. കടന്നപ്പള്ളി പാണപ്പുഴ ഗ്രാമപഞ്ചായത് മുൻ പ്രസിഡണ്ട് കടന്നപ്പളി തുമ്പോട്ട് സ്വദേശിയാണ്.
		        				<br><br>
		        				<b>വിലാസം</b>: തുമ്പൊട്ട  കടന്നപ്പള്ളി  മെഡിക്കൽ കോളേജ്  പോസ്റ്റ്  670503<br>
		        				9446677886  
							</p>
							<?php
						}
						?>
		        	</div>
		        </div>
		        <div class="row">
		        	<div class="col-md-12">
		        		<p style="margin: 0px;padding-top: 5px;padding-bottom: 5px;background-color: #c0282c;color: white;margin-top: 20px" class="text-center"><span style="font-size: 15px;padding-right: 20px">kshethrakalaakademi.org</span></p>
		        	</div>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		</div>

		<div class="modal fade bd-example-modal-lg" tabindex="-1" id="gk" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-body">
		      	<h5 class="modal-title" id="exampleModalScrollableTitle" style="marg">
		        	
		        	<?php
					if($ln=='en')
					{
						?>
						<span>Govindan Kannapuram</span>
						<?php
					}
					else
					{
						?>
						<span class="ml-dyuthi">ഗോവിന്ദൻ കണ്ണപുരം</span>
						<?php
					}
					?>
					<span style="float: right;">
						<a type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </a>
					</span>
		        </h5>
		        <div class="bgRepeatedNOBorder"></div>
		        <br>
		        <div class="row">
		        	<div class="col-md-3">
		        		<img src="img/govindhanKannapuram_profile.jpg" class="img-fluid" style="margin-top: 12px">
		        	</div>
		        	<div class="col-md-9">
		        		<p style="margin-bottom: 10px" class="engContent">Born In 1948 At Kannapuram, Kannur. Painting Studied Under Artist P V Abdulla Master. Drawing Teacher At Panchayath HSS Pappinissery, Kannur Up To 2003.</p>
		        		<p style="margin-bottom: 10px" class="engContent">
		        			<b>Exhibitions: </b>
		        			Participated In Various Exhibitions Conducted By KPC SINCE 1994.
							All India Poster Exhibition 1995 “Man and Nature”. Conducted By Kerala Lalithakala Academy Thrissur. 
							State Exhibition At Ernakulum By Kerala Chithrakala Parishath 2003.
							National Exhibition At Chennai By Kerala Chithrakala Parishad 2003.
							State Exhibition At Darbar Hall Art Centre By Kerala Chithrakala Parishad 2006.

							National Exhibition Of Paintings By Kerala Chirthakala Parishad At Karnataka.
							Chithrakala Parishath Art Gallery Bangalore, 2006.
							Exhibition Of Painting By Kerala Lalithakala Academy Kannur, 2011.
							“Grand Kerala Contemporary Art Fair” By Department Of Tourism At Kanakakkunnu Palace, Thiruvananthapuram.
						</p>
		        	</div>
		        </div>
		        <div class="row">
		        	<div class="col-md-12">
		        		
						<p style="margin-bottom: 10px" class="engContent">	
							<b>Campus: </b>
							National Camp “Varanamelam” By Chithrakala Parishath At Kumaranellur, Palakkad. “Prakruthi“ Camp By Kerala Chithrakala Parishad Since 1994.” State Level Camp At Parassinikadavu Irrigation Bungalow Conducted By CPIM In Connection With State Conference Art Centre Chennai 2003. Varanam 2004 National Camp By Cultural Department By Government Of Pondicherry At Mahe 2004. New Year Camp By Kerala Lalithakala Academy At Payyambalam Beach 2012. 
						</p>
						<p style="margin-bottom: 10px" class="engContent">
							<b>Awards: </b>
							Poster Designing and Cartoon In State Level Competition By AIBEA ’94.
							Poster Designing Competition Against Alcoholic / Drug Addiction By Kerala State Re-Sourcecenrer ’94. 
							Poster Designing Against AIDS Conducted By KSRTC’94.
							Proficiency Certificate For Poster Designing For The Publicity Of Complete Literacy By KS-RC ’95.
							Merit Certificate In VP Suresh Smaraka Endowment.

						</p>
						<p style="margin-bottom: 10px" class="engContent">
							<b>Post Held: </b> 
							Patron Of Kerala Chithrakala Parishad.
							Member Purogamana Kala Shithya Sangam Kannur District Committee.
							Member Kshethrakala Academy, Kerala.

						</p>
						<p style="margin-bottom: 10px" class="engContent">
							<b>Address: </b> 
							Main Road  Kannapuram  Cherukunnu(PO) 9048166301
						</p>		 


						<p style="margin: 0px;padding-top: 5px;padding-bottom: 5px;background-color: #c0282c;color: white" class="text-center"><span style="font-size: 15px;padding-right: 20px">kshethrakalaakademi.org</span></p>

		        	</div>
		        </div>



		        
		      </div>
		      
		    </div>
		  </div>
		</div>


		<div class="modal fade bd-example-modal-lg" tabindex="-1" id="cc" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-body">
		      	<h5 class="modal-title" id="exampleModalScrollableTitle" style="marg">
		        	
		        	<?php
					if($ln=='en')
					{
						?>
						<span>Cheruthazham Chandran</span>
						<?php
					}
					else
					{
						?>
						<span class="ml-dyuthi">ചെറുതാഴം ചന്ദ്രൻ</span>
						<?php
					}
					?>
					<span style="float: right;">


						<a type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </a>
					</span>
		        </h5>
		        <div class="bgRepeatedNOBorder"></div>
		        <br>
		        <?php
				if($ln=='en')
				{
					?>
					<div class="row">
			        	<div class="col-md-3">
			        		<img src="img/Cheruthazham_Chandran_Profile.jpeg" class="img-fluid" style="margin-top: 10px">
			        	</div>
			        	<div class="col-md-9">
			        		<p class="engContent">	        	
							Cheruthazham Chandran was born in November 1969. He started learning thayambaka under Damodaran Marar. At an early age of 14, he had his first program of thayambaka at Sree Raghavapuram temple, Cheruthazham, commonly called as Hanumarambalam. His learning from Asthikalalayam, the prime most educational institute of temple art, made his learning truly fruitful. He was enriched with all the valuable lessons in the field of Kadhakali since the Principal of Aasthikalalayam, Sadhanam Narippatta Narayanan Namboothiri was the most influential person and a dearest teacher to him. Thus he knew the usage and importance of Chenda in the field of Kadhakali, which makes it a truly appealing an art. Simultaneously he got training in Pani from Kottyam Malabar Steedhara Marar. Mr. Cheruthazha CHandran had been a member in the Mattanur Panchavadhya Snagham, headed by Sadhanam Ramachandran and Mattanur Shankara Marar,dring the year 1984. Head over heels, he became so enriched with all his experiences in the field of his art, thayambaka. Eventually, he gathered a unique fusion of experience and talent from both Aasthikalalayam and vadhya sangam. 
							</p>
			        	</div>
			        </div>
					<p class="engContent">
						There are innumerable stories of acceptance of his talent by common people in different nook and cranny in the world. Twenty years ago, in a thayambaka conducted at Puthukkot village, an anonymous man gave his golden chain weighing more than three sovereigns after getting fascinated by the mesmerizing auditory treat. Once from Coimbatore Sidhaputhoor Ayyappa Temple, Chandran was gifted with a beautiful chenda by Sree N Ramaswami Gowda who was carried away by the captivating synergy of his thayambaka. The children form Anjaneya Vidyalaya, at the time of their first stage performance, gifted their dearest teacher with a golden garland. Apart from all these, he was adored with a unique title- ‘the prince of thayambaka’ from Keezhur Mahadeva Temple, Iritty. A glittering gold-ring was the present form a group of teachers and students since Chandran master was there behind their continuous victory in youth festivals. Once, as a token of his mystic talent, a valuable award has reached him from Valluvanad. It was in the name of Njangattiri Bhagavathy and the location was ever famous for thayambaka. Officially he has gathered many awards; an award from Cheruthazham Grama Panchayth given in Cheruthazham Fest and Kerala Sangeetha Nadaka Academy award were some among them.
					</p>
					<p class="engContent" style="margin-bottom: 10px">He got married to Veena, daughter to the famous maddhalam artist Sadhanam Ramachandran in 1994.  Have children Vindhuja and Anjana.
					Father: late Valiya Veettil Kunjambu Marar.
					Mother: late Kottila Veettil Kallyani Maraswar.
					<br>
					Address: Maruthi Pattannur 670595  Kannur
					</p>
					<p style="margin: 0px;padding-top: 5px;padding-bottom: 5px;background-color: #c0282c;color: white" class="text-center"><span style="font-size: 15px;padding-right: 20px">kshethrakalaakademi.org</span></p>
					<?php
				}
				else
				{
					?>
					<div class="row">
			        	<div class="col-md-3">
			        		<img src="img/Cheruthazham_Chandran_Profile.jpeg" class="img-fluid">
			        	</div>
			        	<div class="col-md-9">
			        		<p class="mlText justifyText">	        	
								1969 നവമ്പര്‍ മാസം ആദ്യവാരത്തില്‍ കണ്ണൂര്‍ ജില്ലയിലെ ചെറുതാഴത്ത് ജനിച്ചു. പ്രാഥമിക വിദ്യാഭ്യാസം ചെറുതാഴം ദാമോദരന്‍ മാരാരുടെ കീഴില്‍ തായമ്പക അഭ്യാസം ആരംഭിച്ചു പതിനാലാം വയസ്സില്‍ ചെറുതാഴം ശ്രീ രാഘവപുരം ക്ഷേത്രത്തില്‍(ഹനുമാരമ്പലം)അരങ്ങേറ്റം നടത്തി. ചെറുകുന്ന്  ആസ്തികാലയത്തിൽ  നിന്ന്  ഉപരിപഠനം  നേടി. കോട്ടയം (മലബാര്‍) ശ്രീധരമാരാരില്‍ നിന്നും പാണി വിഷയത്തില്‍ പരീശീലനം നേടി. മട്ടന്നൂര്‍ പഞ്ചവാദ്യസംഘത്തില്‍ 1984 ല്‍ അംഗമായി. 
								കേരള സംഗീത നാടക അക്കാദമി അവാർഡ്  ഉൾപ്പടെ വാദ്യരംഗത്തെ  വികവിന്  നിരവധി കേന്ദ്രങ്ങളിൽ നിന്നും അംഗീകാരം  ലഭിക്കുകയുണ്ടായി
							</p>
							<p class="mlText justifyText">
								1994 ല്‍ വിവാഹിതനായി പ്രശസ്ത മദ്ദളചാര്യന്‍ സദനം രാമചന്ദ്രന്‍റെ മകള്‍ വീണയാണ് 
								ഭാര്യ. മക്കൾ വിന്ദുജ, അഞ്ജന. മാതാപിതാക്കള്‍ അച്ചന്‍ വലിയ വീട്ടില്‍ കുഞ്ഞമ്പു മാരാര്‍(പരേതന്‍), അമ്മ കൊട്ടില വീട്ടില്‍ കല്ല്യാണി മാരസ്വാര്‍(പരേത) 
							</p>
							<p class="mlText">വിലാസം: മാരുതി പട്ടാന്നൂർ 670595 കണ്ണൂർ</p>
			        	</div>
			        </div>

					
					<p style="margin: 0px;padding-top: 5px;padding-bottom: 5px;background-color: #c0282c;color: white" class="text-center"><span style="font-size: 15px;padding-right: 20px">kshethrakalaakademi.org</span></p>


					<?php
				}
				?>


		      </div>
		    </div>
		  </div>
		</div>


		<div class="modal fade bd-example-modal-lg" tabindex="-1" id="rvr" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-body">
		      	<h5 class="modal-title" id="exampleModalScrollableTitle" style="marg">
		        	
		        	<?php
					if($ln=='en')
					{
						?>
						<span>C K Ravindra Varma Raja</span>
						<?php
					}
					else
					{
						?>
						<span class="ml-dyuthi">സി കെ രവീന്ദ്രവർമ രാജ </span>
						<?php
					}
					?>
					<span style="float: right;">
						<a type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </a>
					</span>
		        </h5>
		        <div class="bgRepeatedNOBorder"></div>
		        <?php
				if($ln=='en')
				{
					?>
					<div class="row">
			        	<div class="col-md-3">
			        		<img src="img/directorBoard2019/rvr.jpg" class="img-fluid" style="margin-top: 10px">
			        	</div>
			        	<div class="col-md-9">
			        		<p class="engContent" style="margin-top: 20px">	        	
								Born on 1st September 1934, and penned nine musical-dramas like “Sishyanum Makanum”, “Viswamithran”, “Bheeshmar”, “Karnan”, “Sree Koorumba”, “Seelavathy”, “Dakshayagam”, “Sakundhalam” and “Mrichakadikam”. All of these had been staged in different realms of society by different kalasamithis. 
								His works include ballets too.
							</p>
							<p class="engContent">	        	
								He has composed songs for two different musical-dramas like “Sreekrishna Leela” and “Nikumbhila” for Jayabharatha Kala Kendra, Kallyaseri. At both Kozhikode and Kannur Akasavani, he has been an artist for several dramas. Apart from drama, he has marked his name in the field of poems too. Several of them were already published. In the field of translation also his excellence is found since he has translated “Govindam” by Sree Sankaracharyar.
							</p>
			        	</div>
			        </div>
					<p class="engContent">
						<b>Professional and Educational Life:</b>
						He has acquired his master’s degree in history (MA History). For thirty years, till 1997, he had been in the position of Finance Accountant at Western India Pvt. Ltd. Valapattnam.
					</p>
					<p class="engContent" style="margin-bottom: 20px">
						<b>Address:</b>
						Saranga, Chirakkal Kovilakam, Chirakkal, Kannur 11.
					</p>
					<p style="margin: 0px;padding-top: 5px;padding-bottom: 5px;background-color: #c0282c;color: white" class="text-center"><span style="font-size: 15px;padding-right: 20px">kshethrakalaakademi.org</span></p>
					<?php
				}
				else
				{
					?>
					<div class="row">
			        	<div class="col-md-3">
			        		<img src="img/directorBoard2019/rvr.jpg" class="img-fluid">
			        	</div>
			        	<div class="col-md-9">
			        		<p class="mlText justifyText" style="margin-top: 20px">	        	
								ഒമ്പതു സംഗീത നൃത്ത നാടകങ്ങൾ, ബാലെ തുടങ്ങിയവ രചിച്ചു. ശിഷ്യനും മകനും, വിശ്വാമിത്രൻ, ഭീഷ്മർ, കർണ്ണൻ, ശ്രീ കുറുമ്പ, ശീലാവതി, ദക്ഷയാഗം, ശാകുന്തളം, മൃച്ഛകടികം എന്നിവ  വിവിധ കലാസമിതികൾ നിരവധി മേഖലകളിൽ അവതരിപ്പിച്ചു. 
							</p>
							<p class="mlText justifyText">
								കല്യാശേരി ജയഭാരത കലാകേന്ദ്രത്തിനു വേണ്ടി  ശ്രീകൃഷ്ണലീല,നികുംഭില എന്നി  രണ്ടു  നൃത്തനാടകങ്ങൾക്കു ഗാനരചന നിർവഹിച്ചു. കോഴിക്കോട്, കണ്ണൂർ ആകാശവാണി നിലയങ്ങളിൽ നാടക ആർട്ടിസ്റ്റ് ആയി ഒട്ടേറെ സംപ്രേഷണ പരിപാടികളിൽ പങ്കെടുത്തിട്ടുണ്ട്. ആനുകാലികങ്ങളിൽ നിരവധി കവിതകൾ  പ്രസിദ്ധികരിച്ചിട്ടുണ്ട്. ശങ്കരാചാര്യരുടെ ഗോവിന്ദം കാവ്യരൂപത്തിൽ വിവർത്തനം ചെയ്തു.
							</p>
			        	</div>
			        </div>
					
					<p class="mlText justifyText" style="margin-bottom: 10px">
						<b>പ്രൊഫഷണൽ, വിദ്യാഭ്യാസ ജീവിതം:</b>
						ചരിത്രത്തിൽ എം എ ബിരുദം. വളപട്ടണം വെസ്റ്റേൺ ഇന്ത്യ പ്ലൈവുഡിൽ 30 വര്ഷം ഫിനാന്സ് അക്കൗണ്ടന്റ്‌ ആയി ജോലി ചെയ്‌തു .1997ൽ  വിരമിച്ചു 
					</p>
					<p class="mlText justifyText" style="margin-bottom: 10px">
						<b>മേൽവിലാസം:</b> സാരംഗ, ചിറക്കൽ കോവിലകം ചിറക്കൽ കണ്ണൂർ 11 
					</p>
					<p style="margin: 0px;padding-top: 5px;padding-bottom: 5px;background-color: #c0282c;color: white" class="text-center"><span style="font-size: 15px;padding-right: 20px">kshethrakalaakademi.org</span></p>


					<?php
				}
				?>

		        
		      </div>
		    </div>
		  </div>
		</div>

	</section>

  </main>
  <?php include('includes/footer.php'); ?>
  <?php include('includes/backtotop.php'); ?>
  <?php include('includes/js.php'); ?>
  <?php include('includes/main.php'); ?>
</body>
</html>
