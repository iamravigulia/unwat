<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnwatQuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fmt_unjumble_words_at_ques', function (Blueprint $table) {
            $table->id();
            $table->longText('question')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('question_format_id')->nullable();
            $table->foreignId('question_sub_format_id')->nullable();
            $table->foreignId('subject_id')->nullable();
            $table->foreignId('topic_id')->nullable();
            $table->foreignId('sub_topic_id')->nullable();
            $table->foreignId('question_level_id')->nullable();
            $table->foreignId('media_id')->nullable();
            $table->boolean('active')->default(0);
            $table->string('hint')->nullable();
            $table->set('level', ['easy', 'medium', 'hard'])->default('easy');
            $table->integer('score')->default(1);
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
        Schema::dropIfExists('fmt_unjumble_words_at_ques');
    }
}
