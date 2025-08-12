<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->timestamp('to_ship_at')->nullable()->after('order_date');
            $table->timestamp('to_receive_at')->nullable()->after('to_ship_at');
            $table->timestamp('completed_at')->nullable()->after('to_receive_at');
            $table->timestamp('cancelled_at')->nullable()->after('completed_at');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['to_ship_at', 'to_receive_at', 'completed_at', 'cancelled_at']);
        });
    }
};
