@extends('layouts.app')
@section('content')
<product class="product-detail">
    <h1 class="product-category">カテゴリー：{{ $product->category->name }}</h1>
    <div class="product-maker">メーカー：{{ $product->maker }}</div>
    <div class="product-name">商品名：{{ $product->name }}</div>
    <div class="product-price">価格：{{ $product->price }}</div>
    <div class="product-info">登録日：{{ $product->created_at }}</div>
    <a href="{{ route('product.edit', $product) }}">編集</a>
    <a href="{{ route('product.index') }}">キャンセル</a>
</product>
@endsection