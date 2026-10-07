<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Email Kamu Ya! 💌</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #fff0f5; /* soft pastel pink */
            background-image: radial-gradient(#ffd1dc 1px, transparent 1px);
            background-size: 20px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #5a4b56;
        }
        .kiowo-card {
            background: #ffffff;
            padding: 2.5rem 2rem;
            border-radius: 24px;
            box-shadow: 0 10px 25px rgba(255, 182, 193, 0.4);
            width: 100%;
            max-width: 420px;
            box-sizing: border-box;
            text-align: center;
            border: 3px solid #ffe4e1;
            position: relative;
        }
        .cute-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-15px); }
            60% { transform: translateY(-7px); }
        }
        .kiowo-card h2 {
            margin-top: 0;
            margin-bottom: 1rem;
            color: #ff6b81;
            font-weight: 800;
            font-size: 1.5rem;
        }
        .kiowo-card p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            color: #7a6b76;
        }
        .success-message {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 0.75rem;
            border-radius: 12px;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            border: 1px dashed #a5d6a7;
            font-weight: 600;
        }
        .btn-resend {
            width: 100%;
            padding: 0.8rem;
            background-color: #ff9a9e;
            color: #ffffff;
            border: none;
            border-radius: 999px;
            font-size: 1.1rem;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 154, 158, 0.4);
        }
        .btn-resend:hover {
            background-color: #ff758c;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 117, 140, 0.5);
        }
        .logout-link {
            display: inline-block;
            margin-top: 1.5rem;
            color: #a098a5;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 700;
            transition: color 0.3s ease;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            font-family: 'Nunito', sans-serif;
        }
        .logout-link:hover {
            color: #ff6b81;
            text-decoration: underline;
        }
        .decor {
            position: absolute;
            font-size: 1.5rem;
            opacity: 0.7;
        }
        .decor-1 { top: -15px; left: -15px; transform: rotate(-15deg); }
        .decor-2 { bottom: -10px; right: -10px; transform: rotate(15deg); }
    </style>
</head>
<body>

<div class="kiowo-card">
    <div class="decor decor-1">🌸</div>
    <div class="decor decor-2">✨</div>
    
    <div class="cute-icon">💌</div>
    
    <h2>Yay! Hampir Selesai~</h2>
    
    <p>
        Terima kasih sudah mendaftar! 🎀<br>
        Kami sudah mengirimkan email verifikasi ke alamat email kamu. Tolong cek kotak masuk (atau spam) yaa~
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="success-message">
            Yeay! ✨ Link verifikasi baru sudah dikirim ulang ke email kamu!
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn-resend">
            Kirim Ulang Email 🐾
        </button>
    </form>

    <a href="{{ route('logout') }}" class="logout-link">
        Log Out
    </a>
</div>

</body>
</html>
