<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
      
        $table->decimal('balance', 15, 2)->default(0)->after('password');
        $table->string('profile_photo')->nullable()->after('balance');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['username', 'balance', 'profile_photo']);
    });
}

};
