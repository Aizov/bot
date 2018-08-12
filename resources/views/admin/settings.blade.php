@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::has('status'))
            <div class="alert alert-info">
                <span>{{ Session::get('status') }}</span>
            </div>
            @endif
        <form action="{{route('admin.setting.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label>URL</label>
                <div class="input-group">
                    <div class="input-group-btn"></div>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Действие <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="document.getElementById('url_callback_bot').value = '{{ url('') }}'">Вставить url</a> </li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit();">Отправить url</a></li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit();">Получить информацию</a></li>
                        </ul>
                    </div>
                    <input type="url" class="form-control" id="url_callback_bot" name="url_callback_bot" value="{{ $url_callback_bot or ''}}">
                </div>
                <button class="btn btn-primary" type="submit">Сохранить</button>
            </div>
        </form>
    <form id="setwebhook" action="{{route('admin.setting.setwebhook')}}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="uri" value="{{$url_callback_bot or ''}}">
    </form>
    <form id="getwebhookinfo" action="{{route('admin.setting.getwebhookinfo')}}" method="POST" style="display: none;">
        @csrf
    </form>
    </div>
    @endsection