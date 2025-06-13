<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>PerpusKU | Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: linear-gradient(135deg, #4e73df, #224abe);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .main {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        .login-box {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 25px rgba(34, 74, 190, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }
        .login-box:hover {
            box-shadow: 0 12px 40px rgba(34, 74, 190, 0.45);
        }

        form div + div {
            margin-top: 1.25rem;
        }

        label.form-label {
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95rem;
        }

        input.form-control {
            border-radius: 8px;
            border: 1.5px solid #ced4da;
            padding: 10px 12px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        input.form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 6px rgba(78, 115, 223, 0.5);
            outline: none;
        }

        button.btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            font-weight: 600;
            padding: 0.65rem;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }
        button.btn-primary:hover {
            background-color: #3b57b2;
            border-color: #3b57b2;
        }

        .alert-danger {
            margin-bottom: 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .text-center {
            margin-top: 1.25rem;
            font-size: 0.9rem;
            color: #555;
        }
        .text-center a {
            color: #4e73df;
            text-decoration: none;
            font-weight: 600;
        }
        .text-center a:hover {
            text-decoration: underline;
            color: #3b57b2;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="login-box">
            @if(session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <form action="" method="post" novalidate>
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        id="username"
                        placeholder="Masukkan username"
                        required
                        autofocus
                    />
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                        placeholder="Masukkan password"
                        required
                    />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </div>
                <div class="text-center">
                    Belum punya akun? <a href="register">Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
