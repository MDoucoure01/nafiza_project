<?php

use App\Models\Subscription;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subscription::class)->constrained()->cascadeOnDelete();
            $table->string('transaction_token')->unique()->nullable(); // ID de la transaction
            $table->decimal('amount', 10, 2)->nullable(); // Montant payé
            $table->enum('type', ['subscription', 'monthly'])->default('monthly'); //Type de paiement
            $table->enum('status', ['pending', 'completed', 'failed', 'canceled'])->default('pending'); // Statut du paiement
            $table->string('payment_method')->nullable(); // Méthode de paiement
            $table->date('date')->nullable(); // Date de paiement
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
