<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExplanationResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explanation_results', function (Blueprint $table) {
            $table->id();

            $table->integer('scope');

            $table->unsignedBigInteger('test_id')->default(1);
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');

            $table->text('description');
            $table->integer('evaluation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('explanation_results');
    }
}
