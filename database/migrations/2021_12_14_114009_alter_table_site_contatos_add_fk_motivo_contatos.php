<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSiteContatosMotivoContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            DB::statement('ALTER TABLE site_contatos MODIFY motivo BIGINT(20) UNSIGNED');
            $table->renameColumn('motivo', 'motivo_contatos_id');
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
            $table->renameColumn('motivo_contatos_id', 'motivo');
            $table->tinyInteger('motivo')->change();
        });
    }
}