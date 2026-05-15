<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task App</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.8;
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
            color: #333;
        }

        h1, h2, h3 {
            color: #222;
        }

        h1 {
            border-bottom: 3px solid #333;
            padding-bottom: 10px;
        }

        h2 {
            margin-top: 40px;
            border-left: 6px solid #333;
            padding-left: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f5f5f5;
        }

        code {
            background-color: #f4f4f4;
            padding: 2px 6px;
            border-radius: 4px;
        }

        pre {
            background-color: #1e1e1e;
            color: #fff;
            padding: 16px;
            border-radius: 8px;
            overflow-x: auto;
        }

        ul {
            margin-top: 10px;
        }

        .section {
            margin-bottom: 32px;
        }
    </style>
</head>
<body>

    <h1>Task App</h1>

    <p>
        Laravel 13を用いて作成した、業務タスク管理アプリです。
    </p>

    <p>
        ログインユーザーが自身の業務タスクを登録し、進捗状況や期限を管理できます。
    </p>

    <hr>

    <div class="section">
        <h2>アプリ概要</h2>

        <p>
            社内メンバー向けのタスク管理アプリです。
        </p>

        <p>
            ユーザーごとにタスクを管理し、認証・認可を利用して
            「自分のタスクのみ操作できる」構成になっています。
        </p>
    </div>

    <div class="section">
        <h2>主な機能</h2>

        <h3>認証機能</h3>

        <ul>
            <li>ユーザー登録</li>
            <li>ログイン</li>
            <li>ログアウト</li>
        </ul>

        <p>
            Laravel Breeze Starter Kit + Livewire を利用しています。
        </p>

        <h3>タスク管理機能</h3>

        <ul>
            <li>タスク一覧表示</li>
            <li>タスク詳細表示</li>
            <li>タスク登録</li>
            <li>タスク編集</li>
            <li>タスク削除</li>
        </ul>

        <h3>ステータス管理</h3>

        <p>以下のステータスを管理できます。</p>

        <ul>
            <li>未着手</li>
            <li>進行中</li>
            <li>完了</li>
        </ul>

        <h3>認可制御</h3>

        <p>
            Policyを利用し、他ユーザーのタスクを
            編集・削除できないよう制御しています。
        </p>

        <h3>バリデーション</h3>

        <p>以下のような入力チェックを実装しています。</p>

        <ul>
            <li>必須チェック</li>
            <li>文字数制限</li>
            <li>日付形式チェック</li>
        </ul>

        <h3>API機能</h3>

        <p>
            Laravel Sanctum を利用したAPI認証機能を導入しています。
        </p>

        <ul>
            <li>APIルーティング</li>
            <li>トークン認証</li>
            <li>認証済みユーザー取得</li>
            <li>APIミドルウェア制御</li>
        </ul>
    </div>

    <div class="section">
        <h2>使用技術</h2>

        <table>
            <thead>
                <tr>
                    <th>項目</th>
                    <th>内容</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Framework</td>
                    <td>Laravel 13</td>
                </tr>

                <tr>
                    <td>Language</td>
                    <td>PHP</td>
                </tr>

                <tr>
                    <td>Database</td>
                    <td>MySQL</td>
                </tr>

                <tr>
                    <td>Authentication</td>
                    <td>Laravel Breeze + Livewire</td>
                </tr>

                <tr>
                    <td>API Authentication</td>
                    <td>Laravel Sanctum</td>
                </tr>

                <tr>
                    <td>Frontend</td>
                    <td>Blade / Livewire</td>
                </tr>

                <tr>
                    <td>Environment</td>
                    <td>Laravel Sail (Docker)</td>
                </tr>

                <tr>
                    <td>Version Control</td>
                    <td>Git / GitHub</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2>開発環境構築</h2>

        <h3>リポジトリをclone</h3>

        <pre><code>git clone &lt;repository-url&gt;</code></pre>

        <h3>ディレクトリ移動</h3>

        <pre><code>cd task-app</code></pre>

        <h3>Dockerコンテナ起動</h3>

        <pre><code>./vendor/bin/sail up -d</code></pre>

        <h3>依存関係インストール</h3>

        <pre><code>./vendor/bin/sail composer install
./vendor/bin/sail npm install</code></pre>

        <h3>フロントエンド起動</h3>

        <pre><code>./vendor/bin/sail npm run dev</code></pre>

        <h3>マイグレーション実行</h3>

        <pre><code>./vendor/bin/sail artisan migrate</code></pre>
    </div>

</body>
</html>