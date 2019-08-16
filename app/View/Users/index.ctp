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
                                <h1>Excelファイルのアップロード</h1>
                        </div>
                        <div id="id-title">
                        </div>
                        <div class="form-group form-inline">
                            <label>
                                <span class="btn btn-primary">
                                    ファイルを選択
                                    <input type="file" name="csvfile" style="display:none">
                                </span>
                            </label>
                            <div id="id-filename">

                            </div>
                    </div>
                        <div class="form-group">
                            <div class="form-input">
                            <input class="btn btn-info" type=submit name="send" value="send" />
                            <input type="hidden" name="actionId" value="001" />
                            </div>
                        </div>
                    </div>
                </form>
                </div>                
