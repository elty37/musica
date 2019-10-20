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
						<div class="container preview">
							ほげ
						</div>
					</div>
				</div>
				<style>
					.preview {
						border: double 3px #6594e0;
						border-radius: 15px;
					}
				</style>
				<script>
var list = new Vue({
              el: '#id-list',
              data: {
                workflowName: '',
                workflowStates: [
                  {
                      taskId : "7",
                      modified: y + '-' + mm + '-' + dd + ' ' + hh + ':' + mmi + ':' + ss,
                      taskName: '',
                      state: '未着手',
                      stateColor: '#cfcfcf',
                      stateColorMouceOver: '#b0b0b0',
                      comment: []
                  }
                ]
              },
               methods:{
                    changeTaskName : function(event) {
                    },
                    changeTaskForm : function(event) {
                    },
                    
                   focus: function(workflowState) {
                    $('#task-' + workflowState.taskId).css({'fill': workflowState.stateColorMouceOver});
                    },
                    releaseFocus: function(workflowState) {
                        $('#task-' + workflowState.taskId).css({'fill': workflowState.stateColor});
                    },
                    displayWorkflowTaskInfo: function(workflowState, index) {
                    }
                }
            })
				</script>
			</div>
		</div>	
	</div>
</div>

