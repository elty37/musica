<?php
//アプリケーションの Consumer Key と Consumer Secret
$sTwitterConsumerKey = 					'DMJBSR9nty3nJx2xsWJxgkKZq';													//Consumer Key (API Key)
$sTwitterConsumerSecret = 				'RSltyTivLI0NgkNwMmHsitqmPOD38HIc7BO06paGG9AGEVNOPC';								//Consumer Secret (API Secret)

//アプリケーションのコールバックURL
$sTwitterCallBackUri = 					'http://localhost/oauth/callback.php';		//コールバックURL

//変数初期化
$objTwitterConection = 					NULL;			//TwitterOAuthクラスのインスタンス化
$aTwitterRequestToken = 				array();		//リクエストトークン
$sTwitterRequestUrl = 					'';				//認証用URL
$objTwitterAccessToken = 				NULL;			//アクセストークン
$objTwUserInfo = 						NULL;			//ユーザー情報
?>