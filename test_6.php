<?php

//$arr = explode(" ",trim(file_get_contents('./stdin.txt')));
$STDIN = fopen('./stdin.txt','r');
$arr = explode(" ",trim(fgets($STDIN)));
foreach($arr as $key => $value){
	$arr[$key] = (int)$value;
}
$arr_c = explode(" ",trim(fgets($STDIN)));
foreach($arr_c as $key => $value){
	$arr_c[$key] = (float)$value;
}
//var_dump($arr);
//var_dump($arr_c);


$n = $arr[1];
$clm = $arr[0];
$cnt = $arr[2];
//echo $n;
$data = array();
$point = array();
for($i = 0;$i < $n;$i++){
		//ポイントの初期化
		$p = 0;

		//各個人のデータを配列(数値)に格納
		$data = explode(" ",trim(fgets($STDIN)));
		foreach($data as $key => $value){
			$data[$key] = (int)$value;
		}

		for($j = 0;$j < $clm;$j++){
				$p = $arr_c[$j] * $data[$j];
				//echo $p . PHP_EOL;
				
				//$i番目のポイントの計算
				$point[$i] += $p;
		}
		$point[$i] = round($point[$i]);
		//echo $point[$i];
		//exit;
}
//var_dump($point);
$result = arsort($point);
//var_dump($point);
$c = 1;
foreach($point as $value){
	echo $value . PHP_EOL;
	$c ++;
	if($c > $cnt){
		exit;
	}
}

?>
