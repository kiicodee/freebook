<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Admin|Freebook</title>
</head>
<body>

    <h1>
        Halo, {{ Auth::user()->name }}
    </h1>

    <a href="logout">Log out</a>
    
</body>
</html>