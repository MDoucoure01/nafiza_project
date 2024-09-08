    <?php

    use App\Models\Professor;
    use App\Models\Seance;
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
            Schema::create('textbooks', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Professor::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(Seance::class)->constrained()->cascadeOnDelete();
                $table->text('content');
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('textbooks');
        }
    };
