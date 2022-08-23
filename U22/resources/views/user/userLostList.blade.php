<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U22</title>
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/lostList.css">
    <link rel="stylesheet" href="../css/userMenu.css">
</head>
<body>
    {{-- 忘れ物一覧 --}}
    <h1>店舗名</h1>
    <main>
        {{-- 月の指定・検索 --}}
        <div id="selectArea">
            <select name="month">
                {{-- 選択月の表示 --}}
                <option value="">---</option>

                {{-- 12月分繰り返し Start --}}
                    @for($i=1; $i<=12; $i++)
                        <option value="{{$i}}">{{$i}}月</option>
                    @endfor
                {{-- 12月分繰り返し End --}}
            </select>
        </div>


        {{-- 忘れ物一覧個別表示 --}}
        <div id="itemArea">
            {{-- 忘れ物表示項目の指定 --}}
            <div>
                {{-- 種類名の表示 --}}
                <select name="genre" >
                    <option value="">---</option>

                    {{-- 種類繰り返し Start --}}
                        @foreach($genre as $item)
                            <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                    {{-- 種類繰り返し End --}}
                </select>

                {{-- 有無の表示 --}}
                <select name="existence" id="existence">
                    <option value="">---</option>
                    <option value="">有</option>
                    <option value="">無</option>
                </select>

            </div>

            {{-- 忘れ物個別表示 --}}
            {{-- 繰り返し処理 Start --}}
                @foreach($data as $value)
                    <h3>{{$value["date"];}}</h3>
                    <div class="">
                        <p><img src="http://placehold.jp/45x45.png" alt="ダミー画像"></p>
                        <p>{{$value["genre"];}}</p>
                        <p class="state">{{$value["state"];}}</p>
                            {{-- チャット画面へ --}}
                        <a href="#" class="chatNavButton">お問い合せ</a>
                    </div>
                @endforeach
            {{-- 繰り返し処理 End --}}
        </div>
    </main>
    {{view('/user/userMenu', [
        'menu' => [
            'chat' => ['img' => 'chat.png', 'name' => 'notCheck'],
            'search' => ['img' => 'searchCheck.png', 'name' => 'check'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]
    ])}}
</body>
</html>
