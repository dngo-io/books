<?php

namespace App\Console\Commands;

use App\Service\Importer\ArchiveImport;
use App\Service\Importer\IsKulturImport;
use Illuminate\Console\Command;

class ImporterIsKulturCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dngo:import:iskultur';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'is kultur temel 100 eser';
    /**
     * @var ArchiveImport
     */
    private $importer;

    /**
     * Create a new command instance.
     *
     * @param IsKulturImport $importer
     */
    public function __construct(IsKulturImport $importer)
    {
        parent::__construct();
        $this->importer = $importer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->importer->scanAndImport();

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
