# Task App

Laravel 13を用いて作成した、業務タスク管理アプリです。

ログインユーザーが自身のタスクを登録・管理でき、管理者ユーザーは全ユーザーのタスク状況を検索・閲覧できます。

---

# アプリ概要

社内メンバー向けのタスク管理アプリです。

認証・認可を利用し、

- 一般ユーザー
- 管理者ユーザー

で利用可能な機能を分離しています。

---

# 主な機能

## 認証機能

- ユーザー登録
- ログイン
- ログアウト

Laravel 13 Starter Kitを利用しています。

---

## タスク管理機能

ログインユーザーは自身のタスクを管理できます。

- タスク一覧表示
- タスク作成
- タスク編集
- タスク削除

---

## ステータス管理

以下のステータスを管理できます。

- 未着手
- 進行中
- 完了

Enumを利用して管理しています。

---

# 管理者機能

管理者ユーザーは、全ユーザーのタスクを閲覧できます。

## ユーザー検索

Livewireを利用し、リアルタイム検索を実装しています。

- ユーザー名検索
- UUID検索
- 候補一覧表示

## タスク閲覧

検索したユーザーのタスク一覧を表示できます。

また、Dashboardからユーザーをクリックした場合も、同じ検索画面・同じUIへ遷移する構成にしています。

---

# 認可制御

Policyを利用し、

- 他ユーザーのタスク編集禁止
- 他ユーザーのタスク削除禁止

を実装しています。

---

# バリデーション

以下の入力チェックを実装しています。

- 必須チェック
- 文字数制限
- 日付形式チェック

FormRequestを利用しています。

---

# UUID採用

ユーザーIDにはUUIDを利用しています。

これにより、連番IDを外部公開しない構成にしています。

---

# 使用技術

| 項目 | 内容 |
|---|---|
| Framework | Laravel 13 |
| Language | PHP |
| Database | MySQL |
| Authentication | Laravel Starter Kit |
| Frontend | Blade / Livewire |
| Environment | Laravel Sail |
| Version Control | Git / GitHub |

---

# 使用ライブラリ

| ライブラリ | 用途 |
|---|---|
| Laravel Livewire | リアルタイム検索 |
| Laravel Breeze / Starter Kit | 認証機能 |

---

# 画面一覧

- ログイン画面
- ユーザー登録画面
- タスク一覧画面
- タスク作成画面
- タスク編集画面
- 管理者検索画面

---

# データベース設計

## usersテーブル

| カラム | 内容 |
|---|---|
| id | UUID |
| name | ユーザー名 |
| email | メールアドレス |
| password | パスワード |

## tasksテーブル

| カラム | 内容 |
|---|---|
| id | タスクID |
| user_id | users.id |
| title | タスクタイトル |
| description | 詳細 |
| status | ステータス |
| due_date | 期限日時 |

---

# 開発環境構築

## リポジトリをclone

```bash
git clone <repository-url>
```

---

## ディレクトリへ移動

```bash
cd task_app
```

---

## コンテナ起動

```bash
./vendor/bin/sail up -d
```

---

## 依存関係インストール

```bash
composer install
npm install
```

---

## 環境変数設定

```bash
cp .env.example .env
```

---

## アプリケーションキー生成

```bash
php artisan key:generate
```

---

## マイグレーション実行

```bash
php artisan migrate
```

---

## フロント起動

```bash
npm run dev
```

---

# 今後の改善予定

- タスク検索機能
- タスク並び替え
- ページネーション
- 管理者ダッシュボード改善
- Tailwind CSS対応
- API化
- テストコード追加

---

# 学習ポイント

このアプリでは以下を重点的に学習しました。

- Laravel MVC
- Eloquent ORM
- 認証 / 認可
- Policy
- Livewire
- UUID設計
- FormRequest
- Blade Component / partial設計
- Laravel Sail