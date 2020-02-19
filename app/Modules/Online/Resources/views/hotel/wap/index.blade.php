@extends('online::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        wap  This view is loaded from module: {!! config('online.name') !!}
    </p>
@endsection
