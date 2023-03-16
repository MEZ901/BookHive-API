<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->unsignedBigInteger("isbn")->primary();
            $table->string("title");
            $table->date("date_publication");
            $table->integer("number_pages");
            $table->string('location')->unique()->nullable();
            $table->string("status");
            $table->text('content');
            $table->foreignId("author_id")->constrained();
            $table->foreignId("genre_id")->constrained();
            $table->foreignId("collection_id")->nullable()->constrained();
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
        Schema::dropIfExists('books');
    }
};
