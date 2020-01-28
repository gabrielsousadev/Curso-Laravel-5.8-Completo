<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrandToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id'); //cria o campo
            $table->foreign('brand_id')->references('id')->on('brands'); //associa o campo a tabela - estrangeira
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) { //Deve ser feito o inverso
            $table->dropForeign(['brand_id']);
            $table->dropColumn(['brand_id']);
        });
    }
}
