<div class="breadcrumb-area">
    <nav aria-label="パンくずリスト">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
        <li class="breadcrumb-item active" aria-current="page">メンバー</li>
      </ol>
    </nav>
</div>
<div class="mx-auto">
    <div class="col-sm">
        <div id="id-title">
                <h1>あたらしいメンバー</h1>
        </div>
        <div class="container-fluid" id="id-list" class="lulu_table">
			<div class="row">
				<div class="users form col-sm-4">
				<?php echo $this->Form->create('User'); ?>
					<?php
						echo $this->Form->input('user_name', array(
							"label" => array(
								'text' => "名前",
								"class" => "input_label col-sm-4",
							),
							"div" => array(
								"class" => "form-inline row border-bottom m-4 p-2",
							),
							"class" => "form-control col-sm-8",
							"id" => "id-user_id",
							"type" => "text",
						));
						echo $this->Form->input('mail_address', array(
							"label" => array(
								'text' => "メールアドレス",
								"class" => "input_label col-sm-4",
							),
							"div" => array(
								"class" => "form-inline row border-bottom m-4 p-2",
							),
							"class" => "form-control col-sm-8",
							"id" => "id-mail_address",
							"type" => "text",
						));
						echo $this->Form->input('password', array(
							"label" => array(
								'text' => "パスワード",
								"class" => "input_label col-sm-4",
							),
							"div" => array(
								"class" => "form-inline row border-bottom border-bottom m-4 p-1",
							),
							"class" => "form-control col-sm-8",
							"id" => "id-password",
							"type" => "password",
						));
						echo $this->Form->input('role_id',
							array(
							"label" => array(
								'text' => "所属するグループ",
								"class" => "input_label col-sm-4",
							),
							"div" => array(
								"class" => "form-inline row border-bottom border-bottom m-4 p-1",
							),
							"class" => "form-control col-sm-8",
							"id" => "id-role",
							"type" => "select",
							"options" => $roles,
						));

					?>
				<?php echo $this->Form->input('メンバーの追加', array(
					"label" => false,
					"type" => "submit",
					"class" => "btn btn-primary btn-lg",
				)); ?>
				<?php echo $this->Form->end(); 
				?>
				</div>
				<div class="col-sm-8"></div>
			</div>
		
    </div>
</div>



