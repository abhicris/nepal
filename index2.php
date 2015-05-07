


<?php 
//  session_destroy();
include("db1.php");







if(isset($_POST['submitapplication']))
{
$name=$_POST['name'];

$gender=$_POST['gender'];

$age=$_POST['age'];



$degree=$_POST['degree'];


$work=$_POST['work'];

$fullname=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$degree=$_POST['degree'];

$briefdetails=$_POST['briefdetails'];

$filenew=$name."_".$age."years".'.txt';
$myfile = fopen($filenew, "w") or die("Unable to open file!");
$txt = "Name :  ".$name;
$txt.= "\n";
$txt.= "gender :  ".$gender;
$txt.= "\n";
$txt.= "Age :  ".$age;
$txt.= "\n";
$txt.= "degree :  ".$degree;
$txt.= "\n";
$txt.= "phone :  ".$phone;
$txt.= "\n";
$txt.= "city :  ".$city;
$txt.= "\n";
$txt.= "briefdetails :  ".$briefdetails;
$txt.= "\n";
fwrite($myfile, $txt);


fclose($myfile);





$cmd="INSERT INTO `appliers`( `name`, `gender`, `email`, `phone`, `city`, `lastwork`, `degree`, `briefdetails`, `time`) VALUES ('$name','$gender','$email','$phone','$city','$work','$degree','$briefdetails','$time')";

$result=mysql_query($cmd);

if($result)
	$applied=1;













/* attaching the CV like file to the user */




$path='jobapplication/';
$filename=$filenew;
$file = $filename;;
$replyto='itsmechandanjha@rediffmail.com';
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $message='Hello Admin,'.$fullname.'  a citizen from Nepal applied at through your web platform'.'  consider the attachment and forward it to your recruiment department based on his skills'."\r\n";
     
    $message.="Name :".$fullname."\r\n";
    $message.="Gender :".$gender."\r\n";
   

      $message.="City in Nepal :".$city."\r\n";
            $message.="His choice of work :".$work."\r\n";
            $message.="His brief story:".$briefdetails."\r\n";
   
    $header = "From:Nepalhithe "." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";

 
    mail('chandanjha.7@gmail.com','Applications from Nepal',$message,$header);

 
    mail('caaniketprateek@gmail.com','Applications from Nepal',$message,$header);

/*------------send email ends her -------------------------------------------------------------------------------------------------------*/

//$msg = "A user wanted to contact designer with email id:".$_SESSION['designeremail'].' His/her message was :"'.$message.'" -'.'Please forward or Reply him accordingly';


// send email
//mail($adminemail,"Designers contact message approval",$msg);





}







?>










<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta content="Unicode Standard, general information, Hindi" name="keywords">

<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="Content-Language" content="hi" />
  <title>support nepal </title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
-webkit-input-placeholder {  color: #999;}
.submittedtext {
  position: absolute;
  color: rgb(12,46,130);
  font-size: 13px;
  width: 100%;
  /* background: red; */
  height: 132px;
  margin-top: 181px;
  /* text-align: justify; */
  font-size: 23px;
  color: white;
}

div#helpid{ position: absolute;
  margin-left:15%;  margin-top: -186px;}

  .aboutusnepali{


	 position: absolute;
  color: rgb(12,46,130);
  font-size: 13px;
  width: 100%;
  /* background: red; */
  height: 132px;
margin-top: 535px;
  /* text-align: justify; */
  font-size: 23px;
  color: white;
  /* background: red; */
  padding-left: 6%;
  max-width: 1077px;
  min-width: 300px
}
.aboutusenglish{


	 position: absolute;
  color: rgb(12,46,130);
  font-size: 13px;
  width: 100%;
  /* background: red; */
  height: 132px;
margin-top: 84px;
  /* text-align: justify; */
  font-size: 23px;
  color: white;
  /* background: red; */
  padding-left: 6%;
  max-width: 1077px;
  min-width: 300px
}

input[type="text"]::-webkit-input-placeholder  
{
	color:grey;
    padding-left:15px;
}
.login input[type=text] {
  width: 250px;
  height: 30px;
  background: transparent;
  border: 1px solid rgba(2, 2, 2, 0.6);
  border-radius: 2px;
  color: #0C0B0B;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 4px;

}


.addresstext{
	  color: rgb(255, 255, 244);
  position: absolute;
  float: right;
  font-family: sans-serif;
  font-size: 20px;
  font-family: 'Exo', sans-serif;
  margin-left: 81%;
  position: fixed;
  margin-top: -125px;
}
.nepalmappic{

	 background: url('nepal affected area_edited.jpg');
  background-size: 100% 370px;
  width: 46%;
  height: 345px;
  /* background: red; */
  position: absolute;
}

.connectlink{
	  background:rgb(12,46,130);
  border: rgb(69, 109, 250) 1px groove;
  color: white;
  font-size: 24px;
  padding: 15px;
  font-family: ;
  text-decoration: none;
  font-weight: normal;
  border: none;
    position: absolute;
  margin-top: 396px;
}

.connectlinknepali{
	  background:rgb(12,46,130);
  border: rgb(69, 109, 250) 1px groove;
  color: white;
  font-size: 24px;
  padding: 15px;
  font-family: ;
  text-decoration: none;
  font-weight: normal;
  border: none;
    position: absolute;
margin-top: 779px;

}
.connectlinknepali:hover{
	background: white;
  color:rgb(12,46,130);
}
.connectlink:hover{
	background: white;
  color:rgb(12,46,130);
}

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(http://media1.s-nbcnews.com/i/newscms/2015_17/994976/nepal_784ba68274ee76c31fdb76733add778f.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body" id='bodyid' style='  height: 1134px;background-image: url(http://media1.s-nbcnews.com/i/newscms/2015_17/994976/nepal_784ba68274ee76c31fdb76733add778f.jpg);'></div>

  <p style="" class='addresstext'>support@standfornepal.com<br>
+91-8587024270</p>
		<center>


<div class='submittedtext' style="display:<?php if(!isset($applied))
echo 'none';
else
echo 'block';
?>"><p>Thanks, <?php echo $name; ?> ! your job application has been submitted to us , and will it to our recruiting 
department.<br>We will communicate you at <?php echo $phone; ?> in case needed. 

</p>

</div>



			<div class='firstpage' id='firstpageid' style="display:<?php if(isset($applied))
echo 'none';
else
echo 'block';
?>

			" id='firstpage'>
		<div class="header" id='helpid' style=''>
			<div style='font-size:70px;color:rgb(216,0,0)'><p>Help<strong style='font-size;color:rgb(12,46,130)'>Nepal</strong></p></div>

</div>
			<!--=========================== about us content ================================================================= -->



<center>

<div style='' class='aboutusenglish'>

<p>This devastating earthquake of 7.9 magnitude has apart from taking lives and homes have also taken away livelihood ( jobs / shops/ )of many of our brothers and sisters. Some are rendered orphans, some lost their husband, some lost their father, some lost their wives and mother, some lost sole bread earner of the family. Rest other lost there earning avenues. 
This is an initiative where we provide our Neplese brothers and sisters a platform to just specify the nature of their last job done, their skill and qualification and a contact point. We ask all the businessman and entrepreneurs to provide jobs (temprory or permanent) so that they can earn their bread and butter with dignity without having to beg.
We  request all our nepali friend who have internet access to help enroll  the data of all the affected people and offer their own contact number if needed.



</p>

</div>



</center>

			<!--================================================================================================================= -->
<div class=''>



</div>
			<br>
			<br>
			<br>
			<br>

		
		<br>


		<div><a href='#' class='connectlink' id='connectid' onclick="
				document.getElementById('bodyid').style.height='1134px';document.getElementById('loginid').style.display='block';document.getElementById('helpid').style.display ='none';
			document.getElementById('connectid').style.display='none'; document.getElementById('bodyid').setAttribute('style','height:1134px');
				 document.getElementById('bodyid').setAttribute('style','background:white');
				 	document.getElementById('bodyid').style.height='1100px';document.getElementById('secondpageid').style.display='block';
				 	document.getElementById('firstpageid').style.display='none'
				 ">Get Connected</a></div>


<!-- ================================ div for attching distrcits affected in nepal ===============================================- -->









<!--=========================== about us content ================================================================= -->



<center>

<div style='' class='aboutusnepali'>

<p>यस्तो तहस-नहस गर्ने भूकंपले ज्याँ घर लीनका साथ हाम्रा नेपाली भाई-बहिनी को रोज़ी रोटी कमाओने ज़रिया पनी छिनेद | धेरे अनाथ भए, कसेले अपना आमा बुबा, कसेले अपना भाई बहिनी, कसेले अपना साथी भाई लाई यो भूकम्पले गरदा खोचन |
<br>
हमरो यो कोसीसा, जमा हामी हमरा नेपाली साथी भाईलाई काम कमको  ज़रिया दियेर उनीहरुलाई .इज़्ज़ातको रोटी पुनेलाई |
नेपालको सबे व्यापारी, आएन्न्टरपुणार हरु सित हमरो अनुरोध छ की उनिहरु हमरा नेपाली साथी भाईलाई काम (स्थाई व अस्थाई)  नौकरी दीयेर, सम्मानको रोटी प्रदान ग्रने कोसिसमा ह्मारा साथ देनुहोश |


</p>



</div>

		<div><a href='#' class='connectlinknepali' id='connectidnepali' onclick="
				document.getElementById('bodyid').style.height='1134px';document.getElementById('loginid').style.display='block';document.getElementById('helpid').style.display ='none';
			document.getElementById('connectid').style.display='none'; document.getElementById('bodyid').setAttribute('style','height:1134px');
				 document.getElementById('bodyid').setAttribute('style','background:white');
				 	document.getElementById('bodyid').style.height='1100px';document.getElementById('secondpageid').style.display='block';
				 	document.getElementById('firstpageid').style.display='none'
				 ">हमारे साथ जुड़ें</a></div>


</center>

			<!--================================================================================================================= -->

			<br>
			<br>
			<br>
			<br>

		</div>


<!-- ================================ div for attching distrcits affected in nepal ===============================================- -->


<div class='nextpage' id='secondpageid' style='display:none'>












<div class='nepalmappic' id='nepalmapid' style="">






</div>







<!--===============================================================image ends here ======================================================== -->








		<div class="login" id='loginid' style='display:none'>

<!-- ======================================================= form for appliers ============================================================================ ==-->
<form action='' method="post" style="color:black">



<label>enter your name (necessary)</label>		<br>
		<input type="text" placeholder="Your Name" name="name" style="border:black 1px groove;color:black;"><br><br><br><br>

		<label>enter your age</label><br>	
				<select name='age' style="min-width: 261px;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  height: 27px;
color: balck;
  background: none;">
  					<option>Select age</option>

  					<?php for($t=22;$t<56;$t++){?>
					<option><?php echo $t; ?></option>
					<?php } ?>
						</select>
					<br><br>

 
					<input type='checkbox' name='gender' value='male'><label style=' font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;'>Male</label>



					<input type='checkbox' name='gender' value='female' style="border:black 1px groove;color:black;"><label style=' font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;'>Female</label><br><br><br><br>


  <label>select your nearest city from the list (necessary)</label><br>
				<select name='city' style="min-width: 261px;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  height: 27px;
  color: black;
  background: none;">


  <?php 

$districtsarr=array();

  $cmd="select * from nepal_districts";
$result=mysql_query($cmd);

while($row=mysql_fetch_array($result))
{

//$phone=$row['phone'];
array_push($districtsarr,$row['districts']);


}



  ?>
  					<option>Enter your location (Zone) :</option>

<?php for($y=0;$y<sizeof($districtsarr);$y++)
{
	$district=$districtsarr[$y];?>
	
  				
					<option><?php echo $district; ?></option>
					
							<?php }?>
					<option>kathmandu</option>
					<option>pokhran</option>
						</select>
					<br><br><br><br>

					<label>enter your degree or any skil set</label><br>
				<input type="text" placeholder="Your degree" name="degree" style="border:black 1px groove;color:black;"><br><br><br><br>

  <label>Please enter your choice for profession depending on your last experience. (necessary)</label><br>
				<select name='work' style="min-width: 261px;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  height: 27px;
  color: black;
  background: none;">


  <?php 

$jobarr=array();

  $cmd="select * from jobs";
$result=mysql_query($cmd);

while($row=mysql_fetch_array($result))
{

//$phone=$row['phone'];
array_push($jobarr,$row['job_post']);


}



  ?>
  					<option>select a job  :</option>

<?php for($y=0;$y<sizeof($jobarr);$y++)
{
	$job=$jobarr[$y];?>
	
  				
					<option><?php echo $job; ?></option>
					
							<?php }?>
					<option>kathmandu</option>
					<option>pokhran</option>
						</select>
					<br><br><br><br>
				<label>A brief description of your work experience and present scenario</label><br>
				<textarea name='briefdetails' placeholder='enter a brief summary of your last work....' style='width: 379px;
  background: none;
  color: black;
  height: 77px;'></textarea><br><br><br><br>

  <label>enter your contact number .In case you dont have any , enter neighboiur or friends contact (necessary)</label><br>
				<input type="text" placeholder="enter your or friends/neighbour contact no." name="phone" style="border:black 1px groove;color:black;"><br><br><br><br>

				<label>enter any mail id </label><br><br><br>

				  
				<input type="Submit" name="submitapplication" value='post my application' style='  background: black;
  color: white;
  min-width: 249px;
  height: 52px;
  border: none;'>





			</form>
			<!--======================================== form ends here ======================================================================== -->
		</div>
</center>

</div>
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>