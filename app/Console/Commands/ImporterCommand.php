<?php

namespace App\Console\Commands;

use App\Service\Importer\ArchiveImport;
use Illuminate\Console\Command;

class ImporterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dgno:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'gutenberg importer from archive.org';
    /**
     * @var ArchiveImport
     */
    private $archiveImport;

    /**
     * Create a new command instance.
     *
     * @param ArchiveImport $archiveImport
     */
    public function __construct(ArchiveImport $archiveImport)
    {
        parent::__construct();
        $this->archiveImport = $archiveImport;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->archiveImport->setBaseUrl("http://archive.org/details/gutenberg?");
        $this->archiveImport->scanAndImport();
    }
}
