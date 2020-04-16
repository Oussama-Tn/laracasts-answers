<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\ServiceVendorCountry;

class AddCountryIdColumnToServiceVendorCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable((new ServiceVendorCountry())->getTable())) {
            Schema::table((new ServiceVendorCountry())->getTable(), function(Blueprint $table) {
                $table->bigInteger('country_id')->unsigned();
                $table->foreign('country_id', 'fk_20200416183222')->references('id')->on('countries');
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
        // Todo: remove foreign key constraints
    }
}
