<?php

namespace App\Console\Commands;

use App\Common\Client\ClientInterface;
use App\Common\Client\DummyDataClient;
use App\Entity\Data;
use App\Entity\Source;
use Illuminate\Console\Command;

/**
 * Class GetData
 * @package App\Console\Commands
 */
class GetData extends Command
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
    protected $signature = 'data:get {resource}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получаем данные для отображения';

    /**
     * GetData constructor.
     * @param DummyDataClient $client
     */
    public function __construct(DummyDataClient $client)
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

        if (is_null($response) || is_int($response) != $response){
            throw new \InvalidArgumentException('Получены некорректные данные');
        }

        $source = Source::query()
            ->where('name', '=', $resource)
            ->first();

        $data = Data::create($response, $source->id);
        $data->save();
    }
}
