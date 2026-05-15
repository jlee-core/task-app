# Task App

Laravel 13を用いて作成した、業務タスク管理アプリです。

ログインユーザーが自身の業務タスクを登録し、進捗状況や期限を管理できます。

---

# アプリ概要

社内メンバー向けのタスク管理アプリです。

ユーザーごとにタスクを管理し、認証・認可を利用して「自分のタスクのみ操作できる」構成になっています。

---

# 主な機能

## 認証機能

- ユーザー登録
- ログイン
- ログアウト

Laravel 13 Starter Kitを利用しています。

---

## タスク管理機能

- タスク一覧表示
- タスク詳細表示
- タスク登録
- タスク編集
- タスク削除

---

## ステータス管理

以下のステータスを管理できます。

- 未着手
- 進行中
- 完了

---

## 認可制御

Policyを利用し、他ユーザーのタスクを編集・削除できないよう制御しています。

---

## バリデーション

以下のような入力チェックを実装しています。

- 必須チェック
- 文字数制限
- 日付形式チェック

---

# 使用技術

| 項目 | 内容 |
|---|---|
| Framework | Laravel 13 |
| Language | PHP |
| Database | MySQL |
| Authentication | Laravel Starter Kit |
| Frontend | Blade |
| Environment | Laravel Sail |
| Version Control | Git / GitHub |

---

# 開発環境構築

## リポジトリをclone

```bash
git clone <repository-url>