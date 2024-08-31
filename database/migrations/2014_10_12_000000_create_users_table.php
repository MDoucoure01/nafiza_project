<?php

<<<<<<< HEAD
use App\Models\Role;
=======
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
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
<<<<<<< HEAD
            // $table->foreignIdFor(Role::class)->constrained()->cascadeOnDelete();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->text('address')->nullable();
            $table->string('status')->nullable();
            $table->string('emergency_number')->nullable();
            $table->text('specific_skills')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('password');
=======
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
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
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
