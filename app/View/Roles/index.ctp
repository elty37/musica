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
                <h1>ロール</h1>
        </div>
        <div class="container-fluid" id="id-list" class="lulu_table">
            
          <div class="row">
              <div class="col-sm-2 d-flex align-items-end">
                  <a class="btn btn-info" href="/roles/add">ロールの追加</a>
              </div>
          </div>
          <div class="row border-bottom">
            <div class="col-sm-1 d-flex align-items-end">ID</div>
            <div class="col-sm-3 d-flex align-items-end">
                  ロール名
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                  管理者権限
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
          <div class="row border-bottom" v-for="(result, index) in results" v-if="result.Role.id != 1">
            <div class="col-sm-1 d-flex align-items-end">{{result.Role.id}}</div>
            <div class="col-sm-3 d-flex align-items-end">
                <a v-bind:href="editUrl + result.Role.id" class="btn btn-link p-0">
                    {{result.Role.role_name}}
                </a>
            </div>
            <div class="col-sm-2 d-flex align-items-end">
				<div v-if="result.Role.admin_flag == 1">
					あり
                </div>
                <div v-else>
					なし
                </div>
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                <a href="#" class="btn btn-link p-0">
                    {{result.Role.created}}
                </a>
            </div>
            <div class="col-sm-2 d-flex align-items-end">
                <a href="#" class="btn btn-link p-0">
                    {{result.Role.modified}}
                </a>
            </div>
            <div class="col-sm-2 d-flex align-items-end">
            <a :href="deleteUrl + result.Role.id" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('ファイルを削除します。よろしいですか？');">
                <i class="far fa-trash-alt"></i>
            </a>
        </div>
        <div class="col-sm-2">
        </div>
    </div>                                                
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
          var res = {};
          var mixin = {
              }
                var app = new Vue({
                    el: '#id-list',
                    data: {
  					  editUrl: "/roles/edit/",
                      parentMessage: 'Parent',
                      results: <?= $result; ?>,
                      deleteUrl: '/roles/delete/'
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
        </script>
    </div>
</div>
