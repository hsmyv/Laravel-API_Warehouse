<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;
class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   // protected $signature = 'user:create {--count=} {--verified}';
    protected $signature = 'user:create {--verified} {name} {email} {password}';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $bar = $this->output->createProgressBar(10);
        $bar->start();
        $bar->advance();
        $name     = $this->argument('name');
        $email    = $this->argument('email');
        $password = $this->argument('password');
        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt($password),
            'email_verified_at' => $this->option('verified') ? now() : null
        ]);
        $bar->finish();
        $this->info('Successfully created User:'.$name.'; Email:'. $email .'; Password:'. $password);

            /*
        $count = $this->option('count');
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        for($i = 1; $i <= $count; $i++)
        {
            $name = Str::random(8);
            $email = $name. '@gmail.com';
            $password = Str::random(12);
            User::create([
                'name'     => $name,
                'email'    => $email,
                'password' => bcrypt($password),
                'email_verified_at' => $this->option('verified') ? now() : null
            ]);
            $bar->advance();
        }

        $bar->finish();
        $this->info('Successfully created: '.$count.' user(s)');
        return 0;
            */
    }
}
