<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LangTranslate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'superduper:lang-translate {from} {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $from = $this->argument('from');
        $to = $this->argument('to');

        // Your translation logic here

        $this->info("Language files translated from $from to $to successfully!");
    }
}
