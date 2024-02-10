<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        \App\Models\User::factory()->create([
            'name' => 'João',
            'status' => 'ATIVO',
            'ap' => '101A',
            'email' => '101a@reseuropa',
            'password' => bcrypt('ap101a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'IMDESA',
            'status' => 'INATIVO',
            'ap' => '102A',
            'email' => '102a@reseuropa',
            'password' => bcrypt('ap101a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Alan',
            'status' => 'ATIVO',
            'ap' => '103A',
            'email' => '103a@reseuropa',
            'password' => bcrypt('ap103a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Moacyr',
            'status' => 'INATIVO',
            'ap' => '104A',
            'email' => '104a@reseuropa',
            'password' => bcrypt('ap104a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Rotev',
            'status' => 'INATIVO',
            'ap' => '201A',
            'email' => '201a@reseuropa',
            'password' => bcrypt('ap201a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Márcio',
            'status' => 'ATIVO',
            'ap' => '202A',
            'email' => '202a@reseuropa',
            'password' => bcrypt('ap202a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Rosânia',
            'status' => 'ATIVO',
            'ap' => '203A',
            'email' => '203a@reseuropa',
            'password' => bcrypt('ap203a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Diogo',
            'status' => 'ATIVO',
            'ap' => '204A',
            'email' => '204a@reseuropa',
            'password' => bcrypt('ap204a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Luiz Fernando',
            'status' => 'ATIVO',
            'ap' => '301A',
            'email' => '301a@reseuropa',
            'password' => bcrypt('ap301a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Aline',
            'status' => 'ATIVO',
            'ap' => '302A',
            'email' => '302a@reseuropa',
            'password' => bcrypt('ap302a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Wilson',
            'status' => 'ATIVO',
            'ap' => '303A',
            'email' => '303a@reseuropa',
            'password' => bcrypt('ap303a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Ivete',
            'status' => 'ATIVO',
            'ap' => '304A',
            'email' => '304a@reseuropa',
            'password' => bcrypt('ap304a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Alexander',
            'status' => 'ATIVO',
            'ap' => '401A',
            'email' => '401a@reseuropa',
            'password' => bcrypt('ap401a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'IMDESA',
            'status' => 'INATIVO',
            'ap' => '402A',
            'email' => '402a@reseuropa',
            'password' => bcrypt('ap402a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'Erica',
            'status' => 'ATIVO',
            'ap' => '403A',
            'email' => '403a@reseuropa',
            'password' => bcrypt('ap403a'),
        ])->assignRole($user);
        \App\Models\User::factory()->create([
            'name' => 'IMDESA',
            'status' => 'INATIVO',
            'ap' => '404A',
            'email' => '404a@reseuropa',
            'password' => bcrypt('ap404a'),
        ])->assignRole($user);

        DB::statement("INSERT INTO contas (mesAno, descricao, campo1, campo2, campo3, valorPagar, tipoCobranca,file, created_at, updated_at) VALUES
        ('02/2024', 'COPASA', '1406', '1509', '103', 1051.63, 'BLA;ATIVO', 'contas/202402/cemig.pdf', '2024-02-10 08:59:25', '2024-02-10 08:59:25'),
        ('02/2024', 'CEMIG', '2887', '3003', '116', 118.70, 'BLA;ATIVO', 'contas/202402/copasa.pdf', '2024-02-10 09:01:19', '2024-02-10 09:01:19'),
        ('02/2024', 'SERVIÇOS', 'LIMPEZA DE PISCINA', 'Wellerson', 'CONCLUIDO', 100.00, 'BLA;ATIVO', '', '2024-02-10 09:02:32', '2024-02-10 09:02:32')");

        //DB::statement("INSERT INTO condominio (mesAno, apId, totalContas, caixa, totalFinal, valorPagar, status, created_at, updated_at) VALUES
        //('02/2024', '101A', '1406', '1509', '103', 1051.63, 'BLA;ATIVO', '2024-02-10 08:59:25', '2024-02-10 08:59:25'),");
    }
}
