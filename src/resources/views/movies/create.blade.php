<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Movies</h1>
    <form action="{{ route('movies.store') }}" method="POST">
        <input type="text" name="title">
        <input type="text" name="published_at">
        <input type="file" name="cover">
        <button type="submit">Save</button>
    </form>
</body>
</html>