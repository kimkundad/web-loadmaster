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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('name_branch')->nullable();
            $table->text('address_branch')->nullable();
            $table->string('img_branch')->nullable();
            $table->string('code_branch')->nullable();
            $table->string('phone')->nullable();
            $table->string('admin_branch')->nullable();
            $table->integer('status')->default('0');
            $table->string('time')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
