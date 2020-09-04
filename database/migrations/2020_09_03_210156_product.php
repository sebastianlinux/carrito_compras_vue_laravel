<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
      $date = date("Y-m-d H:i:s");
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->string('img');
            $table->longText('description')->default('Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque praesentium, neque explicabo.');
            $table->double('price');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('restrict');
            $table->integer('visits')->default(1);
            $table->timestamps();
        });


        DB::table('product')->insert(
            [
                [

                    'name' => 'MSI Prestige',
                    'category_id' => 1,
                    'img' => 'prestige.jpg',
                    'description' => 'Si eres arquitecto, diseñadora gráfica o amas los juegos de ordenador, este ordenador portátil de 14 pulgadas, dimensiones estándar y con una tarjeta gráfica de otro planeta son perfectos para ti. Procesador: i7-8550U , Memoria RAM: 16 GB, Disco duro: 512 GB',
                        'price' => '2000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
               [

                    'name' => 'Nuevo Apple MacBook Air',
                    'category_id' => 1,
                    'img' => 'macbookair.jpg',
                    'description' => 'Como no podía ser de otra manera y como su propio nombre lo indica este nuevo MacBook Air es uno de los portátiles más ligeros del mercado. De la mano de Apple, fue introducido al mercado no hace mucho tiempo.

                     Apple MacBook Air de 13,3 pulgadas, pesa tan solo 1,25 kg y su finura lo dice todo, 1,56 cm de grosor. Presenta una pantalla retina proporcionando 4 veces la calidad de una pantalla HD. Esta característica incrementará de forma exponencial la experiencia visual y cromática de todo lo que reproduzcas. Procesador: Intel Core i5, Memoria RAM: 8 GB, Disco duro: 128 o 256 GB',
                    'price' => '2000',
                                    'created_at' => $date,
                                    'updated_at' => $date
                ],
                [

                    'name' => 'iPhone 11',
                    'category_id' => 1,
                    'img' => 'iphone11.jpg',
                    'description' => 'El iPhone 11 no es técnicamente superior al iPhone 11 Pro, pero tiene un buen precio para ser un iPhone y casi todas las características claves para un celular de Apple. Reemplaza al iPhone XR con la misma pantalla de 6,1 pulgadas pero con dos cámaras en la parte trasera.',
                        'price' => '2000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [

                    'name' => 'Samsung Galaxy S20',
                    'category_id' => 1,
                    'img' => 'galaxys10.jpg',
                    'description' => 'El Samsung Galaxy S20 Plus es el mejor celular que puedes comprar a día de hoy, aunque el Galaxy S20 es tan similar que hemos fusionado en una entrada aunque sea más pequeño y algo menos capaz que el S20 Plus.
                        Por qué es el mejor celular: Es la relación valor-precio lo que permite a Samsung ganar sobre Apple. El precio del S20 Plus empieza en $1,199 y el S20 en $999. Sí, es un incremento sobre el año pasado (y ahora es igual al precio que pagas por los iPhone Pro), pero Samsung te da pantallas más grande, más almacenamiento interno, una ranura para tarjetas microSD y conectividad 5G. No encontrarás nada de esto en los iPhone 11 Pro. ',
                            'price' => '2000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [
                    'name' => 'BAROCCO ACANTHUS PRINT PUFFER JACKET',
                    'category_id' => 2,
                    'img' => 'baroco.jpg',
                    'description' => 'Chaqueta acolchada con estampado Barroco Acanthus que yuxtapone hojas de acanto con un fondo de tablero de ajedrez. Este estilo casual presenta cuello alto, capucha y cierre de cremallera frontal.',
                        'price' => '70000000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],  
                [
                    'name' => 'MIXED PRINT LONG SLEEVE POLO SHIRT',
                    'category_id' => 2,
                    'img' => 'tshirt1.jpg',
                    'description' => 'Relajado y casual, este polo de manga larga está confeccionado con un jersey de algodón más pesado. El estilo presenta letras de logotipo flocadas rodeadas por una fusión de estampados Acanthus.',
                        'price' => '45000000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],
                [
                    'name' => 'LOGO TAB TROUSERS',
                    'category_id' => 2,
                    'img' => 'logotab.jpg',
                    'description' => 'Confeccionados en algodón mejorado con elasticidad, estos pantalones clásicos cuentan con una cinta con el logo en la costura interior, visible cuando se enrollan sus mangas.',
                        'price' => '2400000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],                                                            
                [
                    'name' => 'SQUALO KNIT TRAINERS',
                    'category_id' => 2,
                    'img' => 'squalo.jpg',
                    'description' => 'La nueva versión de las deportivas inspiradas en tiburones, el tejido Squalo presenta una silueta de suela emblemática y un detalle oculto de Medusa. Las zapatillas están adornadas con la firma manuscrita de Gianni Versace, cinta Greca y detalles de cordones inspirados en el tejido.',
                        'price' => '4000000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],   
                [
                    'name' => 'BAROCCO HOMME PRINT SQUALO TRAINERS',
                    'category_id' => 2,
                    'img' => 'goldenshoes.jpg',
                    'description' => 'Inspirada en la anatomía del gran tiburón blanco, la suela de las deportivas Squalo evoca la forma de las mandíbulas del animal. Los detalles de cuero con estampado Barroco cuentan con costuras superiores exclusivas de Versace como una celebración del legado de la marca. El logo aparece en la lengüeta. Otro código de la casa: Medusa está oculta en la suela, lo que agrega una sutil dosis de decadencia.',
                        'price' => '5100000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],  
                [
                    'name' => 'Burger ClubHouse',
                    'category_id' => 3,
                    'img' => 'burger1.png',
                    'description' => 'Contiene una fuente de proteinas.',
                        'price' => '12000',
                    'created_at' => $date,
                    'updated_at' => $date
                ], 
                [
                    'name' => 'Big Mac',
                    'category_id' => 3,
                    'img' => 'burger2.png',
                    'description' => 'Acompañada de Papas a la francesa + Cocacola grande.',
                        'price' => '12000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],                 
                [
                    'name' => 'Ensalada',
                    'category_id' => 3,
                    'img' => 'salad1.png',
                    'description' => 'Excelentes verduras para la familia.',
                        'price' => '12000',
                    'created_at' => $date,
                    'updated_at' => $date
                ],   
                [
                    'name' => 'Cajita Feliz',
                    'category_id' => 3,
                    'img' => 'box1.png',
                    'description' => 'A los niños les va a encantar.',
                        'price' => '12000',
                    'created_at' => $date,
                    'updated_at' => $date
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
