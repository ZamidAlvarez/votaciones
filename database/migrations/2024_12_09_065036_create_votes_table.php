<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->foreignId('option_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Asegurarse de que un usuario solo pueda votar una vez por encuesta
            $table->unique(['user_id', 'survey_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
