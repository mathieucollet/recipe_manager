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
        DB::table('pictures')->insert(
            [
                'recipe_id'  => 1,
                'img_path'   => 'https://assets.afcdn.com/recipe/20130627/42230_w600.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('pictures')->insert(
            [
                'recipe_id'  => 2,
                'img_path'   => 'https://assets.afcdn.com/recipe/20190704/94709_w600cxt0cyt0cxb6000cyb4000.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
