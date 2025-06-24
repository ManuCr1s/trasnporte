<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('correlative')->unique();
            $table->boolean('status');
            $table->string('description');
            $table->string('id_person',8);
            $table->unsignedBigInteger('id_rate');
            $table->unsignedBigInteger('id_period');
            $table->string('created_by',8)->nullable();
            $table->string('updated_by',8)->nullable();
            $table->foreign('created_by')->references('dni')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('dni')->on('users')->nullOnDelete();
            $table->foreign('id_person')->references('dni')->on('persons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_rate')->references('id')->on('rates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_period')->references('id')->on('periods')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('deleted_at',$precision=3);
            $table->dateTime('created_at',$precision=3);
            $table->dateTime('updated_at',$precision=3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
