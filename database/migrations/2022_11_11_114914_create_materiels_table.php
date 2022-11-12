<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table definition
        Schema::create('materiel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 255);
            $table->decimal('prix', 10, 2);
            $table->timestamps();
        });

        // Data set tests
        DB::table('materiel')->insert([
            ['nom' => 'Cartouche encre NOIR CANON photocopie', 'prix' => 450.00],
            ['nom' => 'Ecran pivotable AOC 32p', 'prix' => 1145.98],
            ['nom' => 'Souris LOGITECH', 'prix' => 19.99],
            ['nom' => 'Processeur AMD 2020', 'prix' => 680.40],
            ['nom' => 'Carte graphique NVIDIA Tx-890-HD', 'prix' => 799.99],
            ['nom' => 'Cable HMDI', 'prix' => 29.99],
            ['nom' => 'Macbook pro M2+ 2023',  'prix' => 2999.99],
            ['nom' => 'Photocopieur EPON X245P+',  'prix' => 5890.99],
            ['nom' => 'Photocopieur EPON X10',  'prix' => 3990.99],
            ['nom' => 'Ecran présentation TOSHIBA 8K II',  'prix' => 7990.99],
            ['nom' => 'Ecran présentation TOSHIBA 8K',  'prix' => 6990.99],
            ['nom' => 'Cartouche encre COULEUR CANON photocopie',  'prix' => 550.00],
            ['nom' => 'Porte-documents, A4 en Polypropylène Noir',50.69],
            ['nom' => 'CHAISE ERGONOMIQUE AVEC REPOSE-PIED HAUT HISS',  'prix' => 179.00],
            ['nom' => 'CHAISE ERGONOMIQUE ASSIS-DEBOUT FIN',  'prix' => 315.83],
            ['nom' => 'XICHAO - Trieur à Soufflets Classeur Rangement Papier',  'prix' => 16.99],
            ['nom' => 'Support de Moniteur, Réhausseur d\'écran',  'prix' => 19.99],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiel');
    }
}
