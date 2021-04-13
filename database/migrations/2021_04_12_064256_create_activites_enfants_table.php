<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesEnfantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites_enfants', function (Blueprint $table) {
            $table->id();
            $table->string('paiement');
            $table->string('admissibilite');
            $table->text('note');
            $table->foreignId('enfant_id')->constrained()->onDelete('cascade');
            $table->foreignId('activites_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activites_enfants');
    }
}
