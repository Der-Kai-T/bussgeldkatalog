<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('allegations', function (Blueprint $table) {
            $table->foreignUuid("infringement_id")->nullable()->constrained("infringements");
        });
    }

    public function down(): void
    {
        Schema::table('allegations', function (Blueprint $table) {
            //
        });
    }
};
