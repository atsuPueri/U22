<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/item_confirm.css">
    <title>登録確認</title>
</head>
<body>
    <main>
        <h1>忘れ物登録</h1>
        <p>以下の内容で登録してよろしいでしょうか</p>
        <article>
            <h2 class="visuallyhidden">忘れ物の内容</h2>
        </article>

        <section id="category">
            <h3>カテゴリー</h3>
            <p>傘</p>
        </section>
        <section id="date">
            <h3>日付</h3>
            <p>2022年　12月　31日</p>
        </section>
        <section id="time">
            <h3>時刻</h3>
            <p>24時　59分</p>
        </section>
        <section id="detail">
            <h3>特徴</h3>
            <p>大きくて黒色。絵の部分が木でできている。</p>
        </section>
        <form action="./item_confirm" method="POST">
            @csrf
            <button type="submit" name="btn" value="back">戻る</button>
            <button type="submit" name="btn" value="on">登録</button>
        </form>
    </main>
</body>
</html>
