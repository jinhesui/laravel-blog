<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    public function up()
    {
        $categories = [
            [
                'name'        => '日志',
                'description' => '记录时代',
            ],
            [
                'name'        => '数学',
                'description' => '数学应用组',
            ],
            [
                'name'        => '英语',
                'description' => '英语角',
            ],
            [
                'name'        => '笔记',
                'description' => '于一微尘中，悉见诸世界',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}
