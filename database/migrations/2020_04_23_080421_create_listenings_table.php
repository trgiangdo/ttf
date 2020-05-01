<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listenings', function (Blueprint $table) {
            $table->id();
            $table->string('audio_url');
            $table->foreignId('exam_id')->references('id')->on('exams')
                  ->onDelete('cascade');
            $table->enum('Part', [1, 2, 3, 4]);
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
        Schema::dropIfExists('listenings');
    }
}
