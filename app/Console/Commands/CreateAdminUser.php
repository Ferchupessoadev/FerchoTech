<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin {name} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un nuevo usuario administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!Role::where('name', 'admin')->exists()) {
            $this->warn('El rol "admin" no existe. Ejecutando RoleSeeder...');
            Artisan::call('db:seed', ['--class' => 'Database\Seeders\RoleSeeder']);
            $this->info('RoleSeeder ejecutado con éxito.');
        }

        $name = $this->argument('name');
        $email = $this->argument('email');

        $password = $this->secret('Escribe la contraseña para el nuevo administrador');

        if (Str::length($password) >= 8)) {
            $this->error('La contraseña debe tener al menos 8 caracteres.');
            return;
        }

        if (User::where('email', $email)->exists()) {
            $this->error('El usuario ya existe.');
            return;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('admin');

        $this->info("¡Usuario administrador {$email} creado y rol asignado correctamente!");
    }
}
