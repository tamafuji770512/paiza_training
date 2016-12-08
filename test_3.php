<?php

//$arr = explode(" ",trim(file_get_contents('./stdin.txt')));
$STDIN = fopen('./stdin.txt','r');
$n = (int)trim(fgets($STDIN));
echo $n . PHP_EOL;

//種別ごとのポイントを集計する配列を初期化
$arr_price_sub = array_fill(0,3,0);

//購入明細ごとに
for($i = 0;$i < $n;$i ++){
	$arr = explode(" ",trim(fgets($STDIN)));
	$type = (int)$arr[0];
	$price = (int)$arr[1];
	//種別ごとに合計
	$arr_price_sub[$type] += $price; 

}
var_dump($arr_price_sub);

$point_sum = 0;
//種別ごとに
foreach($arr_price_sub as $key => $value){
		//100円未満を切捨て
		$price_sum = floor($value / 100) * 100;
		//ポイントを計算して加算
		if($key === 0){
			$point_sum += $price_sum * 0.05;
		}
		if($key === 1){
			$point_sum += $price_sum * 0.03;
		}
		if($key === 2){
			$point_sum += $price_sum * 0.02;
		}
		if($key === 3){
			$point_sum += $price_sum * 0.01;
		}
}
//ポイントを出力
echo $point_sum;
?>
