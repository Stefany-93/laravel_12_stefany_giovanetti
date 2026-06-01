<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sandwiches', function (Blueprint $table) {

            if (!Schema::hasColumn('sandwiches', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id')->nullable();
                $table->foreign('user_id')->references('id')->on('users');
            }

    });

}

public function down(): void
    {

        Schema::table('sandwiches', function (Blueprint $table) {

            if (Schema::hasColumn('sandwiches', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

        });

}

};
