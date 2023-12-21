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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nom");
            $table->text("description")->nullable();
            $table->text("supplementaire")->nullable();
            $table->double("prix");
            $table->double("qte");
            $table->double("poids")->default(0);
            $table->string("image")->nullable();
            $table->integer("type")->default(0);
            $table->double("reduction")->nullable();
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->unsignedBigInteger("acheminement_id")->nullable();
            $table->foreign("acheminement_id")->references("id")->on("acheminements")->onDelete("cascade");
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
        Schema::dropIfExists('products');
    }
};
