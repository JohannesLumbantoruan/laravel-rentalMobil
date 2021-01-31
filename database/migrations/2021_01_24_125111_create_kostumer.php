<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKostumer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kostumer', function (Blueprint $table) {
            $table->increments('kostumer_id');
            $table->string('kostumer_nama');
            $table->text('alamat');
            $table->string('kostumer_jk');
            $table->string('kostumer_hp');
            $table->string('kostumer_ktp');
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
        Schema::dropIfExists('kostumer');
    }
}
