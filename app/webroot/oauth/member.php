<?php
##############################################
### 初期設定

//セッションスタート
session_start();

//文字セット
header("Content-type: text/html; charset=utf-8"); 

//インクルード
require_once 'config.php';
require_once 'twitteroauth/autoload.php';

//インポート
use Abraham\TwitterOAuth\TwitterOAuth;

##############################################
### アクセストークン確認
if(empty($_SESSION['twAccessToken'])){
	echo 'error access token!!';
	exit;
}

##############################################
### ユーザー情報の取得

//TwitterOAuthクラスをインスタンス化
$objTwitterConection = new TwitterOAuth
									(
									$sTwitterConsumerKey,
									$sTwitterConsumerSecret,
									$_SESSION['twAccessToken']['oauth_token'],
									$_SESSION['twAccessToken']['oauth_token_secret']
									);

//ユーザー情報を取得
$objTwUserInfo = $objTwitterConection->get("account/verify_credentials");
//Twitter認証画面へリダイレクト
header('location: http://localhost/users/twitterAuth/' . $objTwUserInfo->id);
?>
