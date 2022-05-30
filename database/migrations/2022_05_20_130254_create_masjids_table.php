<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasjidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masjids', function (Blueprint $table) {
            $table->id('masjid_id');
            $table->date('tgl_kas');
            $table->string('uraian');
            $table->integer('masuk')->default(0);
            $table->integer('keluar')->default(0);
            $table->enum('jenis', ['masuk', 'keluar']);
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
        Schema::dropIfExists('masjids');
    }
}
