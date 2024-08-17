<?php

use App\Models\Cohort;
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
        Schema::create('session__cohorts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cohort::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('session__cohorts');
    }
};
