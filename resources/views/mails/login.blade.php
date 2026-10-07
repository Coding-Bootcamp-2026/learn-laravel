<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Login 🕵️‍♂️</title>
    <style>
        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Marker Felt', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-top: 5px solid #ff6b6b;
        }
        .header {
            text-align: center;
            font-size: 24px;
            color: #ff6b6b;
            margin-bottom: 20px;
        }
        .content {
            font-size: 16px;
        }
        .data-box {
            background-color: #fff0f0;
            border-left: 4px solid #ff6b6b;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .data-box ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .data-box li {
            margin-bottom: 10px;
        }
        .data-box strong {
            color: #d63031;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #ff4757;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            🚨 Wiu Wiu Wiu! Ada yang Masuk! 🚨
        </div>
        <div class="content">
            <p>Halo <strong>{{ $userName ?? 'Bosque' }}</strong>! 👋</p>
            <p>Sistem keamanan super canggih kami (yang cuma diawasi oleh hamster berlari di roda) mendeteksi ada aktivitas login ke akun kamu nih. 🐹💨</p>

            <p>Apakah ini kamu yang lagi nyamar, atau ada alien yang coba bajak akunmu? Berikut buktinya:</p>

            <div class="data-box">
                <ul>
                    <li>🕵️‍♂️ <strong>Tersangka:</strong> {{ $user->name ?? 'Anonim' }}</li>
                    <li>🌍 <strong>Alamat IP:</strong> {{ $ip ?? '127.0.0.1' }} (Dari planet mana hayo?)</li>
                    <li>⏰ <strong>Waktu Kejadian:</strong> {{ $time ?? now()->format('d M Y, H:i:s') }}</li>
                    <li>💻 <strong>Senjata (OS/Browser):</strong> {{ $browser ?? 'Kalkulator' }}</li>
                </ul>
            </div>

            <p>Kalau ini memang kamu, mantap deh! Silakan lanjutkan petualanganmu di aplikasi kami. 🚀</p>
            <p>Tapi... kalau kamu merasa lagi rebahan santai dan gak login sama sekali, <strong>BURUAN GANTI PASSWORD!</strong> Jangan biarkan alien itu mengambil alih! 👽</p>

            <div style="text-align: center;">
                <a href="{{ url('/password/reset') }}" class="btn">Amankan Akun Sekarang! 🛡️</a>
            </div>
        </div>
        <div class="footer">
            <p>Email ini dikirim otomatis oleh robot kesayanganmu. Jangan dibalas ya, dia pemalu. 🤖❤️</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
