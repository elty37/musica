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
        <div class="container-fluid" id="id-all-list" class="lulu_table">
			<div class="row">
				<div class="roles form col-sm-4">
				<div class="contant-title">
					<h2>ロール</h2>
				</div>

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
				<div class="col-sm-8">
					<div class="container-fluid" id="id_user-list" class="lulu_table">
						<div class="contant-title">
							<h2>ユーザ</h2>
						</div>
						<div class="container preview" id="id-users">
                            <div class="row" id="id-search">
                            検索
                            </div>
                            <div class="cp_ipcheck row">
                                <div id="no-mergin" class="col-sm-2" v-for="(user, index) in userList">
                                    <input :name="beforeName + user.userId + afterName" class="form-control" type="hidden" value="0">
                                    <input :id="index" :name="beforeName + user.userId + afterName" class="form-control" type="checkbox" value="1">
                                    <label :for="index" class="input_label">
                                        {{user.userName}}
                                    </label>
                                </div>
                            </div>
						</div>
					</div>
				</div>
				<style>
                    #no-mergin {
                        margin: 0px 0px 0px 0px;
                        padding: 0px 0px 0px 0px;
                    }
					.preview {
						border: double 3px #6594e0;
						border-radius: 15px;
					}
                    input[type=checkbox] {
                        display: none; /* チェックボックスを非表示にする */
                    }
                    #id-users .cp_ipcheck {
                        width: 90%;
                        margin: 2em auto;
                        text-align: left;
                    }
                    #id-users .cp_ipcheck input[type='checkbox'] {
                        position: absolute;
                        z-index: -1;
                        opacity: 0;
                    }
                    #id-users .cp_ipcheck label {
                        position: relative;
                        display: inline-block;
                        margin-right: 30px;
                        padding-right: 10px;
                        padding-left: 35px;
                        cursor: pointer;
                    }
                    #id-users .cp_ipcheck label::before {
                        position: absolute;
                        z-index: -1;
                        top: 0;
                        left: 0;
                        display: block;
                        width: 24px;
                        height: 24px;
                        content: ' ';
                        border: 2px solid #3c71da;
                    }
                    #id-users .cp_ipcheck input[type='checkbox'] + label::before {
                        border-radius: 4px;
                    }
                    #id-users .cp_ipcheck input[type='checkbox']:checked + label {
                        padding-left: 10px;
                        color: #ffffff;
                    }
                    #id-users .cp_ipcheck input[type='checkbox']:checked + label::before {
                        top: 0;
                        width: 100%;
                        height: 100%;
                        background: #3c71da;
                    }
                    /* Transition */
                    #id-users .cp_ipcheck label, .cp_ipcheck label::before {
                        -webkit-transition: 0.25s all ease;
                                transition: 0.25s all ease;
                    }
				</style>
				<script>
            new Vue({
               el: '#id-users',
                data: {
                    beforeName: "data[User][user_id",
                    afterName: "]",
                    userList: [
                     {
                         userId: 1,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 2,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 3,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 4,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 5,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 1,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 2,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 3,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 4,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },                     {
                         userId: 5,
                         userName: "五十嵐桜",
                         currentRoleId: "2",
                         currentRoleName: "シナリオ作成"
                     },
                     {
                         userId: 7,
                         userName: "夏目怜",
                         currentRoleId: "3",
                         currentRoleName: "素材作成"
                     }
                    ]
                }
            });        
				</script>
			</div>
		</div>	
	</div>
</div>

