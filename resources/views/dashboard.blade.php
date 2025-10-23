<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang, {{ auth()->user()->name }}</h1>
    <p>Ini adalah halaman dashboard khusus user yang sudah login.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
