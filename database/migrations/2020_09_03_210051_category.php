<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });


        DB::table('category')->insert(
            [
                [
                    'name' => 'Tecnologia',
                    'description' => 'Obten los nuevos avances tecnologicos',
                ],
                [
                    'name' => 'Ropa',
                    'description' => 'Productos oficiales Versace',
                ],
                [
                    'name' => 'Comida',
                    'description' => 'Antojate de los platos mas deliciosos.',
                ],                                      
            ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
