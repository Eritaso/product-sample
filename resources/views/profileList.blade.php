@extends('layout.common')

@section('title', 'プロフィール一覧')

@include('layout.header')

@section('content')
<div class="container-fluid col-10">
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container col-6">
        <form method="post" action="{{ route('profileSearch')}}">
            @method('POST')
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-2">
                    <label for="inputPassword6" class="col-form-label">氏名</label>
                </div>
                <div class="col-auto col-10 pl-0">
                    <input type="text" id="name" name="name" class="form-control" aria-describedby="passwordHelpInline" value=@if(isset($request['name'])){{ $request['name'] }}@endif>
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
                    <input class="form-check-input" type="radio" name="sexType" id="sexType1" value="0" @if(isset($request['sexType']) && $request['sexType'] == 0) checked @endif>
                    <label class="form-check-label" for="sexType1">男</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexType" id="sexType2" value="1" @if(isset($request['sexType']) && $request['sexType'] == 1) checked @endif>
                    <label class="form-check-label" for="sexType2">女</label>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-2">
                    <label for="inputPassword6" class="col-form-label">電話番号</label>
                </div>
                <div class="col-auto col-10 pl-0 pt-2">
                    <input type="tel" id="tel" name="tel" class="form-control" value=@if(isset($request['tel'])){{ $request['tel'] }}@endif>
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
                            <input type="checkbox" name="holidays[]" value="{{ $holiday->value }}" id="{{ $holiday->value }}" @if(isset($request['holidays'])) @foreach($request['holidays'] as $checkHoliday) @if($checkHoliday == $holiday->value) checked @endif @endforeach @endif>
                            <label for="{{ $holiday->value }}">{{ $holiday->label() }}</label>
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
            <div class="row text-center pt-4 col-12">
                <div class="col-6 text-right">
                    <button class="btn btn-sm btn-success" type="submit">検索</button>
                </div>
                <div class="col-6 text-left">
                    <a class="btn btn-sm btn-secondary" onclick="clearText()">クリア</a>
                </div>
            </div>
        </form>
    </div>
    <div align="right">{{ $profileList['count'] }}件 / {{ $profileList['total'] }}件</div>
    <div class="row">
        <nav id="sidebar" class="mt-4 mb-4 col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <a class="list-group-item mt-4" href="{{ route('registerShow')}}">新規登録</a>
            <a class="list-group-item mb-4 active" href="{{ route('profileList')}}">一覧</a>
        </nav>
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <div class="row">
                <div class="col-12 mb-4 mb-lg-0">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">氏名</th>
                                        <th scope="col">性別</th>
                                        <th scope="col">電話番号</th>
                                        <th scope="col">休日</th>
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
                                        <td>
                                            @foreach($profile->holidays as $holiday)
                                                {{ $holiday }}
                                            @endforeach
                                        </td>
                                        <td>{{  $profile->comment }}</td>
                                        <td>
                                            <a href="{{ route('profile', $profile->id) }}" class="btn btn-sm btn-primary">編集</a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal">削除</button>
                                        </td>
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
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label1"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        本当に削除しますか？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                        @if(isset($profile->id))
                        <form method="post" action="{{ route('delete', $profile->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function clearText() {
        document.getElementById("name").value = '';
        document.getElementById("tel").value = '';
        $("input[id='sexType1']").removeAttr("checked").prop("checked", false).change();
        $("input[id='sexType2']").removeAttr("checked").prop("checked", false).change();
        $("input[name='holidays[]']").removeAttr("checked").prop("checked", false).change();
    }

</script>
@endsection
