<?php

//$arr = explode(" ",trim(file_get_contents('./stdin.txt')));
$STDIN = fopen('./stdin.txt','r');
$n = (int)trim(fgets($STDIN));
//echo $n . PHP_EOL;

//各テキストラインに対して
for($i = 0;$i < $n;$i ++){
	$err_flg = false;
	$str = array();
	$str = explode(".",trim(fgets($STDIN)));
	//var_dump($str);	
	//echo count($str);
	$ip = array();
	foreach($str as $key => $value){
		//値が空の場合はエラーﾌﾗｸﾞon
		if($value === ""){
			$err_flg = true;
		}
		$ip[$key] = (int)$value;
	}

	//var_dump($ip);
	//exit;

	//オクテットが4を超えたらエラーﾌﾗｸﾞon
	if(count($ip) >4){
		$err_flg = true;
	}

	//配列の値が255を超えた場合はエラーを表示
	foreach($ip as $key => $int){
		if($ip[$key] > 255){
			$err_flg = true;
		}
	}

	if($err_flg){
		echo "False" . PHP_EOL;
	}else{
		echo "True" . PHP_EOL;
	}
}
	


?>
