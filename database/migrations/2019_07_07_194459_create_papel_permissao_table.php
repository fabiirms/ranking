<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapelPermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('papel_permissao', function (Blueprint $table) {
            $table->integer('permissao_id')->unsigned();
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');

            $table->integer('papel_id')->unsigned();
            $table->foreign('papel_id')->references('id')->on('papeis')->onDelete('cascade');

            $table->primary(['permissao_id','papel_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('papel_permissao');
    }
}
