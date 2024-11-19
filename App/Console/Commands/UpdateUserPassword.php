<?php

namespace app\Console\Commands;

use Illuminate\Console\Command;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserPassword extends Command
{
    protected $signature = 'user:update-password {userId} {newPassword}';
    protected $description = 'Atualiza a senha de um usuário';

    public function handle()
    {
        $userId = $this->argument('userId');
        $newPassword = $this->argument('newPassword');

        $user = User::find($userId);

        if ($user) {
            $user->senha = Hash::make($newPassword);
            $user->save();
            $this->info('Senha atualizada com sucesso!');
        } else {
            $this->error('Usuário não encontrado.');
        }
    }
}