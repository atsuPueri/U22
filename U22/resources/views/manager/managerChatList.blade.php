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

    <div class="userChat">
        <img src="../img/user/{{$userImgName}}" alt="">
        <div class="chatTop">
            <p>{{$userName}}</p>
            <a href="">{{$comment}}</a>
        </div>
        <div class="commentNumber none">
            <p>{{$commentNum}}</p>
        </div>
    </div>
    
    {{require_once('../resources/views/manager/managerMenu.blade.php')}}
</body>
</html>