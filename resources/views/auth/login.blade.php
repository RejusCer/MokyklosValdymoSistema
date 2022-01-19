<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="styles/login.css">
    <title>Mokyklos administravimo sistema</title>
</head>
<body>
    <div class="back">
        <div class="loginbox">
            <div class="text-danger">
                @if (Session::get('fail'))
                    <p>{{ Session::get('fail') }}</p>
                @endif
            </div>
            <h1>Prisijungimas</h1>
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                <div class="chose-type">
                    <div class="login_type">
                        <input class="radio_input" type="radio" value="student" name="type" id="student">
                        <label class="radio_label" for="student">Mokinys</label>
                        <input class="radio_input" type="radio" value="teacher" name="type" id="teacher">
                        <label class="radio_label" for="teacher">Darbuotojas</label>
                    </div>
                    @error('type')
                        <div class="text-danger">Pasirinkite prisijungimo būdą!</div>
                    @enderror
                </div>
                <label for="email">El-paštas @error('email') <span class="text-danger">yra privalomas!</span> @enderror</label>
                <input type="email" name="email" id="email" placeholder="Įveskite el-paštą" value="{{ old('email') }}">
                <label for="password">Slaptažodis @error('password') <span class="text-danger">yra privalomas!</span> @enderror</label>
                <input type="password" name="password" placeholder="Įveskite slaptažodį">
                <input type="submit" value="Prisijungti">
            </form>
        </div>
    </div>
</body>
</html>