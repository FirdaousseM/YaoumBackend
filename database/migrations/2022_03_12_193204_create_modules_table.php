<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->bigInteger('id_programme')->unsigned()->index();
            $table->bigInteger('id_user')->unsigned()->index();
            $table->timestamps();

            $table->foreign('id_programme')->references('id')->on('programmes')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules', function (Blueprint $table) {

            $table->dropForeign('modules_id_programme_foreign');
            $table->dropIndex('modules_id_programme_index');
            $table->dropColumn('id_programme');

            $table->dropForeign('modules_id_user_foreign');
            $table->dropIndex('modules_id_user_index');
            $table->dropColumn('id_user');
        });

    }
}
