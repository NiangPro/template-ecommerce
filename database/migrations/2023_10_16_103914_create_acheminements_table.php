<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acheminements', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("pays");
            $table->unsignedInteger("nbrejour_bateau")->default(0);
            $table->unsignedInteger("nbrejour_avion")->default(0);
            $table->unsignedDouble("prix_bateau")->default(0);
            $table->unsignedDouble("prix_avion")->default(0);
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
        Schema::dropIfExists('acheminements');
    }
};
