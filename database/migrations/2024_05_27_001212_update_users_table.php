<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn(['address', 'address_number', 'neighborhood', 'cep']);

            $table->foreignId('address_id')->nullable()->constrained('addresses');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove a coluna address_id
            $table->dropForeign(['address_id']);
            $table->dropColumn('address_id');

            // Adiciona novamente as colunas de endereço antigas
            $table->string('address')->nullable();
            $table->string('address_number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('cep')->nullable();
        });

    }
};
