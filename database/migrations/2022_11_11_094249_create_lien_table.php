<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table definition
        Schema::create('lien', function (Blueprint $table) {
            $table->increments('id');

            // Indexes for the foreign keys
            $table->unsignedInteger('client_id')->index();
            $table->unsignedInteger('materiel_id')->index();

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            
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
        // Drop Constraints
        Schema::table('lien', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['materiel_id']);
        });
        
        Schema::dropIfExists('lien');
    }
}
