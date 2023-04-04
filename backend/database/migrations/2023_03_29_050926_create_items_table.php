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
        DB::statement("CREATE TABLE items(
            id integer AUTO_INCREMENT PRIMARY KEY,
            revenue_code integer NOT NULL,
            ingredient_code integer NOT NULL,
            version integer NOT NULL,
            position integer NOT NULL,
            created_at TIMESTAMP,
            updated_at TIMESTAMP)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
