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

    <div class="shopChat">
        <img src="../img/manager/{{$managerImgName}}" alt="">
        <div class="chatTop">
            <p>{{$shopName}}</p>
            <a href="">{{$comment}}</a>
        </div>
        <div class="commentNumber">
            <p>{{$commentNum}}</p>
        </div>
    </div>

    <?php require_once '../resources/views/user/userMenu.blade.php'; ?>
</body>
</html>