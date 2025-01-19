<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Zwierzę</title>
</head>
<body>
    <h1>Edytuj Zwierzę</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="/pets/{{ $pet['id'] }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="name">Nazwa:</label>
        <input type="text" id="name" name="name" value="{{ $pet['name'] }}" required><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="{{ $pet['status'] }}" required><br>

        <button type="submit">Zapisz zmiany</button>
    </form>

    <a href="/pets">Wróć do listy</a>
</body>
</html>