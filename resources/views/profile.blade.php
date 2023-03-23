@extends('layout.common')

@section('title', 'プロフィール編集')

@include('layout.header')

@section('content')
<div class="container-fluid col-10">
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        @include('layout.nav', ['list' => 'active'])
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
                                <form method="post" action="{{ route('update', $profile->profileId) }}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row g-3 align-items-center">
                                        <div class="col-2">
                                            <label for="inputPassword6" class="col-form-label">氏名</label>
                                        </div>
                                        <div class="col-auto col-10 pl-0">
                                            <input type="text" id="name" name="name" class="form-control" aria-describedby="passwordHelpInline" value="{{$profile->name}}">
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
                                            <input class="form-check-input" type="radio" name="sexType" id="sexType1" value="0" @if($profile->sexType === 0) checked @endif>
                                            <label class="form-check-label" for="sexType1">男</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexType" id="sexType2" value="1" @if($profile->sexType === 1) checked @endif>
                                            <label class="form-check-label" for="sexType2">女</label>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-2">
                                            <label for="inputPassword6" class="col-form-label">電話番号</label>
                                        </div>
                                        <div class="col-auto col-10 pl-0 pt-2">
                                            <input type="tel" id="tel" name="tel" class="form-control" value="{{$profile->tel}}">
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
                                                <input type="checkbox" name="holidays[]" value="{{ $holiday->value }}" id="{{ $holiday->value }}"
                                                    @foreach($profile->holidays as $displayHoliday)
                                                        @if($displayHoliday->type->value == $holiday->value)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                >
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
                                    <div class="row g-3 align-items-center pt-2">
                                        <div class="col-2">
                                            <label for="inputPassword6" class="col-form-label">コメント</label>
                                        </div>
                                        <div class="col-auto col-10 pl-0">
                                            <input type="text" id="comment" name="comment" class="form-control" value="{{$profile->comment}}">
                                        </div>
                                    </div>
                                    <div class="section1 text-center mt-4">
                                        <button type="submit" class="btn btn-primary">登録</button>
                                    </div>
                                    <input type="hidden" id="profileId" name="profileId" value="{{ $profile->profileId }}" />
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
