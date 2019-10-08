<div class="breadcrumb-area">
    <nav aria-label="パンくずリスト">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
        <li class="breadcrumb-item active" aria-current="page">ロール</li>
      </ol>
    </nav>
</div>
<div class="mx-auto">
    <div class="col-sm">
        <div id="id-title">
                <h1>あたらしいロール</h1>
        </div>
        <div class="container-fluid" id="id-list" class="lulu_table">
			<div class="row">
				<div class="roles form col-sm-4">
				<?php echo $this->Form->create('Role'); ?>
					<?php
						echo $this->Form->input('role_name', array(
							"label" => array(
								'text' => "名前",
								"class" => "input_label col-sm-4",
							),
							"div" => array(
								"class" => "form-inline row border-bottom m-4 p-2",
							),
							"class" => "form-control col-sm-8",
							"id" => "id-role_id",
							"type" => "text",
						));
						echo $this->Form->input('admin_flag',
							array(
							"label" => array(
								'text' => "管理者権限",
								"class" => "input_label col-sm-4",
							),
							"div" => array(
								"class" => "form-inline row border-bottom border-bottom m-4 p-1",
							),
							"class" => "form-control col-sm-8",
							"id" => "id-admin_flag",
							"type" => "select",
							"options" => array("0" => "なし", "1" => "あり"),
						));

					?>
				<?php echo $this->Form->input('ロールの追加', array(
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



