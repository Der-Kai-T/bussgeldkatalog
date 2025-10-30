<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('allegations', function (Blueprint $table) {
            $table->renameColumn('legal_maximum', 'legal_maximum_intention');
            $table->decimal('legal_maximum_careless', 14, 2)->after('legal_maximum_intention')->nullable();
            $table->decimal('legal_maximum_intention', 14, 2)->nullable()->change();

        });
    }

    public function down(): void
    {
        Schema::table('allegations', function (Blueprint $table) {
            //
        });
    }
};
