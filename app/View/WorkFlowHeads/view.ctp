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
                <svg v-for="(workflowDetail, index) in workflowDetails" id="start" xmlns="http://www.w3.org/2000/svg"
                width="1.69in" height="0.713333in"
                viewBox="0 0 507 214">
                <path :id="'task-' + workflowDetail.id"
                        :fill="workflowDetail.task_state" :stroke="workflowDetail.task_state" stroke-width="0" v-on:mouseover="focus(workflowDetail)" v-on:mouseout="releaseFocus(workflowDetail)" v-on:click="displayWorkflowTaskInfo(workflowDetail)"
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
                          {{id}}
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-3 task_label">
                          <label>ワークフロー名</label>
                      </div>
                      <div class="col-sm-9 task_value" id="id-workflowName">
                          {{work_flow_name}}
                      </div>
                  </div>
                  <div class="row border-bottom">
                      <div class="col-sm-3 task_label">
                          <label>編集ファイル</label>
                      </div>
                      <div class="col-sm-9 task_value" id="id-fileName">
                          {{file_name}}
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
          <script>
              function getNowDate() {
                now = new Date();
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
                return y + '-' + mm + '-' + dd + ' ' + hh + ':' + mmi + ':' + ss;
              }
            function sendComment(){
                let textField = $('#id-comment'); 
                $.ajax({
                    type: 'POST',
                    url: ' http://localhost/work_flow_detail_comments/',
                    data: {
                        comment:textField.val()
                    },
                    dataType: 'json'
                })
                .done(function(data) {
                    var comments = $('.comments-' + $('#id-taskId').text());
                    var dateDiv = $("<div></div>");
                    var nameDiv = $("<div></div>");
                    var roleDiv = $("<div></div>");
                    var commentDiv = $("<div></div>");
                    var contentDiv = $("<div></div>");

                    for (var i=0; i < comments.length; i++) {
                        if (i == comments.length - 2) {
                            dateDiv = $("<div></div>");
                            dateDiv.addClass('col-sm-3');
                            nameDiv = $("<div></div>");
                            nameDiv.addClass('col-sm-2');
                            roleDiv = $("<div></div>");
                            roleDiv.addClass('col-sm-2')
                            contentDiv = $("<div></div>");
                            contentDiv.addClass('col-sm-5');
                            contentDiv.attr('id', 'id-comment_view_area');

                            commentDiv = $("<div></div>");
                            commentDiv.addClass('row');
                            commentDiv.addClass('border-bottom');
                            commentDiv.addClass('comments-' + $('#id-taskId').text());
                            contentDiv.text(textField.val());
                            dateDiv.text(getNowDate());
                            nameDiv.text();
                            roleDiv.text();
                            commentDiv.append(dateDiv);
                            commentDiv.append(nameDiv);
                            commentDiv.append(roleDiv);
                            commentDiv.append(contentDiv);
                            comments[i].after(commentDiv[0]);
                            break;
                        }
                    }　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　                        
                    textField.val(''); 
                })
                .fail(function() {
                    console.log('error');
                });
            }
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
                    $('#id-taskId').text(workflowState.id);
                    $('#id-taskName').text(workflowState.task_name);
                    $('#id-state').text(workflowState.task_state);
                    $('#id-modified').text(workflowState.modified);
                    let commentsDiv = $("<div></div>");
                    let commentDiv = $("<div></div>");
                    let commentInput = $('<input />');
                    var dateDiv = $("<div></div>");
                    var nameDiv = $("<div></div>");
                    var roleDiv = $("<div></div>");
                    var contentDiv = $("<div></div>");
                    $('#id-comments').empty();

                    for (let i = 0; i < workflowState.comments.length + 1;i++) {
                        dateDiv = $("<div></div>");
                        dateDiv.addClass('col-sm-3');
                        nameDiv = $("<div></div>");
                        nameDiv.addClass('col-sm-2');
                        roleDiv = $("<div></div>");
                        roleDiv.addClass('col-sm-2')
                        contentDiv = $("<div></div>");
                        contentDiv.addClass('col-sm-5');
                        contentDiv.attr('id', 'id-comment_view_area');
                        commentsDiv.addClass('container-fluid');
                        commentsDiv.attr('id', 'id-comments_area');

                        commentDiv = $("<div></div>");
                        commentDiv.addClass('row');
                        commentDiv.addClass('border-bottom');
                        commentDiv.addClass('comments-' + $('#id-taskId').text());
                        if (i == workflowState.comments.length) {
                            commentInput = $('<input />');
                            commentInput.attr('type', 'text');
                            commentInput.attr('name', 'comment-' + workflowState.taskId);
                            commentInput.addClass('form-control');
                            commentInput.attr('id','id-comment');
                            contentDiv.addClass('form-group');
                            contentDiv.append(commentInput);
                            dateDiv.text(getNowDate());
                            /*ログイン情報をバインド*/
                            nameDiv.text('藤宮');
                            roleDiv.text('シナリオ');
                        } else {
                            contentDiv.text(workflowState.comments[i].comment);
                            dateDiv.text(workflowState.comments[i].created);
                            nameDiv.text(workflowState.comments[i].userName);
                            roleDiv.text(workflowState.comments[i].userRole);
                        }
                        commentDiv.append(dateDiv);
                        commentDiv.append(nameDiv);
                        commentDiv.append(roleDiv);
                        commentDiv.append(contentDiv);
                        commentsDiv.append(commentDiv);
                        $('#id-comments').append(commentsDiv);
                    }
                    $('#id-comments').append('<div class="commentbtn"><button type="button" class="btn btn-info" onclick="sendComment()" id="id-comment_btn">コメントする</button></div>');
                }
              },
              data: <?php echo $result; ?> 
            });
            let workflowInfo = new Vue({
              el: '#id-workflow_info_table',
              data: <?php echo $result; ?>});
        </script>
        </div>
      </div>
</form>
</div>
