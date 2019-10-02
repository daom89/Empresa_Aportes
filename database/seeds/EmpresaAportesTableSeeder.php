<?php

use App\Empresa_Aportes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class EmpresaAportesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('empresa_aportes')->truncate();

        $csv = Reader::createFromPath(database_path('seeds/Empresa_Aportes.csv'), 'r');
        $csv->setHeaderOffset(0);
        $csv->setDelimiter(';');
        $records = $csv->getRecords();

        foreach ($records as $offset => $record) {
            DB::table('empresa_aportes')->insert([
                'id' => $record['id'],
                'Codigo' => $record['Codigo'],
                'Tipo' => $record['Tipo'],
                'NIT' => $record['NIT'],
                'Administradora' => $record['Administradora'],
                'Nombre' => $record['Nombre'],
                'Estado' => $record['Estado'],
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
