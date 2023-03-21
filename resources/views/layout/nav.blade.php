<nav id="sidebar" class="mt-4 mb-4 col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <a class="list-group-item mt-4 @if(isset($register)){{ $register }}@endif" href="{{ route('registerShow')}}">新規登録</a>
    <a class="list-group-item mb-4 @if(isset($list)){{ $list }}@endif" href="{{ route('profileList')}}">一覧</a>
</nav>
