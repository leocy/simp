@extends('layouts.default')
@section('title','主页')

@section('content')
    <div class="jumbotron">
        <h1>Hello Laravel</h1>
        <p class="lead">
            您现在看到的是    <a href="#">一个测试页面</a>
        </p>

        <p>
            一切将从这里开始.
        </p>
        <p>
            <a href="{{ route('signup') }}" class="btn btn-lg btn-success">现在注册</a>
        </p>
    </div>
@stop