<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            // Foreign key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            // Apartment details
            $table->string('title')->required();
            $table->string('slug')->unique()->required();
            $table->text('description')->required();
            $table->tinyInteger('n_rooms')->required()->unsigned();
            $table->tinyInteger('n_beds')->required()->unsigned();
            $table->tinyInteger('n_bathrooms')->required()->unsigned();
            $table->float('n_square_meters', 6, 2)->required();
            $table->text('image')->required();
            $table->tinyInteger('visibility')->default(1);
            $table->float('daily_price', 6, 2)->nullable();

            // Address section
            $table->string('city')->required();
            $table->string('address')->required();
            $table->char('house_num', 20)->required();
            $table->char('postal_code', 10)->required();
            $table->float('latitude', 12, 10)->unsigned(false)->required();
            $table->float('longitude', 13, 11)->unsigned(false)->required();
            // $table->char('latitude', 12)->required();
            // $table->char('longitude', 13)->required();

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
        Schema::dropIfExists('apartments');
    }
}
