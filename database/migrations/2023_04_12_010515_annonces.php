<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //   
        Schema::create ('annonces', function (Blueprint $table) {
            $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('titre');
        $table->string('type');
        $table->bigInteger('surface');
        $table->bigInteger('prix');
        $table->string('wilaya');
        $table->string('description');
        $table->text("image_index");
        $table->string('adresse');
        $table->string('transaction');
        $table->string('nom');
        $table->string('email');
        $table->bigInteger('telephone'); 
        $table->integer('disponible')->nullable();
        $table->timestamps();
 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    /*     Schema::table('annonces', function (Blueprint $table) {
            $table->dropForeign('annonces_last_offre_id_foreign');
            $table->dropColumn('last_offre_id');

            DB::unprepared('DROP TRIGGER IF EXISTS annonces_last_offre_id');
        }); */
        Schema::dropIfExists('annonces');
    }
};



