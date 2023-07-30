<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('category_id')->unsigned();
            $table->string('image_path')->nullable();
            $table->text('text');
            $table->string('url_code');
            $table->tinyInteger('is_active');
            $table->timestamps();
            $table->softDeletes();

            // 外部キー制約の追加
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
