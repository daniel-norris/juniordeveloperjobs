<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_registered');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('region')->nullable();
            $table->string('country');
            $table->string('postcode');
            $table->string('email');
            $table->string('phone');
            $table->string('url');
            $table->string('logo');
            $table->string('account_type')->nullable();
            $table->string('account_status')->default('active');
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
        Schema::dropIfExists('companies');
    }
}
