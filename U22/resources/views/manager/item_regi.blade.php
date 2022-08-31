<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/item_regi.css">
    <title>落とし物登録</title>
</head>
<body>
    <main>
        <h1>忘れ物登録</h1>
        <article>
            <h2 class="visuallyhidden">忘れ物</h2>
            <form action="./item_confirm" method="POST">
                @csrf

                <section id="category">
                    <h3>カテゴリ</h3>
                    <select name="category" id="">
                        @foreach ($category as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                </section>

                <section id="date">
                    <h3>日付</h3>
                    <input type="date" name="date">
                <section id="time">
                    <h3>時間</h3>
                    <select name="h" id="">
                        <option value="01" selected>01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    時
                    <select name="i" id="">
                        <option value="00" selected>00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                    分
                </section>

                {{-- あつが追加したのでレイアウト崩れてるかも --}}
                <section>
                    <p>現金がいくらあったか なければ記載不要</p>
                    <input type="number" name="price" id="price">
                </section>

                <section id="detail">
                    <h3>特徴</h3>
                    <textarea name="feature" id="" cols="30" rows="10" placeholder="特徴を書いてください"></textarea>
                </section>
                <button type="submit">確認画面へ</button>
            </form>
        </article>
    </main>
</body>
</html>
