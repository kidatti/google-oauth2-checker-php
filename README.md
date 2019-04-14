# google-oauth2-checker-php

Google OAuth 2.0 を利用したチェック用アプリケーションです。Google のライブラリを利用せずに、PHPのみで作成しています。

- ログイン用URLの生成
- 認証コードの取得
- Access Token の取得
- User 情報の取得
- Refresh Token による Access Token の更新

ローカルで動作確認するためのアプリケーションです。公開できる場所には設置しないようご注意ください。

Quick Start
-----------

事前に、Google Cloud Platform ＞ APIとサービス ＞ 認証情報 より、OAuth 2.0 クライアント ID の登録が必要です。

```bash
git clone https://github.com/kidatti/google-oauth2-checker-php.git
cd google-oauth2-checker-php
php -S localhost:9999
```

ブラウザで http://localhost:9999/ を開きます。（ホスト名およびポート番号は環境に合わせて変更してください）
