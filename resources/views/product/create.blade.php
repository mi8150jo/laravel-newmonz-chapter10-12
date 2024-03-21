@extends('layouts.app')
@section('content')
<main class="container">
    <form action="{{ route('product.store') }}" method="post">
        @include('product.form')
        <button type="submit">投稿する</button>
        <a href="{{ route('product.index') }}">キャンセル</a>
    </form>
</main>
@endsection()
