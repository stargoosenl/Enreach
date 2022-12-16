<?PHP
if ($_POST){
    $text = $_POST["ext"];
	//$_POST["netnummer"]="078";
	
	if(preg_match_all("/^(?<nr>\d{3,5})(?:\t|\*|x){2,}(?<name>.*?)\r?\n/im",$_POST["ext"],$ext)){
		//toestelnummer[TAB]extensie naam[TAB]PIN code[TAB]netnummer[TAB]abonnee naam[TAB]abonnee e-mail*
			echo "<pre>";
		for ($x=0;$x<count($ext['nr']);$x++){
			$ext['name'][$x]=str_replace(" & "," en ",$ext['name'][$x]);
			$ext['name'][$x]=str_replace(" &"," en",$ext['name'][$x]);
			$ext['name'][$x]=str_replace("& ","en ",$ext['name'][$x]);
			$ext['name'][$x]=str_replace("&","en",$ext['name'][$x]);
			
			echo $ext['nr'][$x];
			echo "\t";
			echo $ext['name'][$x];
			echo "\t";
			echo "7".$ext['nr'][$x];
			echo "\t";
			echo $_POST["netnummer"]."\t";
			echo $ext['name'][$x];
			echo "<br>";

		}
			echo "</pre>";
	}
    //print_r($ext);
	//exit;
	//echo $text;
}else{
	print('
<form method="post">
    <textarea name="ext" placeholder="plak sheet info hier"></textarea><br>
    <input type=number name="netnummer" placeholder="0486 netnummer"></input>

    <input type="submit" value="Go!" />
</form>'
	);
}
exit;