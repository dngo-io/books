<?php

namespace App\Console\Commands;

use App\Service\Importer\EuropeanaImport;
use Illuminate\Console\Command;

class ImporterEuropeanaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dngo:import:europeana {--limit=0} {--remember=0} {--scan=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'europeana importer';


    /**
     * @var EuropeanaImport
     */
    private $europeanaImport;

    /**
     * Create a new command instance.
     *
     * @param EuropeanaImport $europeanaImport
     */
    public function __construct(EuropeanaImport $europeanaImport)
    {
        parent::__construct();

        $this->europeanaImport = $europeanaImport;
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
            $url = 'https://www.europeana.eu/portal/en/search?f%5BLANGUAGE%5D%5B%5D=es&f%5BMIME_TYPE%5D%5B%5D=application%2Fpdf&f%5BREUSABILITY%5D%5B%5D=open&f%5BTEXT_FULLTEXT%5D%5B%5D=true&f%5BTYPE%5D%5B%5D=TEXT';
            $this->europeanaImport->setBaseUrl($url);

            if ($scan){
                $this->europeanaImport->scan($limit,$remember);
            }

            $this->europeanaImport->import();

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
