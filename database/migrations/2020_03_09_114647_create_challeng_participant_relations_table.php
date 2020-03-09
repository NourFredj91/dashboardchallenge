<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengParticipantRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challeng_participant_relations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_user')->unsigned();
            $table->integer('id_challenge')->unsigned();
            $table->text('repositoryURL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challeng_participant_relations');
    }
}
