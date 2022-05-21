
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <div style="width:100% padding:10px;">
        <h2>
            Message de {{$arrMsg['first_name'].' '.$arrMsg['last_name']}} :
        </h2>
        <div>image avec la tete a axel (si j'ai le temp)</div>
        <p>
            {{$arrMsg['content']}}
        </p>
    </div>
    <a href="{{route('message_online',['id'=>$arrMsg['id']])}}"> voir sur le site</a>
    
</body>
</html>