<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<style>
body
{ 
  background-repeat: no-repeat;
  background-color: teal;
}
.heading
	{
		margin: auto;
		width: 100%;
		text-align: center;
		padding-top: 20px;
		padding-bottom: 20px;
                background-color: black;
		
	}
.footerholder {
    background: none repeat scroll 0 0;
	bottom: 2%;
	height:4%;
    position: fixed;
    text-align: center;
    width: 100%;
}

.footer {
	color:#333333;
	font-family:Oswald;
	font-style:bold;
    background: none repeat scroll 0 0 transparent;
    margin: auto;
}
h1 	{
		
		color: white;	
}
select {
    padding: 16px 20px;
    border: 2px solid;
    outline:1px;
    border-radius: 4px;
    border-color: black;
    background-color: #FFFFFF;
}
.button 
	{
	background-color: #333333;
    color: white;
    border: 2px solid #333333;
	-webkit-transition-duration: 0.4s; 
    transition-duration: 0.4s;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	}
.button:hover 
	{
	background-color: #FFFFFF;
    color: black;
	border: 2px solid #505050;
    
	}
textarea {
    width: 35%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #000000;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}
.error
{
	font-size:20px;
	font-weight:bold;
	color: #ff0000;
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        text-align:center;
        
}
</style>
<div class="heading">
<h1>TRANSLATOR</h1>
</div>
<?php
$f=$o1=$o2=$ta="";
if(isset($_POST["s"]))
{
$o1=$_POST['t1'];
$o2=$_POST['t2'];
$ta=$_POST["n"];
str_replace('.', '' , $ta);
$text = $ta;
$serviceno = "S000.1";
$servicepwd = "secret";
$srclang = $o1;
$trglang = $o2;

$f = translate($serviceno, $servicepwd, $text, $srclang, $trglang);

}
function translate($serviceno, $servicepwd, $text, $srclang, $trglang) {
  $params = "wl_data=".urlencode($text);
  $params .= "&wl_errorstyle=1&wl_srclang=".$srclang."&wl_trglang=".$trglang."&wl_password=".$servicepwd;
  $host = "http://www.worldlingo.com/".$serviceno."/api";
  return do_post_request($host, $params);
}

function do_post_request($url, $data, $optional_headers = null) {
  $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    echo "<span class=\"error\">"."Connection problem occured."."</span>";
    exit;
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    echo "<span class=\"error\">"."Something is wrong."."</span>";
    exit;
  }
  return $response;
}
?>
<br><br><br>
<form method="post" action="translator.php">
  <select style='font-family: "Impact"; postion: absolute;float:left; margin:0px 0px 0px 30px' name="t1">
    <option value="null">Source Language</option>
    <option value="ar">Arabic</option>
    <option value="zh_CN">Chinese(Simplified)</option>
    <option value="zh_TW">Chinese(Traditional)</option>
    <option value="nl">Dutch</option>
    <option value="en">English</option>
    <option value="fr">French</option>
    <option value="de">German</option>
    <option value="el">Greek</option>
    <option value="it">Italian</option>
    <option value="ja">Japanese</option>
    <option value="ko">Korean</option>
    <option value="pt">Portuguese</option>
    <option value="ru">Russian</option>
    <option value="es">Spanish</option>
    <option value="sv">Swedish</option>
    </select>
  <select style='font-family: "Impact";positon: absolute;float:right; margin:0px 30px 0px 0px' name="t2">
    <option value="null">Target Language</option>
    <option value="ar">Arabic</option>
    <option value="zh_CN">Chinese(Simplified)</option>
    <option value="zh_TW">Chinese(Traditional)</option>
    <option value="nl">Dutch</option>
    <option value="en">English</option>
    <option value="fr">French</option>
    <option value="de">German</option>
    <option value="el">Greek</option>
    <option value="it">Italian</option>
    <option value="ja">Japanese</option>
    <option value="ko">Korean</option>
    <option value="pt">Portuguese</option>
    <option value="ru">Russian</option>
    <option value="es">Spanish</option>
    <option value="sv">Swedish</option>
  </select><br><br><br><br>
  <textarea name="n" style='position: fixed;left:2%;'><?php echo $ta;?></textarea>
  <input type="submit" name="s" value="Translate!" style='position: fixed;left:46.5%;top:55%' class="button">
  <textarea style='position: fixed;right:2%;'><?php echo $f;?></textarea>
</form>
</body>
<div class="footerholder">
	<div class="footer">
<button>Contact Vinayak &nbsp <a style="color:#505050" href="https://www.linkedin.com/in/vinayak-sinha-743125110/" title="Linkedin" target=_blank> <img border="0" alt="Linkedin" src="linkedin.png" width="20px" height="20px"></a> &nbsp <a style="color:#505050" href="https://www.github.com/Vinnu1" title="GitHub" target=_blank> <img border="0" alt="GitHub" src="gh.png" width="20px" height="20px"></a>
</button>
</div>
</div>
</html>