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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_ref')
                ->unique()
                ->nullable();
            $table->string('role')
                ->default('user')
                ->comment('companyadmin, orgadmin, orgmember, user');
            $table->unsignedBigInteger('org_id')
                ->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('full_name_slug')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('status')
                ->default('active')
                ->comment('active, inactive, suspended');
            $table->text('image')->nullable();
            $table->text('avatar_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->double('total_credit')->default(0);
            $table->double('total_withdraw')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
