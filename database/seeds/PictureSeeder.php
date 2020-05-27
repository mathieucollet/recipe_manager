<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hambPictures = collect(
            [
                'hamb.jpg',
                '4Qa3v55jJr7MNDIIT9ww1aErl9cndP7Z71Bm1Hyk.jpeg',
                'aztUo2xgNfsRphZin9kJKxwGigeAuWQWhZSyYMGC.jpeg',
                'ftfYnQ9CTOmVsVh6NlZIB91kQXddwoHH6kRwZF4b.jpeg',
                'gWAW03FYhuHgH7f0KfXG3IKX666pwSdAf5yrP5cP.jpeg',
            ]
        );
        $saladPictures = collect(
            [
                'salade.jpg',
                'oKTJMSSvHb148xr4WydD9yncXf3cZomtqpYa7IK5.jpeg',
                'ApMWqVlhSTcpVhWPckspU65k7J6kwtPIUGpBquLC.jpeg',
                'aOBcAMJjxhTEzIW6QMN5y5THXgIu7kHCqjZeomP2.jpeg',
                'Q4eOEjKZmTRQj0KOeIRCIlL3PabsHKDB1KZIGEJK.jpeg',
            ]
        );
        $hambPictures->each(
            function ($picture, $key) {
                DB::table('pictures')->insert(
                    [
                        'recipe_id'  => 1,
                        'img_path'   => 'images/' . $picture,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
            }
        );
        $saladPictures->each(
            function ($picture, $key) {
                DB::table('pictures')->insert(
                    [
                        'recipe_id'  => 2,
                        'img_path'   => 'images/' . $picture,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
            }
        );
    }
}
