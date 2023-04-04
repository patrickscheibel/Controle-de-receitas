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
        DB::statement("INSERT INTO ingredients (code, description, amount)
                       VALUES ('1', 'Milho', '1.222000'), ('2', 'Farinha', '500')");

        DB::statement("INSERT INTO revenues (code, description, version)
        VALUES ('1', 'Ração inicial', 1), ('2', 'Ração especial', 1)");

        DB::statement("INSERT INTO items (revenue_code, ingredient_code, version, position)
        VALUES ('1', '1', 1, 1), ('1', '2', 1, 2), ('2', '1', 1, 1)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
