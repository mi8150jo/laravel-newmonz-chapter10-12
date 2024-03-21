@extends('layouts.app')
@section('content')
<form action="{{ route('product.update', $product) }}" method="post">
    @method('patch')
    @include('product.form')
    <button type="submit">更新する</button>
    <a href="{{ route('product.show', $product) }}">キャンセル</a>
</form>
@endsection()