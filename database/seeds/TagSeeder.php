<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(
            ['dessert', 'viande', 'poisson', 'entrée', 'salade', 'soupe', 'plats', 'amuses bouches', 'sauce', 'accompagnement', 'boisson']
        );

        $tags->each(
            function ($item, $key) {
                DB::table('tags')->insert(
                    [
                        'name'       => $item,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
            }
        );
    }
}
