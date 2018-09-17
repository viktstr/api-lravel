<?php

namespace App\Console\Commands;

use App\Common\Client\ClientInterface;
use App\Common\Client\DummyStructureClient;
use App\Common\Parser\ParserFactory;
use App\Common\StructureDto;
use App\Entity\Source;
use App\Entity\Structure;
use Illuminate\Console\Command;

/**
 * Class GetStructure
 * @package App\Console\Commands
 */
class GetStructure extends Command
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'structure:get {resource}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получаем структуры';

    /**
     * GetStructure constructor.
     * @param DummyStructureClient $client
     */
    public function __construct(DummyStructureClient $client)
    {
        $this->client = $client;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $resource = $this->argument('resource');

        $response = $this->client->send($resource, 'get');

        $data = ParserFactory::create($response)
            ->parse($response);

        $structureDto = StructureDto::createByParams($data);

        $source = Source::query()
            ->where('name', '=', $resource)
            ->first();

        $structure = Structure::create($structureDto, $source->id);
        $structure->save();
    }
}
