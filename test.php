<?php

//$arr = explode(" ",trim(file_get_contents('./stdin.txt')));
$STDIN = fopen('./stdin.txt','r');
$n = (int)trim(fgets($STDIN));
//echo $n . PHP_EOL;

//必要な食材を配列に格納
$arr_need = array();
for($i = 0;$i < $n;$i ++ ){
	$arr_need[$i] = explode(" ",trim(fgets($STDIN)));
	$arr_need[$i][1] = (int)$arr_need[$i][1];
}
//var_dump ($arr_need);

//所持している食材を配列に格納
$n = (int)trim(fgets($STDIN));
$arr_have = array();
for($i = 0;$i < $n;$i ++ ){
	$arr_have[$i] = explode(" ",trim(fgets($STDIN)));
	$arr_have[$i][1] = (int)$arr_have[$i][1];
}
//var_dump($arr_have);


//必要な食材の各配列要素に対して、
$arr_make = array();
foreach($arr_need as $key => $value){
	//var_dump($arr_need[$key]);
	//exit;
	//所持している配列から要素を検索
	$flg_have = false;	
	//持っている場合は、所持 / 必要 で可能人数を計算
	foreach($arr_have as $key_have => $value_have){
		if($value[0] === $value_have[0]){
			//各食材のmax人数を配列に格納
			$arr_make[$key] = floor($arr_have[$key_have][1] 
							/ $arr_need[$key][1]);
			$flg_have = true;
		}
	}
	
	//必要な食材を持っていない場合は0を出力して終了
	if(!$flg_have){
		echo 0;
		exit;
	}
}
//var_dump($arr_make);
//max人数の配列から、最小値を抽出
$min = min($arr_make);
//echo最小値
echo $min;
?>
