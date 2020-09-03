<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('type_id');
            $table->string('identification');
            $table->string('mobile');
            $table->string('city');
            $table->string('email')->unique();
            $table->bigInteger('visits')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('img')->nullable()->default('avatar.png');
            $table->unsignedSmallInteger('rol')->default(0);
            $table->unsignedSmallInteger('status')->default(1);
            $table->string('api_token')->nullable();
            $table->timestamps();
        });

        $date = date("Y-m-d H:i:s");

        DB::table('users')->insert(
            [
                [

                    'name' =>'Sebastian',
                    'lastname' => 'Rincón P', 
                    'type_id' =>'cc',
                    'identification'=> '1152702816',
                    'mobile' => '3213246132',
                    'city' => 'Bogotá DC',
                    'password' => '$2y$12$KuLT/FXwX1aNY1UcEa22K.KXw0U17wayZ.XysySsUYAKSJPYmilG2',
                    'email' => 'sebastianlinux9@gmail.com',
                    'created_at' => $date,
                    'updated_at' => $date
                ]
                        
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
        Schema::dropIfExists('users');
    }
}
