<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('contrats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('annonce_id');
            $table->unsignedBigInteger('user_id_prop');
            $table->unsignedBigInteger('user_id_client');
           

            $table->foreign('annonce_id')->references('id')->on('annonces')->onDelete('cascade');
            $table->foreign('user_id_prop')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id_client')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
