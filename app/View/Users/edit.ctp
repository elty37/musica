<div class="breadcrumb-area">
    <nav aria-label="パンくずリスト">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
        <li class="breadcrumb-item active" aria-current="page">ワークフローとファイル</li>
      </ol>
    </nav>
</div>
<div class="mx-auto">
  <form method="post" action="./FrontController.php" enctype="multipart/form-data">

    <div class="col-sm">
        <div id="id-title">
                <h1>ワークフローとファイル</h1>
        </div>
        <div class="container-fluid" id="id-list" class="lulu_table">
            
            <div class="row">
                <div class="col-sm-2 d-flex align-items-end">
                    <button type="button" name="addWorkflow" class="btn btn-info">ワークフローの追加</button>
                </div>
            </div>
            <div class="row border-bottom" v-for="(downloadFileInfo, index) in downloadFileInfos">
                <div class="col-sm-1 d-flex align-items-end" v-if="index > 0">{{index}}</div>
                <div class="col-sm-1 d-flex align-items-end" v-else></div>
                <div class="col-sm-3 d-flex align-items-end">
                    <a href="#" class="btn btn-link p-0">
                        {{downloadFileInfo.workFlowName}}
                    </a>
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                    <a href="#" class="btn btn-link p-0">
                        {{downloadFileInfo.fileName}}
                    </a>
                </div>
                <div class="col-sm-2 d-flex align-items-end" v-if="index > 0">
                        {{downloadFileInfo.stage}}
                </div>
                <div class="col-sm-2 d-flex align-items-end" v-else>
                    <a href="#" class="btn btn-link p-0">
                        {{downloadFileInfo.stage}}
                    </a>
                </div>
                <div class="col-sm-2 d-flex align-items-end" v-if="index > 0">
                        {{downloadFileInfo.uploadDate}}
                </div>
                <div class="col-sm-2 d-flex align-items-end" v-else>
                    <a href="#" class="btn btn-link p-0">
                        {{downloadFileInfo.uploadDate}}
                    </a>
                </div>
                <div class="col-sm-2 d-flex align-items-end" v-if="index > 0">

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
                　<button type="button" class="modal-default-button btn btn-outline-info" @click="$emit('close')">アップロード</button>
          </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</script>

<!-- app -->
<div id="app">
    <button type="button" id="show-modal" @click="showModal = true" class="btn btn-outline-primary btn-sm mr-2">
        <i class="fas fa-file-upload"></i>
    </button>
  <!-- use the modal component, pass in the prop -->
  <modal v-if="showModal" @close="showModal = false">
    <h3 slot="header">Excelファイルのアップロード</h3>
    <div slot="body">
    <div class="form-group form-inline">
        <label>
            <span class="btn btn-primary">
                ファイルを選択
                <input type="file" name="csvfile" accept=".xlsx" style="display:none" v-on:change="showFileName">
            </span>
        </label>
        <div id="id-filename" style="margin-left:10px;">
            {{fileName}}
        </div>
    </div>
  <div class="form-group form-check">
      
    <input style="display:none" type="checkbox" class="form-check-input" id="workflowCheck" v-model="currentTaskIsFinished">
    <label class="label_checkbox_not_checked" for="workflowCheck" v-if="currentTaskIsFinished">
      ☐
    </label>
    <label class="label_checkbox_checked" for="workflowCheck" v-else>
      ☑
    </label>
    <label class="form-check-label" for="workflowCheck">作業を完了する</label>
  </div>
    </div>
  </modal>
</div>
                    

                    <button class="btn btn-outline-danger btn-sm mr-2" onclick="confirm('ファイルを削除します。よろしいですか？');">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
                <div class="col-sm-2" v-else>
                    操作
                </div>
            </div>                                                
        </div>
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
            Vue.component('modal', {
              template: '#modal-template'
            })
            var list = new Vue({
              el: '#id-list',
              data: {
                parentMessage: 'Parent',
                downloadFileInfos: [
                  {
                      id : "ID",
                      uploadDate: '作成日',
                      workFlowName: 'ワークフロー名',
                      fileName: 'ファイル名',
                      stage: 'ステージ'
                  },
                  {
                      id : "1",
                      uploadDate: '2019-08-12',
                      workFlowName: '第一話',
                      fileName: '1st.xlsx',
                      stage: '公開済'
                  },
                  {
                      id : "2",
                      uploadDate: '2019-08-22',
                      workFlowName: '第二話',
                      fileName: '2nd.xlsx',
                      stage: 'デザイン工程'
                  }
                ],
                  showModal: false,
                  currentTaskIsFinished: false,
                  fileName : ""

              },
                methods:{
                    showFileName : function(event) {
                        var input = $(event.target);
                        var numFiles = input.get(0).files ? input.get(0).files.length : 1,
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                        this.fileName = label;
                    }
                }
            })
        </script>
    </div>
</form>
</div>
