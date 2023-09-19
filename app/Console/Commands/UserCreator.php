<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user:create {--email= : User email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');
        if(!$email){
            $this->error("Please provide your email");
            return self::FAILURE;
        }

        $exist = User::where('email', $email)->first();
        if($exist !== null){
            $this->error("This email has been used.");
            return self::FAILURE;
        }

        $name = $this->ask('What is your name');
        $password = $this->secret("What is your password?");

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        $this->info("User has been created with this information");
        $this->table(['name', 'email', 'password'], [[
            $user->name, $user->email, $user->password
        ]]);

        return self::SUCCESS;
    }
}
