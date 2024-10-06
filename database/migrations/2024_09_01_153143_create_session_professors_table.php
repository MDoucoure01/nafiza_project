<?php

use App\Models\Professor;
use App\Models\School_session;
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
        Schema::create('session_professors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Professor::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(School_session::class)->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_professors');
    }
};
