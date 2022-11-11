<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Str;
class CreatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:post {--post=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $count = $this->option('post');
        $bar   = $this->output->createProgressBar($count);
        $bar->start();
        for ($i=0; $i < $count ; $i++) {
            $title = Str::random(10);
            $body  = Str::random(5);
            $id    = '1';

            Post::create([
                'title'  => $title,
                'body'   => $body,
                'user_id'=> $id
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info($count.' Post(s) successfully created');
        return 0;
    }
}
