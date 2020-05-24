<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    private function rand_float($st_num = 0, $end_num = 1, $mul = 100000)
    {
        if ($st_num > $end_num) {
            return false;
        }
        return mt_rand($st_num * $mul, $end_num * $mul) / $mul;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect(
            [
                1 => collect(
                    [
                        ['name' => 'Pain burger', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Viande hachée', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Moutarde', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Ketchup', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Tomate', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Oignon', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Salade', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Cheddar', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Cidre', 'price' => $this->rand_float(1, 5)],
                    ]
                ),
                2 => collect(
                    [
                        ['name' => '2 coeurs de laitue', 'price' => $this->rand_float(1, 5)],
                        ['name' => '25g de parmesan (copeaux)', 'price' => $this->rand_float(1, 5)],
                        ['name' => '4 tranches de pain écroutées', 'price' => $this->rand_float(1, 5)],
                        ['name' => '2 cuillères à soupe d\'huile d\'olive', 'price' => $this->rand_float(1, 5)],
                        ['name' => '1 oeuf', 'price' => $this->rand_float(1, 5)],
                        ['name' => '25g de parmesan râpé', 'price' => $this->rand_float(1, 5)],
                        ['name' => '2 cuillères à café de câpres', 'price' => $this->rand_float(1, 5)],
                        ['name' => '1/2 cuillère à café de moutarde', 'price' => $this->rand_float(1, 5)],
                        ['name' => '1 trait de tabasco', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Citron', 'price' => $this->rand_float(1, 5)],
                        ['name' => '1 gouse d\'ail pelée', 'price' => $this->rand_float(1, 5)],
                        ['name' => '15cl d\'huile d\'olive', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Sel', 'price' => $this->rand_float(1, 5)],
                        ['name' => 'Poivre', 'price' => $this->rand_float(1, 5)],
                    ]
                ),
            ]
        );

        $users->each(
            function ($user, $uKey) {
                $user->each(
                    function ($ingredient, $iKey) use ($uKey) {
                        DB::table('ingredients')->insert(
                            [
                                'user_id'    => $uKey,
                                'name'       => $ingredient['name'],
                                'price'      => $ingredient['price'],
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]
                        );
                    }
                );
            }
        );
    }
}
