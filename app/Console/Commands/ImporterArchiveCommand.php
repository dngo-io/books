<?php

namespace App\Console\Commands;

use App\Service\Importer\ArchiveImport;
use Illuminate\Console\Command;

class ImporterArchiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dngo:import:archive {--limit=0} {--remember=0}';

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
        $limit = $this->input->getOption('limit');
        $remember = $this->input->getOption('remember');

        try {
            $this->archiveImport->setBaseUrl("http://archive.org/details/gutenberg");
            $this->archiveImport->scanAndImport($limit,$remember);

            $this->output->writeln("Finished!");
        }catch (\Exception $e) {
            $this->output->writeln("Oops!");
            $this->output->writeln($e->getMessage());
            $this->output->writeln("File: ".$e->getFile());
            $this->output->writeln("Line: ".$e->getLine());
            dump($e);
        }
    }
}
