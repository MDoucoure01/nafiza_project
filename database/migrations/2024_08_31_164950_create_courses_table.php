<?php

use App\Models\Cohort;
use App\Models\CourseType;
use App\Models\Module;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Module::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(CourseType::class)->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->json('file')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
