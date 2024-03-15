<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerToAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER annonces_last_offre_id
            AFTER INSERT ON offres
            FOR EACH ROW
            BEGIN
                UPDATE annonces
                SET last_offre_id = (
        SELECT id FROM offres
        WHERE annonce_id = NEW.annonce_id
        ORDER BY prix_propose DESC
        LIMIT 1
    )
                WHERE annonces.id = NEW.annonce_id;
            END
        ');
        DB::unprepared('
        CREATE TRIGGER annonces_last_offre_id_delete
        AFTER DELETE ON offres
        FOR EACH ROW
        BEGIN
            UPDATE annonces
            SET last_offre_id = (
                SELECT id FROM offres
                WHERE annonce_id = OLD.annonce_id
                ORDER BY prix_propose DESC
                LIMIT 1
            )
            WHERE annonces.id = OLD.annonce_id;
        END
    ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS annonces_last_offre_id');
    }
}
