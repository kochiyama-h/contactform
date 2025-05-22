<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionably Late - 管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1>Fashionably Late</h1>
            <h2>Admin</h2>
            <div class="logout-container">
                <a href="{{ route('logout') }}" class="logout-btn"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>

        <div class="search-container">
            <form action="" method="GET">
                <div class="search-row">
                    <div class="search-group">
                        <input type="text" name="search" placeholder="名前やメールアドレスを入力してください" value="{{ request('search') }}">
                    </div>
                    <div class="search-group">
                        <select name="gender">
                            <option value="">性別</option>
                            <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
                            <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
                            <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
                        </select>
                    </div>
                    <div class="search-group">
                        <select name="inquiry_type">
                            <option value="">お問い合わせの種類</option>
                            <option value="商品の交換について" {{ request('inquiry_type') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
                            <option value="返品について" {{ request('inquiry_type') == '返品について' ? 'selected' : '' }}>返品について</option>
                            <option value="商品について" {{ request('inquiry_type') == '商品について' ? 'selected' : '' }}>商品について</option>
                            <option value="その他" {{ request('inquiry_type') == 'その他' ? 'selected' : '' }}>その他</option>
                        </select>
                    </div>
                    <div class="search-group">
                        <input type="date" name="date" value="{{ request('date') }}" placeholder="年/月/日">
                    </div>
                </div>
                <div class="button-row">
                    <button type="submit" class="search-btn">検索</button>
                    <button type="reset" class="reset-btn">リセット</button>
                    <a href="" class="export-btn">エクスポート</a>
                </div>
            </form>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inquiries ?? [] as $inquiry)
                    <tr>
                        <td>{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->gender }}</td>
                        <td>{{ $inquiry->email }}</td>
                        <td>{{ $inquiry->inquiry_type }}</td>
                        <td><a href="" class="detail-btn">詳細</a></td>
                    </tr>
                    @endforeach
                    
                    <!-- サンプルデータ（実際の実装時は削除してください） -->
                    @if(empty($inquiries ?? []))
                    @for($i = 0; $i < 7; $i++)
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><a href="#" class="detail-btn">詳細</a></td>
                    </tr>
                    @endfor
                    @endif
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <a href="#" class="page-nav">&lt;</a>
            <a href="#" class="page-number active">1</a>
            <a href="#" class="page-number">2</a>
            <a href="#" class="page-number">3</a>
            <a href="#" class="page-number">4</a>
            <a href="#" class="page-number">5</a>
            <a href="#" class="page-nav">&gt;</a>
        </div>
    </div>
</body>
</html>