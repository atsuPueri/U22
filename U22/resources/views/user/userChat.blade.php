<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userChat.css">
    <title>チャット</title>
</head>
<body>
    <header>
        <a href="./userChatList">戻る</a>
        <p><img src="../img/manager/{{$managerImgName}}" alt="">{{$managerName}}</p>
    </header>
    
    <div id="chat">
        @foreach ($chat as $content)
        @if($content['who'] == 'userImgComment')
        <p class="{{$content['who']}}"><img src="../img/user/{{$content['comment']}}" alt=""></p>
        @elseif($content['who'] == 'managerImgComment')
        <p class="{{$content['who']}}"><img src="../img/manager/{{$content['comment']}}" alt=""></p>
        @else
        <p class="{{$content['who']}}">{{$content['comment']}}</p>
        @endif
        @endforeach
        <p id="dummyComment"></p>
    </div>


    <div id="chatForm">
        <form action="./userChat">
            <input type="file" name="chatImg" id="chatImg">
            <input type="text" name="chatComment" id="chatComment" value="{{$input}}">
            <button type="submit">送信</button>
        </form>
    </div>

    <script src="../js/chat.js"></script>
</body>
</html>