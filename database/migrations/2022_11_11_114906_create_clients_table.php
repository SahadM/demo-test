<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table definition
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('email', 255);
            $table->string('code_postal', 5);
            $table->string('ville', 255);
            $table->timestamps();
        });

        // Data set tests
        DB::table('client')->insert([
            ['nom' => 'HELET', 'prenom' => 'Joshua', 'email' => 'joshua.ele@gmail.com', 'code_postal' => '13100', 'ville' => 'AIX EN PROVENCE'],
            ['nom' => 'CAMARIO', 'prenom' =>'Vincent', 'email' => 'vincent.ca15@yahoo.com', 'code_postal' => '13100', 'ville' => 'AIX EN PROVENCE'],
            ['nom' => 'ISA', 'prenom' =>'Marie', 'email' => 'marieisa@yahoo.com', 'code_postal' => '04500', 'ville' => 'MANOSQUE'],
            ['nom' => 'DUPONT', 'prenom' => 'François', 'email' => 'dfrancois@hotmail.com', 'code_postal' => '83000', 'ville' => 'TOULON'],
            ['nom' => 'KHALED', 'prenom' =>'Ismael', 'email' => 'ismael.khaled@ovh.com', 'code_postal' => '06000', 'ville' => 'NICE'],
            ['nom' => 'RAMANIVOSOA', 'prenom' => 'Andry', 'email' => 'andry.rama@gmail.com', 'code_postal' => '13000', 'ville' => 'MARSEILLE']
                
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
