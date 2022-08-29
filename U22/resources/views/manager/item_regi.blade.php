<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/item_regi.css">
    <title>落とし物登録</title>
</head>
<body>
    <main>
        <h1>忘れ物登録</h1>
        <article>
            <h2 class="visuallyhidden">忘れ物</h2>
            <form action="#">
                <section id="image">
                    <h3>写真</h3>
                    <label for="image1">
                        <img src="../img/image.png" alt="忘れ物１">
                        <input type="file" name="" id="image1">
                    </label>
                    <label for="image2">
                        <img src="../img/image.png" alt="忘れ物２">
                        <input type="file" name="" id="image2">
                    </label>
                    <label for="image3">
                        <img src="../img/image.png" alt="忘れ物３">
                        <input type="file" name="" id="image3">
                    </label>
                    <label for="image4">
                        <img src="../img/image.png" alt="忘れ物４">
                        <input type="file" name="" id="image4">
                    </label>
                </section>
                <section id="category">
                    <h3>カテゴリ</h3>
                    <select name="" id="">
                        <option value="" selected>選択してください</option>
                        <option value="">傘</option>
                        <option value="">財布</option>
                    </select>
                </section>
                <section id="date">
                    <h3>日付</h3>
                    <select name="" id="">
                        <option value="" selected>----</option>
                        <option value="">2020</option>
                        <option value="">2021</option>
                        <option value="">2022</option>
                    </select>
                    年
                    <select name="" id="">
                        <option value="" selected>--</option>
                        <option value="">01</option>
                        <option value="">02</option>
                        <option value="">12</option>
                    </select>
                    月
                    <select name="" id="">
                        <option value="" selected>--</option>
                        <option value="">01</option>
                        <option value="">02</option>
                        <option value="">31</option>
                    </select>
                    日
                </section>
                <section id="time">
                    <h3>時間</h3>
                    <select name="" id="">
                        <option value="" selected>--</option>
                        <option value="">0</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">24</option>
                    </select>
                    時
                    <select name="" id="">
                        <option value="" selected>--</option>
                        <option value="">00</option>
                        <option value="">01</option>
                        <option value="">02</option>
                        <option value="">59</option>
                    </select>
                    分
                </section>
                <section id="detail">
                    <h3>特徴</h3>
                    <textarea name="" id="" cols="30" rows="10" placeholder="特徴を書いてください"></textarea>
                </section>
                <button type="submit">確認画面へ</button>
            </form>  
        </article>
    </main>
</body>
</html>