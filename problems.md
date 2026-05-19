# ユーザーオンライン状態管理 実装まとめ

## 結論

以前は `personal_access_tokens` の有無でログイン状態を判定していたが、この方法では正しくユーザーのオンライン状態を管理できなかった。

そのため、現在は `last_seen_at` を利用し、「最後にアクセスした時間」で online / offline を判定する方式へ改善した。

---

# 以前の問題点

以前は以下の考え方で実装していた。

- token が存在する
- ＝ ログイン中

しかし、この方法には問題があった。

## 1. token はログイン状態そのものではない

`personal_access_tokens` は API 認証用の情報であり、オンライン状態を管理するためのものではない。

例えば、

- アプリを閉じた
- ブラウザを閉じた
- 長時間操作していない

場合でも token が残っていれば「ログイン中」と判定されてしまう。

---

## 2. 複数端末に対応できない

Sanctum の token は端末ごとに複数発行できる。

例えば、

- iPhone
- Mac
- Postman

それぞれ別 token を持つ。

そのため、1つの端末だけログアウトしても他の token は残る。

つまり、

「token がある = user 全体がログイン中」

とは言えない。

---

## 3. session 認証と整合性が取れない

現在の Laravel Breeze / Volt のログインは session 認証を使用している。

つまり実際のログイン状態は、

- session
- cookie
- Auth::check()

によって管理されている。

そのため、

- session ではログイン中
- でも token は存在しない

という状態が発生する。

---

# Laravel の認証の仕組み

Laravel の認証は、

「現在の request に有効な認証情報があるか」

で判定される。

## Session 認証

ブラウザが cookie を送信し、Laravel が session から user を復元する。

その結果、

`Auth::check()`

が true になる。

---

## Token 認証

API request の Bearer token を利用して user を特定する。

その結果、

`Auth::check()`

が true になる。

---

# 改善後の実装

## 方針

現在は token の有無ではなく、

「最後にアクセスした時間」

を利用して online / offline を判定している。

---

# 実装内容

## 1. users テーブルへ last_seen_at を追加

ユーザーの最終アクセス時間を保存するカラムを追加した。

---

## 2. middleware を作成

認証済み request が来るたびに、

`last_seen_at`

を現在時刻へ更新する middleware を作成した。

---

## 3. Laravel 13 の middleware 登録

Laravel 13 では `Kernel.php` ではなく、

`bootstrap/app.php`

で middleware を登録する。

そのため、

- web middleware
- api middleware

両方へ追加した。

---

## 4. online / offline 判定

現在は、

「5分以内にアクセスがあったか」

を基準に online / offline を判定している。

---

# 改善後のメリット

## 1. session と token の両方に対応

- Web
- API
- SPA
- Mobile app

すべて共通で扱えるようになった。

---

## 2. 実際の利用状況に近い

以前は、

「token が残っている」

だけでログイン中と判定していた。

現在は、

「最近アクセスした」

ことを基準に判定しているため、実際のオンライン状態に近くなった。

---

## 3. 実務に近い実装

Discord や Slack などでも、

「最後に活動した時間」

を利用して online 状態を管理している。

---

# 今回学んだこと

- token は online 状態管理用ではない
- Laravel の認証は request ごとに判定される
- session 認証と token 認証は別物
- `Auth::check()` は現在の request の認証状態を判定している
- 実務では `last_seen_at` を利用した online 管理が一般的