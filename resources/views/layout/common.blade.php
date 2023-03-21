<DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @yield('pageCss')
</head>
<body>

@yield('header')

<div class="contents">
    <!-- コンテンツ -->
    <div class="main">
        @yield('content')
    </div>

    <!-- 共通メニュー -->
    <div class="sub">
        @yield('submenu')
    </div>
</div>

@yield('footer')
</body>
</html>
