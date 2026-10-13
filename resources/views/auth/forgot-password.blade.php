<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #5c4d5a;
        }

        .kiowo-card {
            background: #ffffff;
            padding: 2.5rem 2rem;
            border-radius: 30px;
            box-shadow: 0 10px 25px rgba(166, 193, 238, 0.4);
            width: 100%;
            max-width: 380px;
            box-sizing: border-box;
            text-align: center;
            position: relative;
        }

        .kiowo-card::before {
            content: "🌸";
            font-size: 3.5rem;
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            text-shadow: 0 4px 10px rgba(255, 154, 158, 0.3);
        }

        .kiowo-card h2 {
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
            color: #ff9a9e;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .kiowo-card p {
            font-size: 0.9rem;
            color: #a0939d;
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #ff9a9e;
            font-weight: 700;
            font-size: 0.9rem;
            padding-left: 0.5rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem 1.2rem;
            border: 2px solid #ffe6e9;
            border-radius: 999px;
            box-sizing: border-box;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
            outline: none;
            transition: all 0.3s ease;
            color: #5c4d5a;
            background-color: #fffafb;
        }

        .form-group input::placeholder {
            color: #d8c8d4;
        }

        .form-group input:focus {
            border-color: #ffb7b2;
            box-shadow: 0 0 0 4px rgba(255, 183, 178, 0.2);
            background-color: #ffffff;
        }

        .form-group input.is-invalid {
            border-color: #ff7675;
            background-color: #fff5f5;
        }

        .error-message {
            color: #ff7675;
            font-size: 0.8rem;
            margin-top: 0.4rem;
            padding-left: 0.5rem;
            font-weight: 600;
        }

        .btn-reset {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 99%, #fecfef 100%);
            color: #ffffff;
            border: none;
            border-radius: 999px;
            font-size: 1.1rem;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(255, 154, 158, 0.4);
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 154, 158, 0.6);
        }

        .btn-reset:active {
            transform: translateY(0);
        }

        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #a6c1ee;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #ff9a9e;
        }

        .alert-success {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 0.75rem 1rem;
            border-radius: 999px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            text-align: center;
            font-weight: 600;
        }

        .alert-error {
            background-color: #ffebee;
            color: #c62828;
            padding: 0.75rem 1rem;
            border-radius: 999px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="kiowo-card">
        <h2>Lupa Password?</h2>
        <p>Tenang saja! Masukkan email kamu dan kami akan mengirimkan link reset ✨</p>

        @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @elseif (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email 💌</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="@error('email') is-invalid @enderror" placeholder="email.gemes@example.com" required
                    autofocus>

                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-reset">Send Reset Link 🎀</button>
        </form>

        <a href="/login" class="back-link">← Kembali ke Login</a>
    </div>

</body>

</html>
