<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('laws', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->string('short');
            $table->string('prefix')->nullable();
            $table->string('department')->nullable();
            $table->string('lead_office')->nullable();
            $table->text('internal_note')->nullable();
            $table->dateTime('valid_from');
            $table->dateTime('valid_until')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laws');
    }
};
