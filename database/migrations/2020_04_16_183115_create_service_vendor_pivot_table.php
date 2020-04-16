<?php

use App\Service;
use App\Vendor;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceVendorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_vendor', function(Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->bigInteger('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on((new Service())->getTable());//->onDelete(\'cascade\')

            $table->bigInteger('vendor_id')->unsigned()->index();
            $table->foreign('vendor_id')->references('id')->on((new Vendor())->getTable());//->onDelete(\'cascade\')

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
        Schema::dropIfExists('service_vendor');
    }
}
