<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->text('admin_notes')->nullable()->after('status');
            $table->timestamp('approved_at')->nullable()->after('admin_notes');
            $table->foreignId('approved_by')->nullable()->after('approved_at')->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('admin_notes');
            $table->dropForeign(['approved_by']);
            $table->dropColumn('approved_by');
            $table->dropColumn('approved_at');
        });
    }
};