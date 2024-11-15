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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('favicon_dir')->nullable();
            $table->string('favicon_file_name')->nullable();
            $table->string('logo_dir')->nullable();
            $table->string('logo_file_name')->nullable();
            $table->string('fold_logo_dir')->nullable();
            $table->string('fold_logo_file_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('status')
                ->default('up')
                ->comment('up, down, maintanence');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
