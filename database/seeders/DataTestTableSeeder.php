<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data for Client
        // Data set tests
        \DB::table('client')->insert([
            ['nom' => 'HELET', 'prenom' => 'Joshua', 'email' => 'joshua.ele@gmail.com', 'code_postal' => '13100', 'ville' => 'AIX EN PROVENCE'],
            ['nom' => 'CAMARIO', 'prenom' =>'Vincent', 'email' => 'vincent.ca15@yahoo.com', 'code_postal' => '13100', 'ville' => 'AIX EN PROVENCE'],
            ['nom' => 'ISA', 'prenom' =>'Marie', 'email' => 'marieisa@yahoo.com', 'code_postal' => '04500', 'ville' => 'MANOSQUE'],
            ['nom' => 'DUPONT', 'prenom' => 'François', 'email' => 'dfrancois@hotmail.com', 'code_postal' => '83000', 'ville' => 'TOULON'],
            ['nom' => 'KHALED', 'prenom' =>'Ismael', 'email' => 'ismael.khaled@ovh.com', 'code_postal' => '06000', 'ville' => 'NICE'],
            ['nom' => 'RAMANIVOSOA', 'prenom' => 'Andry', 'email' => 'andry.rama@gmail.com', 'code_postal' => '13000', 'ville' => 'MARSEILLE']
                
        ]);

        // Data for Materiel
        \DB::table('materiel')->insert([
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
            ['nom' => 'Materiel test A', 'prix' => 8000],
            ['nom' => 'Materiel test AA', 'prix' => 5500],
            ['nom' => 'Materiel test AAA', 'prix' => 7000],
            ['nom' => 'Materiel test B', 'prix' => 9800],
            ['nom' => 'Materiel test BB', 'prix' => 12000],
            ['nom' => 'Materiel test BBB', 'prix' => 67000],
            ['nom' => 'Materiel test C', 'prix' => 70000],
            ['nom' => 'Materiel test CC', 'prix' => 14000],
            ['nom' => 'Materiel test CCC', 'prix' => 9900],
            ['nom' => 'Materiel test D', 'prix' => 6400],
            ['nom' => 'Materiel test DD', 'prix' => 1100],
            ['nom' => 'Materiel test DDD', 'prix' => 9600],
        ]);

        // Data for the pivot (lien)
        \DB::table('pivot_client_materiel')->insert([
            ['client_id' => 2, 'materiel_id' => 15],
            ['client_id' => 2, 'materiel_id' => 15], 
            ['client_id' => 2, 'materiel_id' => 14],
            ['client_id' => 2, 'materiel_id' => 18], 
            ['client_id' => 2, 'materiel_id' => 21], 
            ['client_id' => 2, 'materiel_id' => 10], 
            ['client_id' => 2, 'materiel_id' => 14], 
            ['client_id' => 2, 'materiel_id' => 29],
            ['client_id' => 3, 'materiel_id' => 16], 
            ['client_id' => 3, 'materiel_id' => 11], 
            ['client_id' => 3, 'materiel_id' => 19], 
            ['client_id' => 4, 'materiel_id' => 26], 
            ['client_id' => 4, 'materiel_id' => 27],
            ['client_id' => 4, 'materiel_id' => 26], 
            ['client_id' => 4, 'materiel_id' => 25], 
            ['client_id' => 4, 'materiel_id' => 20], 
            ['client_id' => 5, 'materiel_id' => 29],             
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],            
            ['client_id' => 2, 'materiel_id' => 18],
            ['client_id' => 2, 'materiel_id' => 21],
            ['client_id' => 2, 'materiel_id' => 10],
            ['client_id' => 2, 'materiel_id' => 14],
            ['client_id' => 2, 'materiel_id' => 29],            
            ['client_id' => 4, 'materiel_id' => 26],
            ['client_id' => 4, 'materiel_id' => 27],
            ['client_id' => 4, 'materiel_id' => 26],
            ['client_id' => 4, 'materiel_id' => 25],
            ['client_id' => 4, 'materiel_id' => 20],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],
            ['client_id' => 6, 'materiel_id' => 23],
            ['client_id' => 6, 'materiel_id' => 19],                     
        ]);


    }
    
}
