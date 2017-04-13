<?php

use Illuminate\Database\Seeder;

class PriceActions_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price_actions')->insert([
            'action' => 'create',
            'title' => 'прайс создан',
        ]);
        DB::table('price_actions')->insert([
            'action' => 'active',
            'title' => 'прайс активирован',
        ]);
        DB::table('price_actions')->insert([
            'action' => 'disActive',
            'title' => 'прайс дазактивирован',
        ]);
        DB::table('price_actions')->insert([
            'action' => 'hide',
            'title' => 'прайс скрыт',
        ]);
        DB::table('price_actions')->insert([
            'action' => 'delete',
            'title' => 'прайс удален',
        ]);    }
}
