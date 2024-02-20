<?php

namespace App\Console\Commands;

use App\Jobs\InsertTableJob;
use Illuminate\Console\Command;

class InsertTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import into table ';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        InsertTableJob::dispatch();
    }
}
