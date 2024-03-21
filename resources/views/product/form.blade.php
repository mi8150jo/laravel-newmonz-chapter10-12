@csrf 
<dl class="form-list">
    <dt>カテゴリ</dt>
    <dd><input type="text" name="category_id" value="{{ old('category_id', $product->category_id) }}"></dd>
    <dt>メーカー</dt>
    <dd><input type="text" name="maker" value="{{ old('maker', $product->maker) }}"></dd>
    <dt>商品名</dt>
    <dd><input type="text" name="name" value="{{ old('name', $product->name) }}"></dd>
    <dt>価格</dt>
    <dd><input type="text" name="price" value="{{ old('price', $product->price) }}"></dd>
</dl>
