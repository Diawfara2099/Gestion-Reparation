<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToReparationsTable extends Migration
{
    public function up()
    {
        Schema::table('reparations', function (Blueprint $table) {
            $table->enum('statut_paiement', ['payé', 'non payé'])->default('non payé');
            $table->enum('recuperer', ['oui', 'non'])->default('non');
            $table->date('date_arrivee')->nullable();
            $table->date('date_recuperation')->nullable();
        });
    }

    public function down()
    {
        Schema::table('reparations', function (Blueprint $table) {
            $table->dropColumn(['statut_paiement', 'recuperer', 'date_arrivee', 'date_recuperation']);
        });
    }
}
