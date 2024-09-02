<?php

use App\Models\Role;
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
            // $table->foreignIdFor(Role::class)->constrained()->cascadeOnDelete();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->text('address')->nullable();
            $table->string('status')->nullable();
            $table->string('sex')->nullable();
            $table->string('emergency_number')->nullable();
            $table->text('specific_skills')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('password');
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
