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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku_id')->unique();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->double('price');
            $table->double('discount_amount')->nullable()->comment('in percentage %');
            $table->double('vat_amount')->nullable()->comment('in percentage %');
            $table->double('produce_cost')->nullable();
            $table->unsignedInteger('quantity');
            $table->string('size')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('capacity')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('status')->nullable()->default('live');
            $table->text('thumb_large')->nullable();
            $table->text('thumb_small')->nullable();
            $table->string('trend_type')->nullable()->comment('new, hot, sale');
            $table->boolean('is_featured')->nullable()->default(false);
            $table->unsignedBigInteger('category_id')->nullable()->default(null);
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
            $table->index(['id', 'sku_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
