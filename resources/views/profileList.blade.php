@extends('layout.common')

@section('title', 'プロフィール一覧')
@section('keywords', 'キーワード')
@section('description', 'インデックスページの説明文')
@section('pageCss')
    <link href="/css/star/index.css" rel="stylesheet">
@endsection

@include('layout.header')

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="mt-4 mb-4 col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <a class="list-group-item" href="#">新規登録</a>
            <a class="list-group-item active" href="{{ route('profileList')}}">一覧</a>
        </nav>
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">名前</th>
                                        <th scope="col">性別</th>
                                        <th scope="col">電話番号</th>
                                        <th scope="col">コメント</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($profileList['profileList'] as $profile)
                                    <tr>
                                        <th scope="row">{{  $profile->id }}</th>
                                        <td>{{  $profile->name }}</td>
                                        <td>{{  $profile->sexType->label() }}</td>
                                        <td>{{  $profile->tel }}</td>
                                        <td>{{  $profile->comment }}</td>
                                        <td><a href="{{ route('profile', $profile->id) }}" class="btn btn-sm btn-primary">編集</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pagination mt-3 justify-content-center">
                        {{ $profileList['links'] }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
