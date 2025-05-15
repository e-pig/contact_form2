@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-links')
    <li class="header-nav__item">
        <a href="/logout" class="header-nav__link">Logout</a>
    </li>
@endsection

@section('content')
    <div class="admin-content">
        <h2 class="admin-title">Admin</h2>

        <!-- フィルター部分 -->
        <div class="filter">
            <form action="#" method="GET">
                <input type="text" name="search" placeholder="名前やメールアドレスを入力してください" class="filter-input">

                <select name="gender" id="gender" class="filter-select">
                    <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>性別</option>
                    <!-- デフォルトで「性別」を選択表示 -->
                    <option value="全て" {{ old('gender') == '全て' ? 'selected' : '' }}>全て</option>
                    <option value="男性" {{ old('gender') == '男性' ? 'selected' : '' }}>男性</option>
                    <option value="女性" {{ old('gender') == '女性' ? 'selected' : '' }}>女性</option>
                    <option value="その他" {{ old('gender') == 'その他' ? 'selected' : '' }}>その他</option>
                </select>

                <!-- お問い合わせの種類 -->
                <select name="inquiry" class="filter-select">
                    <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>お問い合わせの種類</option>
                    <option value="product_shipment">商品のお届けについて</option>
                    <option value="product_exchange">商品の交換について</option>
                    <option value="product_trouble">商品トラブル</option>
                    <option value="contacts">ショップへのお問い合わせ</option>
                    <option value="other">その他</option>
                </select>

                <!-- 日付 -->
                <input type="date" name="contact_date" class="filter-date">

                <button type="submit" class="filter-button">検索</button>
                <button type="reset" class="filter-button reset" onclick="window.location.href='{{ route('admin') }}'">リセット</button>
            </form>
        </div>

        <!-- ページネーション -->
        <div class="pagination">
            {{ $contacts->links() }}
        </div>
        <!-- モーダルウィンドウ -->
        <div id="modal" style="display: none;">
            <div>
                <h2>詳細</h2>
                <div id="contactDetails"></div>
                <button onclick="closeModal()">閉じる</button>
            </div>
        </div>

        <script>
            function showModal(contactId) {
                fetch(`/contacts/${contactId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('contactDetails').innerHTML = data.details;
                        document.getElementById('modal').style.display = 'block';
                    });
            }

            function closeModal() {
                document.getElementById('modal').style.display = 'none';
            }
        </script>
    </div>


@endsection
