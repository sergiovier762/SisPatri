<?php

namespace app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use app\Models\User; // Certifique-se de que o caminho do modelo está correto

class HashPasswords extends Command
{
    protected $signature = 'passwords:hash';
    protected $description = 'Hash existing plain text passwords using Bcrypt';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Verifique se a senha já está com hash
            if (!Hash::needsRehash($user->senha)) {
                continue;
            }

            // Atualize a senha para usar Bcrypt
            $user->senha = Hash::make($user->senha);
            $user->save();

            $this->info("Senha atualizada para o usuário: {$user->usuario}");
        }

        $this->info('Todas as senhas foram atualizadas.');
    }
}