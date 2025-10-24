<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('allegations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('law_id')->constrained('laws');
            $table->text("number");
            $table->text('text');
            $table->string('quote');
            $table->decimal('fine_regular')->nullable();
            $table->decimal('fine_min')->nullable();
            $table->string('fine_max')->nullable();
            $table->decimal('legal_maximum')->nullable();
            $table->dateTime('valid_from');
            $table->string('valid_until')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('allegations');
    }
};
