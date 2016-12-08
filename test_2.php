<?php

//$arr = explode(" ",trim(file_get_contents('./stdin.txt')));
$STDIN = fopen('./stdin.txt','r');
$arr = explode(" ",trim(fgets($STDIN)));
foreach($arr as $key => $value){
	$arr[$key] = (int)$value;
}
//var_dump($arr);
$n = $arr[0];
$min = $arr[1] - $arr[2];
$max = $arr[1] + $arr[2];
//echo $min . "min" . PHP_EOL;
//echo $max . "max" . PHP_EOL;
$ninjin_ok = array();
//確認人参にたいして
for($i = 1;$i <= $n; $i ++){
	$arr_ninjin = array();
	$arr_ninjin = explode(" ",trim(fgets($STDIN)));
	//var_dump($arr_ninjin);
	//当分の許容値内か確認
	if((int)$arr_ninjin[1] >= $min
			&& (int)$arr_ninjin[1] <= $max){
		//許容値の場合、Noをキーにして量を配列に格納
		//array_push($ninjin_ok,$arr_ninjin[0]);
		$ninjin_ok[$i] = $arr_ninjin[0];
	}

}
//許容配列から、質量の最大値を検索
$max = max($ninjin_ok);
$arr_key = array_keys($ninjin_ok,$max);
//var_dump($arr_key);
//配列が空の場合、not found
if(!$ninjin_ok){
	echo "not found";
}else{
//最初に見つかった人参の番号を出力
	$min_key = min($arr_key);
	echo $min_key;
}	



?>
