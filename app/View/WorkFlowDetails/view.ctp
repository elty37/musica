<div class="breadcrumb-area">
    <nav aria-label="パンくずリスト">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
        <li class="breadcrumb-item active" aria-current="page">ワークフロー</li>
        <li class="breadcrumb-item active workflowName" aria-current="page" >ワークフローとタスク</li>
      </ol>
    </nav>
</div>
<div class="mx-auto">
    <div class="contant-title">
        <h1 class="workflowName">ワークフローとタスク</h1>
    </div>
  <form method="post" action="./FrontController.php" enctype="multipart/form-data">
      <div class="container-fluid">
        <div class="row">
            <div class="edit_area col-sm-8">
                <svg v-for="(workflowState, index) in workflowStates" id="start" xmlns="http://www.w3.org/2000/svg"
                width="1.69in" height="0.713333in"
                viewBox="0 0 507 214">
                <path :id="'task-' + workflowState.taskId"
                        :fill="workflowState.stateColor" :stroke="workflowState.stateColor" stroke-width="0" v-on:mouseover="focus(workflowState)" v-on:mouseout="releaseFocus(workflowState)" v-on:click="displayWorkflowTaskInfo(workflowState)"
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
                        <label>最終更新日</label>
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
                      <div class="col-sm-3 task_label">
                          <label>ワークフローID</label>
                      </div>
                      <div class="col-sm-9 task_value" id="id-workflowId">
                          {{workflowId}}
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-3 task_label">
                          <label>ワークフロー名</label>
                      </div>
                      <div class="col-sm-9 task_value" id="id-workflowName">
                          {{workflowName}}
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-3 task_label">
                          <label>編集ファイル</label>
                      </div>
                      <div class="col-sm-9 task_value" id="id-fileName">
                          {{fileName}}
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-3 task_label">
                          <label>作成日</label>
                      </div>
                      <div class="col-sm-9 task_value" id="id-created">
                          {{created}}
                      </div>
                  </div>
              </div>
              </div>
        </div>
          <script>
            let list = new Vue({
              el: '.edit_area',
              methods: {
                focus: function(workflowState) {
                    $('#task-' + workflowState.taskId).css({'fill': workflowState.stateColorMouceOver});
                },
                releaseFocus: function(workflowState) {
                    $('#task-' + workflowState.taskId).css({'fill': workflowState.stateColor});
                },
                displayWorkflowTaskInfo: function(workflowState) {
                    $('#id-task_info_table').css({display: 'inherit'});
                    $('#id-taskId').text(workflowState.taskId);
                    $('#id-taskName').text(workflowState.taskName);
                    $('#id-state').text(workflowState.state);
                    $('#id-modified').text(workflowState.modified);
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
                            /*ログイン情報をバインド*/
                            nameDiv.text('藤宮');
                            roleDiv.text('シナリオ');
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
                    $('#id-comments').append('<div class="commentbtn"><button class="btn btn-info">コメントする</button></div>');
                }
              },
              data: {
                workflowName: '第二回',
                workflowId: '2',
                fileName: '2nd.xlsx',
                created: '2018-08-12 20:21:11',
                workflowStates: [
                  {
                      taskId : "5",
                      modified: '2018-08-14 18:21:11',
                      taskName: 'シナリオ作成',
                      state: '完了',
                      stateColor: '#c0ff23',
                      stateColorMouceOver: '#c0cf23',
                      comment: [
                        {
                            userName: '田中',
                            userRole: '素材',
                            content: '20行目の「使用方法」が「仕様方法」になってます。',
                            created: '2018-08-13 17:21:11'
                        },
                        {
                            userName: '藤宮',
                            userRole: 'シナリオ',
                            content: '指摘ありがとうございます。修正しました。',
                            created: '2018-08-13 18:16:35'
                        }
                      ]
                    },
                  {
                      taskId : "6",
                      modified: '2018-08-15 19:21:28',
                      taskName: '動画素材調達',
                      state: '完了',
                      stateColor: '#c0ff23',
                      stateColorMouceOver: '#c0cf23',
                      comment: []
                  },
                  {
                      taskId : "7",
                      modified: '2018-08-15 21:01:14',
                      taskName: '動画素材のパス設定',
                      state: '進行中',
                      stateColor: '#ffc023',
                      stateColorMouceOver: '#efb020',
                      comment: []
                  },
                  {
                      taskId : "8",
                      modified: '2018-08-15 21:01:14',
                      taskName: '動画編集',
                      state: '未着手',
                      stateColor: '#cfcfcf',
                      stateColorMouceOver: '#b0b0b0',
                      comment: []
                  },
                  {
                      taskId : "9",
                      modified: '2018-08-15 21:01:14',
                      taskName: '動画チェック・提出',
                      state: '未着手',
                      stateColor: '#cfcfcf',
                      stateColorMouceOver: '#b0b0b0',
                      comment: []
                  }
                ]
              }
            });
            let workflowInfo = new Vue({
              el: '#id-workflow_info_table',
              data: {
                workflowName: '第二回',
                workflowId: '2',
                fileName: '2nd.xlsx',
                created: '2018-08-12 20:21:11'
              }});
        </script>
        </div>
      </div>
</form>
</div>
