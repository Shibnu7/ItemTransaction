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
        Schema::create('ordermaster', function (Blueprint $table) {
            $table->id();
            $table->string('customername');
            $table->string('address');
            $table->string('phone');
            $table->date('orderdate');
            $table->string('mobile');
            $table->decimal('totalamount', 10, 2);
            $table->string('orderstatus');
            $table->timestamps();
        });

        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderid_fk')->constrained('ordermaster')->onDelete('cascade');
            $table->foreignId('itemid_fk')->constrained('items')->onDelete('cascade');
            $table->integer('qty');
            $table->decimal('price', 10, 2);
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
        Schema::dropIfExists('ordermaster');
    }
};
