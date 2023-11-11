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
        Schema::create('services_talents', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBiginteger('talents_id')->unsigned()->nullable();
            $table->unsignedBiginteger('services_id')->unsigned()->nullable();

            $table->foreign('talents_id')->references('id')
                 ->on('talents')->onDelete('set null');
            $table->foreign('services_id')->references('id')
                ->on('services')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_talents');
    }
};
