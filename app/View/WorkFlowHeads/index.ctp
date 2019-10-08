<div class="breadcrumb-area">
    <nav aria-label="パンくずリスト">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
        <li class="breadcrumb-item active" aria-current="page">ワークフローとファイル</li>
      </ol>
    </nav>
</div>
<div class="mx-auto">
    <div class="col-sm">
        <div id="id-title">
                <h1>ワークフローとファイル</h1>
        </div>
        <div class="container-fluid" id="id-list" class="lulu_table">
            
            <div class="row">
                <?php if ($this->Session->read('Auth.User.admin_flag') == '1') : ?>
                <div class="col-sm-2 d-flex align-items-end">
                    <a href="/work_flow_heads/add" name="addWorkflow" class="btn btn-info">ワークフローの追加</a>
                </div>
                <?php endif ?>
            </div>
            <div class="row border-bottom">
                <div class="col-sm-1 d-flex align-items-end">
                  ID
                </div>
                <div class="col-sm-3 d-flex align-items-end">
                  ワークフロー名
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                  ファイル
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                  更新日
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                  作成日
                </div>
                <div class="col-sm-2 d-flex align-items-end">操作</div>
            </div>
            <div class="row border-bottom" v-for="(downloadFileInfo, index) in downloadFileInfos">
                <div class="col-sm-1 d-flex align-items-end">{{downloadFileInfo.WorkFlowHead.id}}</div>
                <div class="col-sm-3 d-flex align-items-end">
                  <a :href="downloadFileInfo.WorkFlowHead.url" class="btn btn-link p-0">
                      {{downloadFileInfo.WorkFlowHead.work_flow_name}}
                  </a>
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                  {{downloadFileInfo.WorkFlowHead.file_name}}
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                  {{downloadFileInfo.WorkFlowHead.modified}}
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                  {{downloadFileInfo.WorkFlowHead.created}}
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                



<!-- app -->
<div id="app">
    <button type="button" @click="openModal(downloadFileInfo.WorkFlowHead.id)" class="btn btn-outline-primary btn-sm mr-2">
        <i class="fas fa-file-upload"></i>
    </button>
  <!-- use the modal component, pass in the prop -->
  <form :action="uploadUrl" enctype="multipart/form-data" method="post" accept-charset="utf-8" @submit="sendModal()">
  <modal v-if="showModal" @close="showModal = false" :id="downloadFileInfo.WorkFlowHead.id">
   <h3 slot="header">Excelファイルのアップロード</h3>
    <div slot="body">
    <div class="form-group form-inline">
        <label>
            <span class="btn btn-primary">
                ファイルを選択
                <input type="file" name="workFile" accept=".xlsx" style="display:none" v-on:change="showFileName">
            </span>
        </label>
        <div id="id-filename" style="margin-left:10px;">
            {{fileName}}
        </div>
    </div>
  <div class="form-group form-check">
  <?= $this->Form->input('task_state', array( 
    'class' => 'form-control',
    'type' => 'select', 
    'options' => array($stateList),
    'label' => "タスクを更新する（あなたのロール：" . $this->Session->read('Auth.User.role_name') . "）",
    'div' => false,           // div親要素の有無(true/false)
    'empty' => false,          
)); ?>
    <input type="hidden" :id="headIdText + index" name="id" value="" />
  </div>
    </div>
  </modal>
  </form>   
</div>
                    
                  <?php if ($this->Session->read('Auth.User.admin_flag') == '1') : ?>
                    <a :href="deleteUrl + index" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('ワークフローを削除します。よろしいですか？');">
                        <i class="far fa-trash-alt"></i>
                    </a>
                    <?php endif ?>
                </div>
            </div>                                                
        </div>
        <!-- template for the modal component -->
<script type="text/x-template" id="modal-template">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
            </slot>
            <div class="pull-left">
                <button type="button" class="modal-default-button btn btn-outline-danger" @click="$emit('close')">×</button>
            </div>
          </div>

          <div class="modal-body">
            <slot name="body">
              default body
            </slot>
          </div>

          <div class="modal-footer">
          <slot name="submit-button">
                　<button type="submit" class="modal-default-button btn btn-outline-info">アップロード</button>
          </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</script>

        <style>
.modal-mask {
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 30%;
  margin: 0px auto;
  padding: 20px 30px;
  background-color:#E0FFFF; 
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: 'Meiryo UI', cursive; 
    -webkit-border-radius:10px;
    -moz-border-radius:10px;  
    border-radius:10px;
}

.modal-header h3 {
    font-family: 'Baloo Bhai', 'Nico Moji', cursive;
    color: #6594e0;
    border-bottom: dashed 2px #6594e0;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
            .label_checkbox_checked {
                color:green;
                font-size: 25px;
                font-weight:bold;
            }
            .label_checkbox_not_checked {
                color:dimgray;
                font-size: 25px;
            }

        </style>
        <script>
            var add_url = "/work_flow_heads/add";
            var res = {};

            Vue.component('modal', {
              template: '#modal-template'
            })
            var list = new Vue({
              el: '#id-list',
              data: {
                parentMessage: 'Parent',
                downloadFileInfos: <?= $result; ?>,
                deleteUrl: "/work_flow_heads/delete/",
                uploadUrl: "/work_flow_heads/upload/",
                showModal: false,
                currentTaskIsFinished: false,
                url:"/work_flow_heads/view/",
                fileName : "",
                headIdText : "headIdText",
                sendId:""
              },
                methods:{
                    showFileName : function(event) {
                        var input = $(event.target);
                        var numFiles = input.get(0).files ? input.get(0).files.length : 1,
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                        this.fileName = label;
                    },
                    openModal : function(id) {
                      this.showModal = true;
                      var count = this.downloadFileInfos.length - 1;
                      this.sendId = id;
                    },
                    sendModal : function() {
                      var count = this.downloadFileInfos.length - 1;
                      $('#' + this.headIdText + count).val(this.sendId);
                    }
                }
            })
        </script>
    </div>
</div>
