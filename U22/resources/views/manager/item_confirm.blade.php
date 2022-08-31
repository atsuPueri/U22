<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/item_confirm.css">
    <title>登録確認</title>
</head>
<body>
    <main>
        <h1>忘れ物登録</h1>
        <p id="title">以下の内容で登録してよろしいでしょうか</p>
        <article>
            <h2 class="visuallyhidden">忘れ物の内容</h2>
        </article>

        <section id="category">
            <h3>カテゴリー</h3>
            <p>{{$data['category']}}</p>
        </section>
        <section id="date">
            <h3>日付</h3>
            <p>{{$data['date']}}</p>
        </section>
        <section id="detail">
            <h3>特徴</h3>
            <p>{{$data['detail']}}</p>
        </section>
        <form action="./item_confirm" method="POST">
            @csrf
            <p><button id="backBtn" type="submit" name="btn" value="back">戻る</button></>
            <p><button id="nextBtn" type="submit" name="btn" value="on">登録</button></>
        </form>
    </main>
</body>
</html>
