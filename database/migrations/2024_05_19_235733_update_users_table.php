<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('birth_date')->after('avatar')->nullable();
            $table->string('address')->after('birth_date')->nullable();
            $table->integer('address_number')->after('address')->nullable();
            $table->string('neighborhood')->after('address_number')->nullable();
            $table->string('cep')->after('neighborhood')->nullable();
            $table->string('cpf')->after('cep')->nullable();
            $table->string('rg')->after('cpf')->nullable();
            $table->string('council_registry')->after('rg')->nullable();
            $table->string('main_phone')->after('council_registry')->nullable();
            $table->string('other_phone')->after('main_phone')->nullable();
            $table->enum('user_type', ['VOL', 'CLT', 'CDR', 'EST', 'AUT'])->default('VOL')->after('other_phone')->nullable();
            $table->string('bank')->after('user_type')->nullable();
            $table->string('bank_agency')->after('bank')->nullable();
            $table->string('bank_account')->after('bank_agency')->nullable();
            // Adding foreign key constraints
            $table->unsignedBigInteger('office_id')->nullable();
            $table->unsignedBigInteger('permission_group_id')->nullable();
            $table->unsignedBigInteger('user_type_id')->nullable();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('permission_group_id')->references('id')->on('permission_groups')->onDelete('cascade');
            $table->foreign('user_type_id')->references('id')->on('user_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['office_id']);
            $table->dropForeign(['permission_group_id']);
            $table->dropForeign(['user_type_id']);
            $table->dropColumn([
                'birth_date',
                'address',
                'address_number',
                'neighborhood',
                'cep',
                'cpf',
                'rg',
                'council_registry',
                'main_phone',
                'other_phone',
                'user_type',
                'bank',
                'bank_agency',
                'bank_account',
                'office_id',
                'permissions_id',
                'user_type_id'
            ]);
        });
    }
};
