@extends('layout.common')

@section('title', 'プロフィール編集')
@section('keywords', 'キーワード')
@section('description', 'インデックスページの説明文')
@section('pageCss')
    <link href="/css/star/index.css" rel="stylesheet">
@endsection

@include('layout.header')

@section('content')
    <div class="container-fluid col-10">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <nav id="sidebar" class="mt-4 mb-4 col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <a class="list-group-item active" href="{{ route('registerShow')}}">新規登録</a>
                <a class="list-group-item" href="{{ route('profileList')}}">一覧</a>
            </nav>
            @if (session('flash_message'))
                <div class="flash_message bg-success text-center py-3 my-0">
                    {{ session('flash_message') }}
                </div>
            @endif
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="post" action="">
                                        @method('POST')
                                        @csrf
                                        <div class="row g-3 align-items-center">
                                            <div class="col-2">
                                                <label for="inputPassword6" class="col-form-label">名前</label>
                                            </div>
                                            <div class="col-auto col-10 pl-0">
                                                <input type="text" id="name" name="name" class="form-control" aria-describedby="passwordHelpInline" value="">
                                            </div>
                                            @error('name')
                                            <div class="col-2"></div>
                                            <div class="row col-10">
                                                <p class="perror mb-0"><span style="color:red;">{{$message}}</span></p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-2">
                                                <label for="inputPassword6" class="col-form-label">性別</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexType" id="sexType1" value="0">
                                                <label class="form-check-label" for="sexType1">男</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexType" id="sexType2" value="1">
                                                <label class="form-check-label" for="sexType2">女</label>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-2">
                                                <label for="inputPassword6" class="col-form-label">電話番号</label>
                                            </div>
                                            <div class="col-auto col-10 pl-0 pt-2">
                                                <input type="tel" id="tel" name="tel" class="form-control">
                                            </div>
                                            @error('tel')
                                            <div class="col-2"></div>
                                            <div class="row col-10">
                                                <p class="perror mb-0"><span style="color:red;">{{$message}}</span></p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row g-3 align-items-center pt-2">
                                            <div class="col-2">
                                                <label for="inputPassword6" class="col-form-label">休日</label>
                                            </div>
                                            <div class="form-check form-check-inline col-7">
                                                @foreach($holidays as $holiday)
                                                    <div class="col-auto col-2 pl-0 pr-1">
                                                        <input type="checkbox" name="holidays[]" value="{{ $holiday->value }}">{{ $holiday->label() }}
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('holidays')
                                            <div class="row col-12">
                                                <div class="col-2"></div>
                                                <div class="col-10">
                                                    <p class="perror mb-0"><span style="color:red;">{{$message}}</span></p>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row g-3 align-items-center pt-2">
                                            <div class="col-2">
                                                <label for="inputPassword6" class="col-form-label">コメント</label>
                                            </div>
                                            <div class="col-auto col-10 pl-0">
                                                <input type="text" id="comment" name="comment" class="form-control">
                                            </div>
                                        </div>
                                        <div class="section1 text-center mt-4">
                                            <button type="submit" class="btn btn-primary">登録</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
