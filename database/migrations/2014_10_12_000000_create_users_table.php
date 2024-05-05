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
            $table->id();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('pseudo')->nullable();
            $table->date("date_of_birth")->nullable();
            $table->longText('photo_profile')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('isActive')->default(true);
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('sex')->nullable();
            $table->string('id_unknown')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
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
