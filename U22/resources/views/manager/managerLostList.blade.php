<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U22</title>
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/lostList.css">
    <link rel="stylesheet" href="../css/managerMenu.css">
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
                <p>拾得日時</p>
                <p>忘れ物名</p>
                <p>種類名</p>
                <p class="state">有無</p>
            </div>

            {{-- 忘れ物個別表示 --}}
            {{-- 繰り返し処理 Start --}}
                @foreach($data as $value)
                    {{-- id番目のデータへ画面遷移 --}}
                    <a href="./managerLostDetail?id={{$value["id"];}}">
                        <div class="">
                            <p>{{$value["date"];}}</p>
                            <p>{{$value["name"];}}</p>
                            <p>{{$value["genre"];}}</p>
                            <p class="state">{{$value["state"];}}</p>
                        </div>
                    </a>
                @endforeach
            {{-- 繰り返し処理 End --}}
        </div>

        <a href="./item_regi" id="registerBtn">忘れ物登録</a>
    </main>
    {{view('/manager/managerMenu', [
        'menu' => [
            'chat' => ['img' => 'chat.png', 'name' => 'notCheck'],
            'lostList' => ['img' => 'lostCheck.png', 'name' => 'check'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]
    ])}}
</body>
</html>
