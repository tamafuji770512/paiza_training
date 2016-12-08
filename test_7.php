<?php

//$arr = explode(" ",trim(file_get_contents('./stdin.txt')));
$STDIN = fopen('./stdin.txt','r');
$arr = explode(" ",trim(fgets($STDIN)));
//var_dump($arr);

$str = trim(fgets($STDIN));
$str_len = strlen($str);
//タグⅠ
$tag1_len = strlen($arr[0]);
//echo $len_tag_1 . PHP_EOL;
//タグⅡ
$tag2_len = strlen($arr[1]);
//echo $len_tag_2 . PHP_EOL;

//抽出した文字列の数を初期化
$echo_str_len = 0;
//var_dump($str_len);
$i = 0;//カウンタ
while($data = $str){
	//echo $data . PHP_EOL;
	//テスト
	//$data = $str;
	if(strpos($data,$arr[0]) === false){
		break;
	}
	if(strpos($data,$arr[1]) === false){
		break;
	}
	
	$tag1_pos = strpos($data,$arr[0]);
	//echo $position_1 . PHP_EOL;
	$tag2_pos = strpos($data,$arr[1]);
	//echo $position_2 . PHP_EOL;

	//抽出開始位置
	$start_pos = $tag1_pos + $tag1_len;
	//抽出bite数
	$sub_bite = $tag2_pos - $start_pos;
	//echo $start_pos . PHP_EOL;
	//echo $sub_bite . PHP_EOL;

	//開始位置と終了位置が同じ場合blankを出力
	if($sub_bite == 0){
		echo "<blank>" . PHP_EOL;
	}else{
		//文字列から、tag_1の次～tag_2の前まで抽出
		$echo_str = substr($data,$start_pos,$sub_bite);
		echo $echo_str . PHP_EOL;
	}
	//出力
	
	//抽出した文字列の文字数をカウント
	$del_len = $tag2_pos + $tag2_len;
	
	//文字列から、tag_1,echo_str_len,tag_2の文字を除いて、再度、$strに格納
	//tag_1～tag_2までの長さ
	//echo $sub_total_len . PHP_EOL;
	$str = substr($data,$del_len);
	//echo $str . PHP_EOL;
	$i ++;
}

?>
