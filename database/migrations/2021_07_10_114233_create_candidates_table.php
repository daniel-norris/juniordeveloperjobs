<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('forename');
            $table->string('middle')->nullable();
            $table->string('surname');
            $table->foreignId('user_id')
                ->comment('fk to users table')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->longText('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('country');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('postcode');
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
        Schema::dropIfExists('candidates');
    }
}
