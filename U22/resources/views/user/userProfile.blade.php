<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userMenu.css">
    <link rel="stylesheet" href="../css/userProfile.css">
    <title>プロフィール</title>
</head>
<body>

    <header>
        <p>プロフィール</p>
    </header>


    <div id="profile">
        <p id="icon"><img src="{{asset('storage/images/user/'.$userImg)}}" alt=""></p>


        <div class="item">
            <p class="itemName">アカウント名</p>
            <p>{{$userName}}</p>
        </div>
        <div class="item">
            <p class="itemName">メールアドレス</p>
            <p>{{$userMail}}</p>
        </div>

        <div class="item">
            <p class="itemName">電話番号</p>
            <p>{{$userTell}}</p>
        </div>

        <div class="item">
            <p class="itemName">パスワード</p>
            <p>{{$userPass}}</p>
        </div>

        <a href="./userProfileEdit" id="editBtn">編集</a>
    </div>

    {{view('/user/userMenu', [
        'menu' => [
            'chat' => ['img' => 'chat.png', 'name' => 'notCheck'],
            'search' => ['img' => 'search.png', 'name' => 'notCheck'],
            'resume' => ['img' => 'resumeCheck.png', 'name' => 'check']
        ]
    ])}}
</body>
</html>
