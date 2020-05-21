<?php

use Illuminate\Database\Seeder;

class CatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('cates')->insert([
        [
          'cate' => 'PHP',
        ],
        [
          'cate' => 'Laravel',
        ],
        [
          'cate' => 'C言語',
        ],
        [
          'cate' => 'Java',
        ],
        [
          'cate' => 'JavaScript',
        ],
        [
          'cate' => 'その他',
        ],
      ]);
    }
}
