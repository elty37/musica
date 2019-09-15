<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>合計</title>
    </head>
    <form action = "hoge.php"method = "post">
    りんご：<input type = "text" name = "apple" /> <br />
    みかん：<input type = "text" name = "mikan" /> <br />
    ばなな：<input type = "text" name = "banana" /> <br />
    <button type="submit">お題を計算</button>
    </form>
<?php
//ary[0]に$appleを代入
$apple = $_POST["apple"];
//ary[1]に$mikanを代入
$orange = $_POST["mikan"];
//ary[2]に$bananaを代入
$banana = $_POST["banana"];
//合計
$sum = $apple + $orange + $banana;
//表示
echo "合計：" . $sum;
?>
</html>
