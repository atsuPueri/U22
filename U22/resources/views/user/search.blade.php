
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/search.css">
    <title>検索画面</title>
</head>
<body>
    <header>
        <h1 class="visuallyhidden">検索画面</h1>
        <form action="#" class="search_container">
            <input type="text" placeholder="店舗名を入力してください">
            <button type="submit">
                <img src="../img/虫眼鏡のアイコン.png" alt="">
            </button>
        </form>
    </header>
    <main>
        <article id="history">
            <h2>過去に訪れた店舗</h2>
            <ul>
                <li>
                    <img src="../img/torikizoku_icon.jpeg" alt="">
                    <h3>{{$storeName}}</h3>
                    <p>梅田DDハウス店</p>
                </li>
                <li>
                    <img src="../img/torikizoku_icon.jpeg" alt="">
                    <h3>鳥貴族</h3>
                    <p>中崎町店</p>
                </li>
                <li>
                    <img src="../img/torikizoku_icon.jpeg" alt="">
                    <h3>鳥貴族</h3>
                    <p>阪急東通り2号店</p>
                </li>
                <li>
                    <img src="../img/torikizoku_icon.jpeg" alt="">
                    <h3>鳥貴族</h3>
                    <p>阪急東通り3号店</p>
                </li>
            </ul>
        </article>
    </main>
    <footer>
    <?php
        require_once("./views/userMenu.blade.php");
    ?>
    </footer>
</body>
</html>