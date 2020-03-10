<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeUserRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_user_relations', function (Blueprint $table) {
            $table->primary(['id_user', 'id_challenge']);
            $table->integer('id_user')->unsigned();
            $table->integer('id_challenge')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_challenge')->references('id_challenge')->on('challenges')->onDelete('cascade');
            $table->string('codeFileName');
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
        Schema::dropIfExists('challenge_user_relations');
    }
}
