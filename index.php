<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="alert alert-primary" role="alert">
        Google Cloud Platform ＞ APIとサービス ＞ 認証情報 ＞ OAuth 2.0 クライアント ID の画面から値をコピーもしくは、JSONファイルをダウンロードして利用してください
    </div>
    <div class="container">
        <form method="post" action="auth.php">
            <div class="form-group">
                <label for="clientId">Client ID（公開）</label>
                <input name="client_id" type="text" class="form-control" id="clientId" placeholder="Client ID">
                <small class="text-muted">Google APIの認証情報から取得したクライアントID（.apps.googleusercontent.comで終わる）</small>
            </div>
            <div class="form-group">
                <label for="clientSecret">Client Secret（非公開）</label>
                <input name="client_secret" type="text" class="form-control" id="clientSecret" placeholder="Client Secret">
                <small class="text-muted">Google 認証情報から取得したクライアントシークレット</small>
            </div>
            <div class="form-group">
                Scope（公開・任意）
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="calendar" class="form-check-input" id="checkbox1">
                <label class="form-check-label" for="checkbox1">Calendar</label>
            </div>
            <button type="submit" class="btn btn-primary">次へ</button>
        </form>
    </div>
</body>

</html>