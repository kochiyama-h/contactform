<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録 - Fashionably Late</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="site-title">Fashionably Late</h1>
            
            <div class="login-link">
                <a href="{{ route('login') }}">login</a>
            </div>
            
            <form method="POST" action="/register" novalidate>
                @csrf
                
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="例:山田 太郎">
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="例: test@example.com">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" name="password" required placeholder="例:coachtech1106">
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">パスワード（確認）</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="register-button">登録</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>