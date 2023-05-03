<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
  
    <p>Haga enlance para reestrablecer una nueva contraseña, el link <a href="http://localhost:4200/reset?tab=rm&q={{ $mailData['email'] }}">Link reset</a></p>
</body>
</html>