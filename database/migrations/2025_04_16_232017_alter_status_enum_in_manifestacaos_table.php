<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Renomear o tipo antigo
        DB::statement("ALTER TYPE status_enum RENAME TO status_enum_old");

        // Criar um novo tipo ENUM com o novo valor 'visualizado'
        DB::statement("CREATE TYPE status_enum AS ENUM ('pendente', 'visualizado', 'respondida', 'em análise')");

        // Alterar a coluna para usar o novo ENUM
        DB::statement("ALTER TABLE manifestacaos ALTER COLUMN status TYPE status_enum USING status::text::status_enum");

        // Excluir o tipo antigo
        DB::statement("DROP TYPE status_enum_old");
    }

    public function down(): void
    {
        // Reverter para o ENUM original
        DB::statement("CREATE TYPE status_enum_old AS ENUM ('pendente', 'respondida', 'em análise')");
        DB::statement("ALTER TABLE manifestacaos ALTER COLUMN status TYPE status_enum_old USING status::text::status_enum_old");
        DB::statement("DROP TYPE status_enum");
        DB::statement("ALTER TYPE status_enum_old RENAME TO status_enum");
    }
};
