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
        DB::statement("CREATE TABLE revenues(
            id integer AUTO_INCREMENT PRIMARY KEY,
            code integer NOT NULL UNIQUE,
            description varchar(255) NOT NULL,
            version integer NOT NULL,
            status boolean DEFAULT true,
            created_at TIMESTAMP,
            updated_at TIMESTAMP)");
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenues');
    }
};
