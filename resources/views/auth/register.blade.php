<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
</head>
<body>
    <h1>Registrasi Akun</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf
        <label for="name">Nama:</label><br>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required><br><br>

        <label for="password">Password:</label><br>
        <input id="password" name="password" type="password" required><br><br>

        <label for="password_confirmation">Konfirmasi Password:</label><br>
        <input id="password_confirmation" name="password_confirmation" type="password" required><br><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
