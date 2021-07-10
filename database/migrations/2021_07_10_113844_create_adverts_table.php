<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('title');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('region')->nullable();
            $table->string('country');
            $table->string('postcode');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->longText('description');
            $table->boolean('featured');
            $table->string('external_url');
            $table->boolean('remote');
            $table->foreignId('recruiter_id')->constrained('recruiters')
                    ->onupdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('adverts');
    }
}
