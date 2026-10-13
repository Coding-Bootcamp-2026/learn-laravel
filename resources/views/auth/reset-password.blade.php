<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Font Garang: Oswald -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Oswald', sans-serif;
            background-color: #000000;
            background-image: 
                radial-gradient(circle at 50% 50%, #2a0000 0%, #000000 80%),
                linear-gradient(45deg, #000 25%, transparent 25%, transparent 75%, #000 75%, #000), 
                linear-gradient(45deg, #000 25%, transparent 25%, transparent 75%, #000 75%, #000);
            background-size: 100% 100%, 20px 20px, 20px 20px;
            background-position: 0 0, 0 0, 10px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #ffffff;
        }

        .garang-container {
            position: relative;
            width: 100%;
            max-width: 450px;
            padding: 20px;
            box-sizing: border-box;
        }

        .garang-card {
            background: #0a0a0a;
            padding: 3rem 2.5rem;
            border: 3px solid #ff0000;
            box-shadow: 
                0 0 20px rgba(255, 0, 0, 0.4), 
                inset 0 0 30px rgba(255, 0, 0, 0.1);
            position: relative;
            z-index: 10;
            text-align: center;
            text-transform: uppercase;
        }

        /* Dekorasi sudut tajam ala UI sci-fi/brutalist */
        .garang-card::before, .garang-card::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            border: 4px solid #ff0000;
            z-index: 20;
            transition: all 0.3s ease;
        }
        
        .garang-card::before {
            top: -6px;
            left: -6px;
            border-right: none;
            border-bottom: none;
        }

        .garang-card::after {
            bottom: -6px;
            right: -6px;
            border-left: none;
            border-top: none;
        }

        .garang-card:hover::before, .garang-card:hover::after {
            border-color: #ff3333;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
        }

        .garang-icon {
            font-size: 4rem;
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 0 0 15px rgba(255, 0, 0, 0.8);
            animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {
            0% { text-shadow: 0 0 10px rgba(255, 0, 0, 0.8); transform: scale(1); }
            50% { text-shadow: 0 0 30px rgba(255, 0, 0, 1); transform: scale(1.05); }
            100% { text-shadow: 0 0 10px rgba(255, 0, 0, 0.8); transform: scale(1); }
        }

        .garang-card h2 {
            margin: 0 0 0.5rem 0;
            color: #ffffff;
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-shadow: 3px 3px 0px #aa0000;
        }

        .garang-card p {
            font-size: 0.95rem;
            color: #999999;
            margin-bottom: 2rem;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #ff3333;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 1.5px;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            background-color: #000000;
            border: 2px solid #330000;
            color: #ffffff;
            box-sizing: border-box;
            font-size: 1.1rem;
            font-family: 'Oswald', sans-serif;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input::placeholder {
            color: #444444;
        }

        .form-group input:focus {
            border-color: #ff0000;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
            background-color: #050000;
        }

        .form-group input.is-invalid {
            border-color: #ff0000;
            background-color: #1a0000;
            box-shadow: inset 0 0 10px rgba(255, 0, 0, 0.3);
        }

        .error-message {
            color: #ff3333;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            font-weight: 700;
            text-shadow: 0 0 5px rgba(255,0,0,0.5);
        }

        .btn-reset {
            width: 100%;
            padding: 1rem;
            background: #ff0000;
            color: #ffffff;
            border: none;
            font-size: 1.3rem;
            font-weight: 700;
            font-family: 'Oswald', sans-serif;
            letter-spacing: 2px;
            cursor: pointer;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.4);
            transition: all 0.2s ease;
            margin-top: 1rem;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-reset::before {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }

        .btn-reset:hover {
            background: #cc0000;
            box-shadow: 0 0 25px rgba(255, 0, 0, 0.8);
            transform: scale(1.03);
        }

        .btn-reset:hover::before {
            left: 100%;
        }

        .btn-reset:active {
            transform: scale(0.97);
        }
    </style>
</head>
<body>

<div class="garang-container">
    <div class="garang-card">
        <div class="garang-icon">💀</div>
        <h2>REFORGE PASSWORD</h2>
        <p>BUKTIKAN KEKUATANMU. GANTI SANDI SEKARANG!</p>

        @if (session('status'))
            <div style="background-color: #2a0000; border: 1px solid #ff0000; color: #ff3333; padding: 0.8rem; margin-bottom: 1.5rem; font-size: 0.95rem; font-weight: 700; letter-spacing: 1px; text-align: center;">
                ⚠️ {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <!-- Token wajib untuk proses reset password Laravel -->
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">ALAMAT EMAIL</label>
                <input type="email" name="email" id="email" value="{{ old('email', $email ?? request()->email) }}" class="@error('email') is-invalid @enderror" placeholder="TARGET@EMAIL.COM" required autofocus>
                
                @error('email')
                    <div class="error-message">⚠️ {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">PASSWORD BARU</label>
                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" placeholder="MASUKKAN PASSWORD SUPER KUAT" required>
                
                @error('password')
                    <div class="error-message">⚠️ {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">KONFIRMASI PASSWORD</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" placeholder="ULANGI PASSWORD" required>
                @error('password_confirmation')
                    <div class="error-message">⚠️ {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-reset">RESET PASSWORD 🔥</button>
        </form>
    </div>
</div>

</body>
</html>
