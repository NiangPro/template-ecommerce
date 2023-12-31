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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->decimal('total_amount', 10, 2);
            $table->integer('statut')->default(0);
            $table->decimal('shipping', 8, 2)->default(0);
            $table->unsignedBigInteger("acheminement_id")->nullable();
            $table->foreign("acheminement_id")->references("id")->on("acheminements")->onDelete("cascade");
            $table->unsignedDouble("prix_acheminement")->default(0);
            $table->text('comments')->nullable();
            $table->string('reference')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};
