<?php

//$arr = explode(" ",trim(file_get_contents('./stdin.txt')));
$STDIN = fopen('./stdin.txt','r');
$m = (int)trim(fgets($STDIN));
//echo $m . PHP_EOL;
$n = (int)trim(fgets($STDIN));
//echo $n . PHP_EOL;

$x_1 = 0;
$count = 0;
for($i = 0;$i < $n;$i ++){
	

	$arr = explode(" ",trim(fgets($STDIN)));
	//var_dump($arr);
	//exit;
	$x = (int)$arr[0];
	y = (int)$arr[1];
	$maisu = (int)$arr[2];

	//時刻をまたいだら、取りにいく
	if($x_1 <> $x && $i > 0){
		$count += ceil($m_sum / $m);
	}
	

	//時刻が同じ場合は、m_sumを上乗せ
	if($x_1 === $x){
		$m_sum += $maisu;
	//時刻が異なる場合は、m_sumを初期化
	}else{
		$m_sum = $maisu;
	}
	
	//時刻を初期化
	$x_1 = $x;

	//echo $x_1 . PHP_EOL;
	//echo $m_sum . PHP_EOL;

	if($i === $n - 1){
		$count += ceil($m_sum / $m);
	}
}

echo $count;

?>
