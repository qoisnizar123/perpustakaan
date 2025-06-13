<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>PerpusKU | Register</title>
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

        .register-box {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 25px rgba(34, 74, 190, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }
        .register-box:hover {
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

        input.form-control,
        textarea.form-control {
            border-radius: 8px;
            border: 1.5px solid #ced4da;
            padding: 10px 12px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        input.form-control:focus,
        textarea.form-control:focus {
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

        .alert-danger, .alert-success {
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
        <div class="register-box">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
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
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input
                        type="text"
                        name="no_telepon"
                        class="form-control"
                        id="no_telepon"
                        placeholder="Masukkan nomor telepon"
                        required
                    />
                </div>
                <div>
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea
                        name="alamat"
                        id="alamat"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan alamat lengkap"
                        required
                    ></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </div>
                <div class="text-center">
                    Sudah Punya Akun? <a href="/login">Masuk</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
