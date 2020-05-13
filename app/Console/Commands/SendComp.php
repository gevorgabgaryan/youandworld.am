<?php

namespace Numerus\Console\Commands;

use Illuminate\Console\Command;
use Numerus\Http\Controllers\MailChimpController;
class SendComp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:Comp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Command description';

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
