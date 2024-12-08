<?php

use App\Models\User;
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
        Schema::create('messageries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->enum('is_sms', [0, 1])->default(0)->nullable();
            $table->enum('is_mail', [0, 1])->default(0)->nullable();
            $table->enum('is_communique', [0, 1])->default(0)->nullable();
            $table->enum('is_received', [0, 1])->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messageries');
    }
};
