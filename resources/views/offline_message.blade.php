<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offline Message</title>
</head>
<body>
    <form action="/message" method="POST">
        @csrf
        <input type="text" name="to" placeholder="To">
        <input type="text" name="latitude" placeholder="Latitude">
        <input type="text" name="longitude" placeholder="Longitude">
        <input type="submit" value="Submit">
    </form>
</body>
</html>