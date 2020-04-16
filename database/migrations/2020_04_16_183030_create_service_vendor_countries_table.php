<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\ServiceVendorCountry;

class CreateServiceVendorCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable((new ServiceVendorCountry())->getTable())) {
            Schema::create((new ServiceVendorCountry())->getTable(), function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('service_vendor_id');
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
        Schema::dropIfExists((new ServiceVendorCountry())->getTable());
    }
}
