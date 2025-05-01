<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('manifestacaos')) {
            // Verificar se o tipo ENUM já existe antes de renomeá-lo
            DB::statement("DO $$ BEGIN
                IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'status_enum') THEN
                    CREATE TYPE status_enum AS ENUM ('pendente', 'respondida', 'em análise');
                END IF;
            END $$;");

            // Renomear o tipo antigo, se existir
            DB::statement("DO $$ BEGIN
                IF EXISTS (SELECT 1 FROM pg_type WHERE typname = 'status_enum') THEN
                    ALTER TYPE status_enum RENAME TO status_enum_old;
                END IF;
            END $$;");

            // Criar um novo tipo ENUM com o valor 'visualizado'
            DB::statement("CREATE TYPE status_enum AS ENUM ('pendente', 'visualizado', 'respondida', 'em análise')");

            // Remover o valor padrão da coluna antes de alterar o tipo
            DB::statement("ALTER TABLE manifestacaos ALTER COLUMN status DROP DEFAULT");

            // Alterar a coluna para usar o novo ENUM
            DB::statement("ALTER TABLE manifestacaos ALTER COLUMN status TYPE status_enum USING status::text::status_enum");

            // Redefinir o valor padrão da coluna
            DB::statement("ALTER TABLE manifestacaos ALTER COLUMN status SET DEFAULT 'pendente'");

            // Excluir o tipo antigo, se existir
            DB::statement("DO $$ BEGIN
                IF EXISTS (SELECT 1 FROM pg_type WHERE typname = 'status_enum_old') THEN
                    DROP TYPE status_enum_old;
                END IF;
            END $$;");
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('manifestacaos')) {
            // Reverter para o ENUM original
            DB::statement("CREATE TYPE status_enum_old AS ENUM ('pendente', 'respondida', 'em análise')");
            DB::statement("ALTER TABLE manifestacaos ALTER COLUMN status TYPE status_enum_old USING status::text::status_enum_old");
            DB::statement("DROP TYPE status_enum");
            DB::statement("ALTER TYPE status_enum_old RENAME TO status_enum");
        }
    }
};