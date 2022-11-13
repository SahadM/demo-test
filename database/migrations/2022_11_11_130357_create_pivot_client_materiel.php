<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotClientMateriel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_client_materiel', function (Blueprint $table) {
            // A customer can have the same device
            $table->increments('lien_id');

            // Indexes for the foreign keys
            $table->unsignedInteger('client_id')->index();
            $table->unsignedInteger('materiel_id')->index();
        
            // Constraints foreign keys
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->foreign('materiel_id')->references('id')->on('materiel')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_client_materiel');
    }
}
