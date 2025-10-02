<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Adiciona a coluna para o token de 4 dígitos
            $table->string('verification_token')->nullable()->after('email');
            
            // Adiciona a coluna para a validade do token
            $table->timestamp('token_expires_at')->nullable()->after('verification_token'); 
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('verification_token');
            $table->dropColumn('token_expires_at');
        });
    }
};

