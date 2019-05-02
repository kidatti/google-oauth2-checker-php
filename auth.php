<?php
require 'require.php';

$url = get_url();
$callback_url = str_replace('auth.php', 'callback.php', $url);

$data = array(
    'client_id' => $_POST['client_id'],
    'client_secret' => $_POST['client_secret'],
    'callback_url' => $callback_url,
);
file_put_contents('data.json', json_encode($data));

// Scope
$scopes = array(
    'profile',
    'email',
);
// Scope 指定があれば追加
if ($_REQUEST['calendar']) {
    $scopes[] = 'https://www.googleapis.com/auth/calendar';
}
// Scope 値を作成
$scope = implode(' ', $scopes);

$auth_url = 'https://accounts.google.com/o/oauth2/auth';
$params = array(
    'client_id' => $_POST['client_id'],
    'redirect_uri' => $callback_url,
    'scope' => $scope,
    'response_type' => 'code',
    'approval_prompt' => 'force',
    'access_type' => 'offline'
);
$url = $auth_url. '?' . http_build_query($params);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="alert alert-primary" role="alert">
    認証URLが作成されました。リンクをクリックします。
</div>
<?php echo '<a href="'.$url.'">'.$url.'</a>'; ?>
</body>
</html>
