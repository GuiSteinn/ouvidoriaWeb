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
    Schema::create('manifestacoes', function (Blueprint $table) {
        $table->id();
        $table->string('nome')->nullable(); // pode ser anônimo
        $table->string('email')->nullable();
        $table->enum('tipo', ['reclamação', 'elogio', 'sugestão', 'denúncia']);
        $table->text('mensagem');
        $table->enum('status', ['pendente', 'visualizado', 'respondida', 'em análise'])->default('pendente');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manifestacoes');
    }
};
