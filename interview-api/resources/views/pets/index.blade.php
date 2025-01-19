<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Zwierząt</title>
</head>
<body>
    <h1>Lista Zwierząt</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <ul>
        @foreach ($pets as $pet)
            <li>
                <strong>{{ $pet['name'] }}</strong> ({{ $pet['status'] }})
                <a href="/pets/{{ $pet['id'] }}/edit">Edytuj</a>
                <form action="/pets/{{ $pet['id'] }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Usuń</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="/pets/create">Dodaj nowe zwierzę</a>
</body>
</html>