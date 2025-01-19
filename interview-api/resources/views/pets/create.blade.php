<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Zwierzę</title>
</head>
<body>
    <h1>Dodaj Zwierzę</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="/pets" method="POST">
        @csrf
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <label for="name">Nazwa:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br>

        <button type="submit">Dodaj</button>
    </form>

    <a href="/pets">Wróć do listy</a>
</body>
</html>