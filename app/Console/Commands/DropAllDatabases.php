<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropAllDatabases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:fresh-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all databases in the application, run seeds';

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
        $tables = DB::connection('accon')->select('SHOW TABLES');
        $colname = 'Tables_in_accon';
        foreach ($tables as $table) {
            Schema::connection('accon')->drop($table->$colname);
        }
        $this->call('migrate:fresh', ['--seed' => true]);
    }
}
