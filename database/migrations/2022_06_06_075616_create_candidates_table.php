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
            $table->id('id'); 
            $table->string('name',60);
            $table->string('email',50);
            $table->enum('gender',["Male","Female","Other"]);
            $table->date('dob')->nullable();
            $table->text('address');
            $table->text('state');
            $table->text('constituency');
            $table->string('password');
            $table->timestamps(); //created_at updated_at
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
