<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userMenu.css">
    <link rel="stylesheet" href="../css/userChatList.css">
    <title>チャット一覧</title>
</head>
<body>
    <header>
        <p>チャット一覧</p>
    </header>
    @foreach ($chatList as $list)
    <div class="shopChat">
        <img src="../img/manager/{{$list['managerImgName']}}" alt="">
        <div class="chatTop">
            <p>{{$list['shopName']}}</p>
            <p class="newComment">{{$list['comment']}}</p>
        </div>
        <div class="commentNumber">
            <p>{{$list['commentNum']}}</p>
        </div>
        <a href="./userChat?managerId={{$list['managerId']}}"></a>
    </div>
    @endforeach

    {{view('/user/userMenu', [
        'menu' => [
            'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
            'search' => ['img' => 'search.png', 'name' => 'notCheck'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]
    ])}}
</body>
</html>