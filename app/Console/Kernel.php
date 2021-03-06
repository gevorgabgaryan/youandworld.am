<?php

namespace Numerus\Console;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use App\Http\Controllers\MailChimpController;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        'Numerus\Console\Commands\SendComp',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
       protected function schedule(Schedule $schedule)

        {
        
            $schedule->command('send:Comp')->dailyAt('5:00')->withoutOverlapping();
       
          
        }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
