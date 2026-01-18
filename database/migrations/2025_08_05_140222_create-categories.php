<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories' , function(Blueprint $table){
            $table->id();
            $table->string('name' , 50)->unique();
<<<<<<< HEAD
=======
            $table->string('image' , 100)->nullable();
>>>>>>> 0253129807e34e3c66c1a72cfbc2149b85dadab7
        });
    }

    public function down(): void
    {
        Schema::drop('categories');
    }
};
