@extends('layouts.default')
@section('title','主页')
@section('content')
<div class="jumbotron">
    <h1>hello</h1>
    <p class="lead">
        11
    </p>
    <p>
        一切
    </p>
    <p>
        <a href="{{route('signup')}}" class="btn btn-lg btn-success" role="button">现在注册</a>
    </p>
</div>
@stop