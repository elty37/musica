<?php

// 数値
$a = 1;
// 文字列
$apple = "Apple";
// 配列
$ary = array();
// $ary[0]に代入される
$ary[] = $apple;
// $ary[1]に代入される
$ary[] = "banana";
// $ary[2]に代入される
$ary[] = "orange";

//配列の中身全部表示
print_r($ary);
echo "<br />";

if(1 === '1') {
    echo "でないんだな";    
}

if(1 === 1) {
    echo "でる";    
}

if('1' === '1') {
    echo "でる";    
}


if(1 == '1'){
    echo "実はこっちOK";
}
?>


<html>
りんご：<input type="text" name="apple" /> <br />
ばなな：<input type="text" name="banana" /> <br />
みかん：<input type="text" name="orange" /> <br />

<button type="submit">お題を計算</button>
</html>
