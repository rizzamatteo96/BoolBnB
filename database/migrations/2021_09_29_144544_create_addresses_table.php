<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')
                    ->references('id')
                    ->on('apartments')
                    ->onDelete('cascade');
            $table->string('city')->required();
            $table->string('address')->required();
            $table->char('house_num', 20)->required();
            $table->char('postal_code', 10)->required();
            $table->char('latitude', 12)->required();
            $table->char('longitude', 13)->required();
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
        Schema::dropIfExists('addresses');
    }
}
