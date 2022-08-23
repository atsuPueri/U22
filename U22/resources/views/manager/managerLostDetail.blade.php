<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U22</title>
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/lostDetail.css">
</head>
<body>
    {{-- 忘れ物詳細 --}}
    <h1>詳細</h1>
    <main>
        {{-- 何もなければ戻る --}}
        <a href="./manager">戻る</a>
        <h2>{{ $data["name"] }}</h2>
        <img src="http://placehold.jp/350x350.png" alt="ダミー画像">
        <form action="#" method="POST">
            <dl>
                <dt>カテゴリー</dt>
                {{-- ここにカテゴリが入る --}}
                <dd>{{ $data["genre"] }}</dd>

                <dt>日付</dt>
                    <dd>
                    {{-- ここに日付が入る --}}
                    {{-- 年月日に分割 --}}
                    <input type="text" name="" id="" value="{{ substr($data["date"], 0,4) }}" readonly>年
                    <input type="text" name="" id="" value="{{ substr($data["date"], 4,2) }}" readonly>月
                    <input type="text" name="" id="" value="{{ substr($data["date"], 6,2) }}" readonly>日
                </dd>

                <dt>時間</dt>
                <dd>
                    {{-- ここに時間が入る --}}
                    {{-- ここに時分に分割 --}}
                    <input type="text" name="" id="" value="{{ substr($data["date"], 8,2) }}" readonly>時
                    <input type="text" name="" id="" value="{{ substr($data["date"], 10,2) }}" readonly>分
                </dd>
                <dt>特徴</dt>
                {{-- 特徴 --}}
                <textarea name="" id="" cols="30" rows="5" readonly></textarea>

            </dl>

            <label class="findChk">
                <input type="checkbox" name="" id="">持ち主がみつかりました。
            </label>
        </form>
        {{-- 持ち主が見つかった --}}
        <button type="submit">完了</button>
    </main>
</body>
</html>
