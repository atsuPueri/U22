<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/managerMenu.css">
    <link rel="stylesheet" href="../css/managerProfile.css">
    <title>プロフィール</title>
</head>
<body>

    <header>
        <p>プロフィール</p>
    </header>


    <div id="profile">
        <p id="icon"><img src="{{asset('storage/images/manager/'.$managerImg)}}" alt=""></p>
    

        <div class="item">
            <p class="itemName">アカウント名</p>
            <p>鳥貴族</p>
        </div>
        <div class="item">
            <p class="itemName">メールアドレス</p>
            <p>torikizoku@gmail.com</p>
        </div>
    
        <div class="item">
            <p class="itemName">電話番号</p>
            <p>00000000000</p>
        </div>
    
        <div class="item">
            <p class="itemName">住所</p>
            <p>{{$managerAddress}}</p>
        </div>

        <div class="item">
            <p class="itemName">パスワード</p>
            <p>{{$managerPass}}</p>
        </div>
    
    
        <a href="./managerProfileEdit" id="editBtn">編集</a>

        {{view('/manager/managerMenu', [
        'menu' => [
            'chat' => ['img' => 'chat.png', 'name' => 'notCheck'],
            'lostList' => ['img' => 'lost.png', 'name' => 'notCheck'],
            'resume' => ['img' => 'resumeCheck.png', 'name' => 'check']
        ]
    ])}}
    </div>
</body>
</html>