<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategorias', function (Blueprint $table) {
            $table->id();
            $table->string('nev', 30);
            $table->timestamps();
        });

        DB::table('kategorias')->insert([
            [
                'nev' => 'főétel'
            ],
            [
                'nev' => 'leves'
            ],
            [
                'nev' => 'édesség'
            ],
            [
                'nev' => 'saláta'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategorias');
    }
};
