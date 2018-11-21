<?php

use Illuminate\Database\Seeder;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Comic::class,100)->create([
            '' => bcrypt('123456'),

        ]);
    }
}
