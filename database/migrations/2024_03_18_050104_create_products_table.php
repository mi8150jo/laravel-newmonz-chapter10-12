<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // 商品テーブルの作成
        
            // 商品ID。自動増分のIDカラムを作成する
            $table->id();
        
            // カテゴリID。符号なしのBIGINT（大きな整数）カラムを作成する
            $table->bigInteger("category_id")->unsigned();
        
            // メーカー名。文字列型のカラムを作成する
            $table->string("maker");
        
            // 商品名。文字列型のカラムを作成する
            $table->string("name");
        
            // 価格。整数型のカラムを作成する
            $table->integer("price");
        
            // タイムスタンプ。created_atとupdated_atのためのタイムスタンプを作成する
            $table->timestamps();
        
            // カテゴリIDに外部キー制約を追加する。categoriesテーブルのidカラムを参照し、削除時には関連する商品も削除する
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
