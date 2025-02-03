<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Tecnología'],
            ['name' => 'Inteligencia Artificial'],
            ['name' => 'Criptomonedas'],
            ['name' => 'Inversiones'],
            ['name' => 'Análisis de mercado'],
            ['name' => 'Noticias financieras'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->whereIn('name', [
            'Tecnología',
            'Inteligencia Artificial',
            'Criptomonedas',
            'Inversiones',
            'Análisis de mercado',
            'Noticias financieras'
        ])->delete();
    }
};
