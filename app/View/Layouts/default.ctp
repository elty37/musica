<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!doctype html>
<html lang="ja">
  <head>
      	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Baloo+Bhai' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2b2d907d83.js"></script>
    <?php
      echo $this->Html->script('upload.js');
      echo $this->Html->css('main.css');
    ?>

      
      
    <div class="login_info header">
        <p>舞風　彩さんがログインしています。</p>
        <p>権限：管理者</p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 mx-sm-n3 global-navi">
                <nav class="navbar navbar-dark bg-info">
                  <a href="#" class="navbar-brand">Menu</a>
                    <div class="navbar-collapse" id="navmenu1">
                        <div class="navbar-nav">
                          <a class="nav-item nav-link" href="#">Excelファイルのアップロード</a>
                          <a class="nav-item nav-link" href="#">Excelファイルのダウンロード</a>
                          <a class="nav-item nav-link" href="#">ワークフロー</a>
                          <a class="nav-item nav-link manager_menu" href="#">メンバー</a>
                          <a class="nav-item nav-link manager_menu" href="#">ロール</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-sm-10">
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
</body>
</html>
<!--	<?php echo $this->element('sql_dump'); ?>  -->
