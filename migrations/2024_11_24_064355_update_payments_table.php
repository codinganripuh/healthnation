<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('payments', function (Blueprint $table) {
        if (!Schema::hasColumn('payments', 'first_name')) {
            $table->string('first_name')->nullable();
        }

        if (!Schema::hasColumn('payments', 'last_name')) {
            $table->string('last_name')->nullable();
        }

        if (!Schema::hasColumn('payments', 'location')) {
            $table->string('location')->nullable();
        }

        if (!Schema::hasColumn('payments', 'email')) {
            $table->string('email')->nullable();
        }

    
        if (!Schema::hasColumn('payments', 'method')) {
            $table->string('method')->default('visa');
        }
    });
}

public function down()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropColumn(['first_name', 'last_name', 'location', 'email']);
    });
}
};