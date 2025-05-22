<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionably Late - 登録</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="site-title">Fashionably Late</h1>
        </header>
        
        <main>
            <div class="form-container">
                <h2 class="form-title">Login</h2>
                
                <form method="POST" action="/login" novalidate>
                    @csrf
                    
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" id="email" name="email" placeholder="例: test@example.com" required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" id="password" name="password" placeholder="例: coachtech1106" required>

                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="login-button">ログイン</button>
                    </div>
                </form>
                
                <div class="register-link">
                    <p>アカウントをお持ちでない方は<a href="{{ route('register') }}">register</a></p>
                </div>
            </div>
        </main>
        
        <footer>
            <p>&copy; {{ date('Y') }} Fashionably Late. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>