<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('reparations', function (Blueprint $table) {
            $table->date('date_arrivee')->nullable();
            $table->date('date_recuperation')->nullable();
            $table->enum('statut_paiement', ['payé', 'non payé'])->default('non payé');
            $table->enum('recuperer', ['oui', 'non'])->default('non');
        });
    }

    public function down(): void
    {
        Schema::table('reparations', function (Blueprint $table) {
            $table->dropColumn(['date_arrivee', 'date_recuperation', 'statut_paiement', 'recuperer']);
        });
    }
};
