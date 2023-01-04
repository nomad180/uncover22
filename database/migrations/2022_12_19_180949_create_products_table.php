<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('thumbnail');
            $table->string('alt');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 8,2);
            $table->string('stripe_live_key')->unique()->nullable();
            $table->string('stripe_test_key')->unique()->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
