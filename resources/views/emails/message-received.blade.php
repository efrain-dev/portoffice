<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mensaje Recibido</title>
</head>
<body>
<p>Recibiste un mensaje de:  {{$msg['name']}} - {{$msg['email']}} </p>
<p><strong>Asunto:</strong>{{$msg['subject']}}</p>
<p><strong>Contenido:</strong>{{$msg['mensaje']}}</p>
</body>
</html>


