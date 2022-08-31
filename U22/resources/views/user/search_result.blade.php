<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/userMenu.css">
    <link rel="stylesheet" href="../css/search_result.css">
    <title>検索結果</title>
</head>
<body>
    <header>
        <h1 class="visuallyhidden">検索結果画面</h1>
        <form action="#" class="search_container">
            <input type="text" placeholder="店舗名を入力してください">
            <button type="submit">
                <img src="../img/parts/search.png" alt="">
            </button>
        </form>
    </header>
    <main>
        <article id="result">
            <h2 class="visuallyhidden">検索結果</h2>
            <ul>
            @foreach($data as $content)
                <li>
                    <img src="{{asset('storage/images/user/'.$content['img'])}}" alt="アイコン">
                    <h3>{{$content['name']}}</h3>
                    <p>{{$content['address']}}</p>
                    <p>{{$content['address2']}}</p>
                    <p><a href="./userLostList?managerId={{$content['managerId']}}"></a></p>
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