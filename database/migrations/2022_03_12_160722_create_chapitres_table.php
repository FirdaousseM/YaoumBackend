<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapitresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapitres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('contenu');
            $table->integer('ordre_doc')->unsigned();
            $table->bigInteger('id_module')->unsigned()->index();

            $table->foreign('id_module')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapitres', function (Blueprint $table) {

            $table->dropForeign('chapitres_id_module_foreign');
            $table->dropIndex('chapitres_id_module_index');
            $table->dropColumn('id_module');
        });
    }
}
