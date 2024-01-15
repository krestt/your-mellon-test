<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;

class CleanPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft delete posts that had no interaction for more than 1 year.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $timspan = Carbon::now()->subYears(1)->format('Y-m-d');
        $c_posts = Post::whereHas('comments', function($query) use ($timspan) {
                        $query->whereDate('created_at', '<', $timspan);
                     })
                     ->delete();

        $posts = Post::whereDate('created_at', '<', $timspan)
                     ->doesntHave('comments')
                     ->delete();

        $this->info('Posts with comments older than 1 year was soft-deleted.');
    }
}
