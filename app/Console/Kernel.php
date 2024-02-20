<?php

namespace App\Console;

use App\Console\Commands\DeleteProduct;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        DeleteProduct::class,
    ];
    protected function schedule(Schedule $schedule): void
    {
       $schedule->command('product:delete')->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @param array $array
     */

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }



}
