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
    protected $signature = 'dngo:import:archive {--limit=0} {--remember=0} {--scan=1}';

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
        $scan = $this->input->getOption('scan');

        try {
            $this->archiveImport->setBaseUrl("http://archive.org/details/gutenberg");

            if ($scan){
                $this->archiveImport->scan($limit,$remember);
            }

            $this->archiveImport->import();

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
