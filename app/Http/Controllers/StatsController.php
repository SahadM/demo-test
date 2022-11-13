<?php

namespace App\Http\Controllers;


class StatsController extends Controller
{

    public function index()
    {
        $table_1 = collect($this->getCustomersHasMore30Devices());
        $table_2 = collect($this->getCustomersHasTotalSold());

        return view('stats', compact('table_1', 'table_2'));
    }

    private function getCustomersHasMore30Devices()
    {
        $sql =<<<SQL
    SELECT 
        c.id, c.nom, c.prenom, c.email, c.code_postal, c.ville,
        count(m.id) AS nb_materiel,
        sum(m.prix) AS total_prix_materiel

      FROM client c
INNER JOIN pivot_client_materiel pcm ON pcm.client_id = c.id 
INNER JOIN materiel m ON m.id = pcm.materiel_id
  GROUP BY c.id
    HAVING count(m.id) > 30 AND sum(m.prix) > 30000
  ORDER BY count(m.id) DESC
SQL;

        $results = \DB::select($sql);
        return $results;
    }

    private function getCustomersHasTotalSold()
    {
        $sql =<<<SQL
   SELECT 
	    c.id, c.nom, c.prenom, c.email, c.code_postal, c.ville,
        count(m.id) AS nb_materiel,
        sum(m.prix) AS total_prix_materiel,
	   CASE
	      WHEN sum(m.prix) > 30000 THEN 'oui'
	      ELSE 'non'
	   END
           AS est_rentable

      FROM client c
INNER JOIN pivot_client_materiel pcm ON pcm.client_id = c.id 
INNER JOIN materiel m ON m.id = pcm.materiel_id
  GROUP BY c.id
  ORDER BY sum(m.prix) DESC
  
SQL;

        $results = \DB::select($sql);
        return $results;
    }

}
