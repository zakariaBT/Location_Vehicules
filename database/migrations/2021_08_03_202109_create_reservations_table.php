<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('Status')->nullable();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
            $table->foreignId('vehicule_id')->constrained('vehicules')->onUpdate('cascade');
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->onUpdate('cascade');
            $table->foreignId('start_agency')->constrained('agencies')->onUpdate('cascade');
            $table->foreignId('end_agency')->constrained('agencies')->onUpdate('cascade');
            $table->dateTime('start_date', $precision = 0);
            $table->dateTime('end_date', $precision = 0);
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
        Schema::dropIfExists('reservations');
    }
}
