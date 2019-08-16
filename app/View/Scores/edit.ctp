                <div class="breadcrumb-area">
                    <nav aria-label="パンくずリスト">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">ホーム</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Excelファイルのアップロード</li>
                      </ol>
                    </nav>
                </div>
                <div class="mx-auto">
                  <form method="post" action="./FrontController.php" enctype="multipart/form-data">

                    <div class="col-sm">
                        <div id="id-title">
                                <h1>Excelファイルのダウンロード</h1>
                        </div>
                        <div class="container-fluid" id="id-list" class="lulu_table">
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
                                    <button class="btn btn-outline-primary btn-sm mr-2">
                                        <i class="fas fa-file-download"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm mr-2" onclick="confirm('ファイルを削除します。よろしいですか？');">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                                <div class="col-sm-2" v-else>
                                    操作
                                </div>
                            </div>                                                
                        </div>
                        <script>
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
                                ]
                              }
                            })
                        </script>
                    </div>
                </form>
                </div>
