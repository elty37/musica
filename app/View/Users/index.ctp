<div class="breadcrumb-area">
    <nav aria-label="パンくずリスト">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
        <li class="breadcrumb-item active" aria-current="page">メンバー</li>
      </ol>
    </nav>
</div>
<div class="mx-auto">
  <form method="post" action="./FrontController.php" enctype="multipart/form-data">

    <div class="col-sm">
        <div id="id-title">
                <h1>メンバー</h1>
        </div>
        <div class="container-fluid" id="id-list" class="lulu_table">
            
          <div class="row">
          <?php if ($this->Session->read('Auth.User.admin_flag') == '1') : ?>
              <div class="col-sm-2 d-flex align-items-end">
                  <a class="btn btn-info" href="/users/add">メンバーの追加</a>
              </div>
          <?php endif ?>
          </div>
          <div class="row border-bottom">
            <div class="col-sm-1 d-flex align-items-end">ID</div>
            <div class="col-sm-3 d-flex align-items-end">
                  ユーザ名
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                  ロール
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                  作成日
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                  更新日
            </div>
            <div class="col-sm-2 d-flex align-items-end">
              操作
            </div>
          </div>
          <div class="row border-bottom" v-for="(result, index) in results" v-if="result.User.id != 1">
            <div class="col-sm-1 d-flex align-items-end">{{result.User.id}}</div>
            <div class="col-sm-3 d-flex align-items-end">
                <a v-bind:href="userEditUrl + result.User.id" class="btn btn-link p-0">
                    {{result.User.user_name}}
                </a>
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                <a :href="roleEditUrl + result.User.role_id" class="btn btn-link p-0">
                    {{result.Role.role_name}}
                </a>
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                    {{result.User.created}}
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                    {{result.User.modified}}
            </div>
            <div class="col-sm-2 d-flex align-items-end">
            
            <?php if ($this->Session->read('Auth.User.admin_flag') == '1') : ?>
            <a :href="deleteUrl + result.User.id" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('ファイルを削除します。よろしいですか？');">
                <i class="far fa-trash-alt"></i>
            </a>
            <?php endif ?>
        </div>
        <div class="col-sm-2">
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <script>
          var add_url = "/users/add/";
          var res = {};
          var mixin = {

              }
                var app = new Vue({
                    el: '#id-list',
                    data: {
                      parentMessage: 'Parent',
                      results: <?= $result; ?>,
                      userEditUrl: '/users/edit/',
                      deleteUrl: '/users/delete/',
                      roleEditUrl: '/roles/edit/'
                    },
                    ajax:{
                      data:{
                        error:0, //エラー状態
                        loading:true, //通信状態
                        result:{} //取得結果格納用
                      }
                    },
                    methods:{
                      showFileName : function(event) {
                        var input = $(event.target);
                        var numFiles = input.get(0).files ? input.get(0).files.length : 1,
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                        this.fileName = label;
                      },
                    }
                  });


            Vue.component('modal', {
              template: '#modal-template'
            })
        </script>
    </div>
</form>
</div>
