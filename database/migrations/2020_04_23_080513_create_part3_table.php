<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePart3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part3s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listening_id')->references('id')->on('listenings')->onDelete('cascade');
            $table->foreignId('question_type_id')->references('id')->on('question_types');
            $table->longtext('question');
            $table->longtext('choice_A');
            $table->longtext('choice_B');
            $table->longtext('choice_C');
            $table->longtext('choice_D');
            $table->enum('answer', ['A', 'B', 'C', 'D']);
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
        Schema::dropIfExists('part3');
    }
}
