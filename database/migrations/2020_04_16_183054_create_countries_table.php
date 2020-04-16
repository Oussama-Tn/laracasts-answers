<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Country;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable((new Country())->getTable())) {
            Schema::create((new Country())->getTable(), function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('a2_code');
                $table->string('name');
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new Country())->getTable());
    }
}
