<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/managerMenu.css">
    <link rel="stylesheet" href="../css/managerChatList.css">
    <title>チャット一覧</title>
</head>
<body>
    <header>
        <p>チャット一覧</p>
    </header>

        @foreach ($chatList as $list)
        <div class="userChat">
            <img src="../img/user/{{$list['userImgName']}}" alt="">
            <div class="chatTop">
                <p>{{$list['userName']}}</p>
                <p class="newComment">{{$list['comment']}}</p>
            </div>
            <div class="commentNumber none">
                <p>{{$list['commentNum']}}</p>
            </div>
            <a href="./managerChat?userId={{$list['userId']}}"></a>
        </div>
        @endforeach

    {{view('/manager/managerMenu', [
        'menu' => [
            'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
            'lostList' => ['img' => 'lost.png', 'name' => 'notCheck'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]
    ])}}
</body>
</html>
