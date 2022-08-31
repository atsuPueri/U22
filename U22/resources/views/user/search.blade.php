
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/userMenu.css">
    <link rel="stylesheet" href="../css/search.css">
    <title>検索画面</title>
</head>
<body>
    <header>
        <h1 class="visuallyhidden">検索画面</h1>
        <form action="./search_result" method="GET" class="search_container">
            <input type="text" name="shop_name" placeholder="店舗名を入力してください">
            <button type="submit">
                <img src="../img/parts/search.png" alt="">
            </button>
        </form>
    </header>
    <main>
        <article id="history">
            <h2>過去に訪れた店舗</h2>
            <ul>
                @foreach($data as $content)
                <li>
                    <img src="{{asset('storage/images/user/'.$content['img'])}}" alt="アイコン">
                    <h3>{{$content['name']}}</h3>
                    <p>{{$content['subName']}}</p>
                </li>
                @endforeach
            </ul>
        </article>
    </main>
    <footer>
    {{view('/user/userMenu', [
        'menu' => [
            'chat' => ['img' => 'chat.png', 'name' => 'notCheck'],
            'search' => ['img' => 'searchCheck.png', 'name' => 'check'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]
    ])}}
    </footer>
</body>
</html>
