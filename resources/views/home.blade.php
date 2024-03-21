@extends('layouts.app')
@section('content')
<h1>マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん</p>
<p><a href="{{ route('product.index') }}">商品管理システムへ</a></p>
<form action="{{ route('logout') }}" method="post">
    @csrf 
    <button type="submit">ログアウト</button>
</form>
@endsection()