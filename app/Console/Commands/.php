<?php

namespace Numerus\Console\Commands;
use Numerus\Http\Controllers\MailChimpController;
use Illuminate\Console\Command;
use Numerus\Repositories\ArticlesRepository;

class SendCompaign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:Compaign';

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
     * @return mixed
     */

 
    public function handle()
    { 
        app()->call('Numerus\Http\Controllers\MailChimpController@sendCompaign');
      
        
        
    }
}
