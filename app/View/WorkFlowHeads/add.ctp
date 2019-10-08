<div class="breadcrumb-area">
    <nav aria-label="パンくずリスト">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
        <li class="breadcrumb-item active" aria-current="page">あたらしいワークフロー</li>
      </ol>
    </nav>
</div>
<div class="mx-auto">
    <div class="col-sm">
        <div id="id-title">
                <h1>あたらしいワークフロー</h1>
        </div>
        <div class="container-fluid" id="id-list" class="lulu_table">
            <div class="row">
                <div class="col-sm-4">
                    <div class="container-fluid" id="id-list" class="lulu_table">
					<form method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-sm-4 d-flex align-items-end">
                                <label for="#workflow_name">ワークフロー名</label>
                            </div>
                            <div class="col-sm d-flex align-items-end">
                                <input name="data[WorkFlowHead][work_flow_name]" class="form-control" type="text" id="workflow_name" v-model="workflowName" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 d-flex align-items-end">
                                <label>ワークフロー数</label>
                            </div>
                            <div class="col-sm d-flex align-items-end">
                                <select class="form-control" id="workflow_count" v-model="workflowCount" v-on:change="changeTaskForm">
                                  <option v-for="option in workflowOptions" v-bind:value="option.value">
                                    {{ option.text }}
                                  </option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group" v-for="(taskForm,index) in taskForms"> 
                            <div class="col-sm-4 d-flex align-items-end">
                                <label>{{taskForm.labelCount}}番目のタスク名</label>
                            </div>
                            <div class="col-sm d-flex align-items-end">					
								<select :name="taskForm.inputRoleId" class="form-control taskName" v-model="taskNames[index]" v-on:change="changeTaskName"/>
									<option v-for="role in roleList" :value="role.Role.id">{{role.Role.role_name}}</option>
								</select>
								<input type="hidden" :name="taskForm.inputRoleName" class="roleName" value="" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm d-flex align-items-end">
                                <button type="submit" class="btn btn-primary btn-lg">追加</button>
                            </div>
						</div>
					</form>
					</div>
                </div>
                <div class="col-sm">
                    <div class="contant-title">
                        <h2>プレビュー</h2>
                    </div>
                    <div class="container preview">
                        <div class="row">
                            <div class="edit_area col-sm-8" style="border-radius:15px;">
            <svg v-for="(workflowState, index) in workflowStates" id="start" xmlns="http://www.w3.org/2000/svg"
             width="1.2in" height="0.713333in"
             viewBox="0 0 507 214">
            <path :id="'task-' + workflowState.taskId"
                    :fill="workflowState.stateColor" :stroke="workflowState.stateColor" stroke-width="0" v-on:mouseover="focus(workflowState)" v-on:mouseout="releaseFocus(workflowState)" v-on:click="displayWorkflowTaskInfo(workflowState, index)"
                    d="M 296.00,82.00
                       C 296.00,82.00 0.00,82.00 0.00,82.00
                         0.00,82.00 0.00,132.00 0.00,132.00
                         0.00,132.00 296.00,132.00 296.00,132.00
                         297.25,145.87 308.33,165.38 317.08,176.00
                         356.83,224.22 429.78,226.67 474.99,184.83
                         483.94,176.54 490.84,165.84 496.25,155.00
                         501.81,143.84 506.85,128.55 507.00,116.00
                         507.11,105.98 507.54,95.86 505.55,86.00
                         498.35,50.18 474.99,21.22 441.00,7.45
                         391.89,-12.44 330.33,6.68 305.76,55.00
                         301.67,63.03 296.82,72.96 296.00,82.00 Z
                       M 389.00,13.29
                       C 418.10,10.57 448.38,19.48 468.91,41.01
                         512.12,86.34 500.78,162.64 444.00,191.03
                         426.32,199.87 413.29,201.22 394.00,201.00
                         362.04,200.62 328.83,177.49 315.32,149.00
                         307.11,131.69 305.78,119.76 306.00,101.00
                         306.11,91.76 309.00,80.57 312.40,72.00
                         325.86,38.09 353.57,18.70 389.00,13.29 Z" />
          </svg>
          <div id="mouseclick-area">
              <div class="contant-title">
                <h2>タスク</h2>
              </div>
              <div class="container" id="id-task_info_table" style="display: none">
                  <div class="row border-bottom">
                      <div class="col-sm-2 task_label">
                      <label>タスクID</label>
                      </div>
                      <div class="col-sm-10 task_value" id="id-taskId">
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-2 task_label">
                      <label>タスク名</label>
                      </div>
                      <div class="col-sm-10 task_value" id="id-taskName">
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-2 task_label">
                      <label>タスク状況</label>
                      </div>
                      <div class="col-sm-10 task_value" id="id-state">
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-2 task_label">
                      <label>最終更新</label>
                      </div>
                      <div class="col-sm-10 task_value" id="id-modified">
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-2 task_label">
                      <label>コメント</label>
                      </div>
                      <div class="col-sm-10 task_value" id="id-comments">
                      </div>
                  </div>
              </div>
          </div>
      </div>
                            <div class="col-sm-4" id="workflowInfo">
              <div class="contant-title">
                <h2>ワークフロー</h2>
                <div class="container" id="id-workflow_info_table">
                  <div class="row border-bottom">
                      <div class="col-sm-6 task_label">
                          <label>ワークフローID</label>
                      </div>
                      <div class="col-sm-6 task_value" id="id-workflowId">
                          {{workflowId}}
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-6 task_label">
                          <label>ワークフロー名</label>
                      </div>
                      <div class="col-sm-6 task_value" id="id-workflowName">
                          {{workflowName}}
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-6 task_label">
                          <label>編集ファイル</label>
                      </div>
                      <div class="col-sm-6 task_value" id="id-fileName">
                          xxxxxxx.xlsx
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-6 task_label">
                          <label>作成日</label>
                      </div>
                      <div class="col-sm-6 task_value" id="id-created">
                          {{created}}
                      </div>
                  </div>
              </div>
              </div>
        </div>
                        </div>
                    </div>
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
            let now = new Date();
            let y = now.getFullYear();
            let m = now.getMonth()+1; 
            let d = now.getDate();
            let ymd = y + "年" + m + "月" + d + "日";
            let w = now.getDay();
            let h = now.getHours();
            let mi = now.getMinutes();
            let s = now.getSeconds();
            let mm = ('0' + m).slice(-2);
            let dd = ('0' + d).slice(-2);
            let hh = ('0' + h).slice(-2);
            let mmi = ('0' + mi).slice(-2);
            let ss = ('0' + s).slice(-2);
            Vue.component('modal', {
              template: '#modal-template'
            })
            var list = new Vue({
              el: '#id-list',
              data: {
                workflowName: '',
                workflowCount: '3',
                workflowId: '7',
                created: ymd,
                taskIds: [7,8,9,10,11,12,13,14],
                currentTaskName: '',
                currentTaskIndex: '',
                workflowOptions: [
                      { text: '3', value: '3', selected: 'selected'},
                      { text: '4', value: '4', selected: ''},
                      { text: '5', value: '5', selected: ''}
                    ],
                taskForms: [
                    {labelCount: '1', inputRoleId: "data[WorkFlowDetail][0][role_id]", inputRoleName: "data[WorkFlowDetail][0][role_name]"},
                    {labelCount: '2', inputRoleId: "data[WorkFlowDetail][1][role_id]", inputRoleName: "data[WorkFlowDetail][1][role_name]"},
                    {labelCount: '3', inputRoleId: "data[WorkFlowDetail][2][role_id]", inputRoleName: "data[WorkFlowDetail][2][role_name]"},
				],
				roleList: <?= $roleList ?>,
                taskNames: ['','',''],
                workflowStates: [
                  {
                      taskId : "7",
                      modified: y + '-' + mm + '-' + dd + ' ' + hh + ':' + mmi + ':' + ss,
                      taskName: '',
                      state: '未着手',
                      stateColor: '#cfcfcf',
                      stateColorMouceOver: '#b0b0b0',
                      comment: []
                  },
                  {
                      taskId : "8",
                      modified: y + '-' + mm + '-' + dd + ' ' + hh + ':' + mmi + ':' + ss,
                      taskName: '',
                      state: '未着手',
                      stateColor: '#cfcfcf',
                      stateColorMouceOver: '#b0b0b0',
                      comment: []
                  },
                  {
                      taskId : "9",
                      modified: y + '-' + mm + '-' + dd + ' ' + hh + ':' + mmi + ':' + ss,
                      taskName: '',
                      state: '未着手',
                      stateColor: '#cfcfcf',
                      stateColorMouceOver: '#b0b0b0',
                      comment: []
                  },
                ]
              },
               methods:{
                    changeTaskName : function(event) {
                        $('.taskName').each( function(index, elem) {                            
                            if ($(elem).attr('name') == $(this).attr('name')) {
                                $('#id-taskName').text($(elem).children('option:selected').text());
                                $('.roleName:eq(' + index + ')').val($(elem).children('option:selected').text());
                            }
                        });
                    },
                    changeTaskForm : function(event) {
                        let input = $(event.target);
                        let selectedValue = input.children('option:selected').attr('value');
                        this.taskForms = [];
                        this.workflowStates = [];
                        var newTask = {
                          taskId : "",
                          modified: y + '-' + mm + '-' + dd + ' ' + hh + ':' + mmi + ':' + ss,
                          taskName: '',
                          state: '未着手',
                          stateColor: '#cfcfcf',
                          stateColorMouceOver: '#b0b0b0',
                          comment: []
                        };
                        for (var i = 1; i <= selectedValue ; i++) {
                             newTask.taskId = this.taskIds[i-1];
                             this.currentTaskName = this.taskNames[i-1];
                             this.taskForms[i-1] = {labelCount: i, inputRoleId: "data[WorkFlowDetail][" + (i-1) +"][role_id]", inputRoleName: "data[WorkFlowDetail][" + (i-1) +"][role_name]"};
                             this.workflowStates[i-1] =  JSON.parse(JSON.stringify(newTask));
                        }
                    },
                    
                   focus: function(workflowState) {
                    $('#task-' + workflowState.taskId).css({'fill': workflowState.stateColorMouceOver});
                    },
                    releaseFocus: function(workflowState) {
                        $('#task-' + workflowState.taskId).css({'fill': workflowState.stateColor});
                    },
                    displayWorkflowTaskInfo: function(workflowState, index) {
                        $('#id-task_info_table').css({display: 'inherit'});
                        $('#id-taskId').text(workflowState.taskId);
                        $('#id-taskName').text($('.taskName:eq(' + index + ')').children("option:selected").text());
                        $('#id-state').text("未着手");
                        $('#id-modified').text("20XX年〇月×日");
                        let commentsDiv = $("<div></div>");
                        let commentDiv = $("<div></div>");
                        let commentInput = $('<input />');
                        let now = new Date();
                        let y = now.getFullYear();
                        let m = now.getMonth() + 1;
                        let d = now.getDate();
                        let w = now.getDay();
                        let h = now.getHours();
                        let mi = now.getMinutes();
                        let s = now.getSeconds();
                        let mm = ('0' + m).slice(-2);
                        let dd = ('0' + d).slice(-2);
                        let hh = ('0' + h).slice(-2);
                        let mmi = ('0' + mi).slice(-2);
                        let ss = ('0' + s).slice(-2);
                        $('#id-comments').empty();
						this.currentTaskIndex = index;
						
                        for (let i = 0; i < workflowState.comment.length + 1;i++) {
                            dateDiv = $("<div></div>");
                            dateDiv.addClass('col-sm-3');
                            nameDiv = $("<div></div>");
                            nameDiv.addClass('col-sm-2');
                            roleDiv = $("<div></div>");
                            roleDiv.addClass('col-sm-2')
                            contentDiv = $("<div></div>");
                            contentDiv.addClass('col-sm-5');
                            commentsDiv.addClass('container-fluid"');

                            commentDiv = $("<div></div>");
                            commentDiv.addClass('row');
                            commentDiv.addClass('border-bottom');
                            if (i == workflowState.comment.length) {
                                commentInput = $('<input />');
                                commentInput.attr('type', 'text');
                                commentInput.attr('name', 'comment-' + workflowState.taskId);
                                commentInput.addClass('form-control');
                                contentDiv.addClass('form-group');
                                contentDiv.append(commentInput);
                                now = new Date();
                                dateDiv.text(y + '-' + mm + '-' + dd + ' ' + hh + ':' + mmi + ':' + ss);
                                nameDiv.text('ユーザ名');
                                roleDiv.text('ロール名');
                            } else {
                                contentDiv.text(workflowState.comment[i].content);
                                dateDiv.text(workflowState.comment[i].created);
                                nameDiv.text(workflowState.comment[i].userName);
                                roleDiv.text(workflowState.comment[i].userRole);
                            }
                            commentDiv.append(dateDiv);
                            commentDiv.append(nameDiv);
                            commentDiv.append(roleDiv);
                            commentDiv.append(contentDiv);
                            commentsDiv.append(commentDiv);
                            $('#id-comments').append(commentsDiv);
                        }
                        $('#id-comments').append('<div class="commentbtn"><span class="btn btn-info">コメントする</span></div>');
                    }
                }
            })
        </script>
    </div>
</div>
