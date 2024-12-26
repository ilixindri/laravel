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
        Schema::create('TableS', function (Blueprint $Table) {
            $Table->id();
            $Table->text('Name');
            $Table->unsignedBigInteger('System_Id');
            $Table->boolean('Is_PermanentLY_DeletED')->default(false);
            $Table->timestamps();
            $Table->softDeletes();

            $Table->foreign('System_Id')->references('id')->on('SytemS')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
