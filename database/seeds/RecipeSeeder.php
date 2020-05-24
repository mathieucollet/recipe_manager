<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert(
            [
                'user_id'      => 1,
                'name'         => 'Hamburger maison',
                'description'  => 'À servir aux enfants ou lors de soirées à thème : vive les Etats-Unis',
                'instructions' => <<<EOT
<ol>
    <li>Faites revenir les oignons à feux doux. </li>
    <li>Ajouter les steaks.</li>
    <li>Une fois saisi, poser une tranche de cheddar sur le steak et laisser fondre.</li>
    <li>Une fois cuit, déposer le steak et le fromage sur une des tranches du pain que vous aurez auparavant tartinée d'un mélange de ketchup et de moutarde.</li>
    <li>Ajouter la salade et de petites rondelles de tomates.</li>
    <li>Vous pouvez maintenant recouvrir la préparation de l'autre tranche (avec ketchup et moutarde)</li>
</ol>
EOT,
                'minutes'      => '10',
                'difficulty'   => 1,
                'shared'       => 1,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ]
        );

        DB::table('recipes')->insert(
            [
                'user_id'      => 2,
                'name'         => 'Salade César',
                'description'  => 'Servir en accompagnement d\'une quiche ou d\'une tourte. Excellent repas du soir. Vous pouvez utiliser des croûtons déjà prêts. La sauce peut être préparée 6 heures à l\'avance et réservée au frais.',
                'instructions' => <<<EOT
<ol>
    <li>Faites dorer le pain, coupé en cubes, 3 min dans un peu d'huile.</li>
    <li>Déchirez les feuilles de romaine dans un saladier, et ajoutez les croûtons préalablement épongés dans du papier absorbant.</li>
    <li>Préparez la sauce : Faites cuire l'oeuf 1 min 30 dans l'eau bouillante, et rafraîchissez-le.</li>
    <li>Cassez-le dans le bol d'un mixeur et mixez, avec tous les autres ingrédients; rectifiez l'assaissonnement et incorporez à la salade.</li>
    <li>Décorez de copeaux de parmesan, et servez.</li>
</ol>
EOT,
                'minutes'      => '20',
                'difficulty'   => 1,
                'shared'       => 1,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ]
        );

        $recipesIngredients = collect(
            [
                1 => collect([1, 2, 3, 4, 5, 6, 7, 8]),
                2 => collect([10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23]),
            ]
        );
        $recipesIngredients->each(
            function ($ingredients, $rKey) {
                $ingredients->each(
                    function ($ingredient, $iKey) use ($rKey) {
                        DB::table('ingredient_recipe')->insert(
                            [
                                'ingredient_id' => $ingredient,
                                'recipe_id'     => $rKey,
                            ]
                        );
                    }
                );
            }
        );

        $recipesTags = collect(
            [
                1 => collect([2, 7]),
                2 => collect([5, 7, 10]),
            ]
        );
        $recipesTags->each(
            function ($tags, $rKey) {
                $tags->each(
                    function ($tag, $iKey) use ($rKey) {
                        DB::table('recipe_tag')->insert(
                            [
                                'recipe_id' => $rKey,
                                'tag_id'    => $tag,
                            ]
                        );
                    }
                );
            }
        );
    }
}
