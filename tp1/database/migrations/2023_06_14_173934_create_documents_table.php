<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ducuments', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('titre_fr');
            $table->string('titre_en');
            $table->text('body');
            $table->text('body_fr');
            $table->text('body_en');
            $table->date('date');
            $table->unsignedBigInteger('etudient_id');
            $table->foreign('etudient_id')->references('id')->on('etudients');
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
        Schema::dropIfExists('ducuments');
    }
}
    



