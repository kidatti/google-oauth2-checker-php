<?php
require 'require.php';

$url = get_url();
$callback_url = str_replace('refresh_token.php', 'callback.php', $url);

// Token取得
$token_url = 'https://accounts.google.com/o/oauth2/token';
$params = array(
    'grant_type' => 'refresh_token',
    'refresh_token' => $_REQUEST['refresh_token'],
    'client_id' => $_POST['client_id'],
    'client_secret' => $_POST['client_secret'],
    'redirect_uri' => $callback_url,
);
$header = array(
    "Content-Type: application/x-www-form-urlencoded",
);
$options = array('http' => array(
    'header' => $header,
    'method' => 'POST',
    'content' => http_build_query($params),
));
$token_json = file_get_contents($token_url, false, stream_context_create($options));
$token = json_decode($token_json, true);

// ユーザ情報取得
$info_url = 'https://www.googleapis.com/oauth2/v1/userinfo';
$params = array(
    'access_token' => $token['access_token'],
);
$user_json = file_get_contents($info_url . '?' . http_build_query($params));
$user = json_decode($user_json, true);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="alert alert-primary" role="alert">
    Access Token が更新できたことを確認します。
</div>
<div class="container">
    <form method="post" action="refresh_token.php">
        <div class="form-group">
            <label for="clientId">Client ID（公開）</label>
            <input name="client_id" type="text" class="form-control" id="clientId" placeholder="Client ID" value="<?=$_REQUEST['client_id']?>">
            <small class="text-muted">Google APIの認証情報から取得したクライアントID（.apps.googleusercontent.comで終わる）</small>
        </div>
        <div class="form-group">
            <label for="clientId">Client Secret（非公開）</label>
            <input name="client_secret" type="text" class="form-control" id="clientSecret" placeholder="Client Secret" value="<?=$_REQUEST['client_secret']?>">
            <small class="text-muted">Google 認証情報から取得したクライアントシークレット</small>
        </div>
        <div class="form-group">
            <label for="code">Refresh Token（ユーザごと保存・失効する場合もあり。失効したら再取得。）</label>
            <input name="refresh_token" type="text" class="form-control" id="code" placeholder="Code" value="<?=$_REQUEST['refresh_token']?>">
            <small class="text-muted">Google から取得したコード</small>
        </div>
        <div class="form-group">
            <label for="code">Access Token（ユーザごと更新・デフォルトで3,600秒が期限）</label>
            <input name="access_token" type="text" class="form-control" id="code" placeholder="Code" value="<?=$token['access_token']?>">
            <small class="text-muted">Google から取得したコード</small>
        </div>
        <button type="submit" class="btn btn-primary">Access Token 更新（Refresh Token 利用）</button>
    </form>
    <div class="form-group">
        <label for="code">Token</label>
        <textarea class="form-control" id="code" rows="10"><?php print_r($token_json); ?></textarea>
        <small class="text-muted">取得した Token 情報</small>
    </div>
    <div class="form-group">
        <label for="code">User</label>
        <textarea class="form-control" id="code" rows="10"><?php print_r($user_json); ?></textarea>
        <small class="text-muted">取得した User 情報</small>
    </div>
</div>
</body>
</html>
