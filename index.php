<?php

require "./vendor/autoload.php";

use Dotenv\Dotenv;
use EScooters\Importers\BirdDataImporter;
use EScooters\Importers\BoltDataImporter;
use EScooters\Importers\DataImporter;
use EScooters\Importers\DottDataImporter;
use EScooters\Importers\HelbizDataImporter;
use EScooters\Importers\LimeDataImporter;
use EScooters\Importers\LinkDataImporter;
use EScooters\Importers\NeuronDataImporter;
use EScooters\Importers\QuickDataImporter;
use EScooters\Importers\SpinDataImporter;
use EScooters\Importers\TierDataImporter;
use EScooters\Importers\VoiDataImporter;
use EScooters\Importers\WhooshDataImporter;
use EScooters\Models\Repositories\Cities;
use EScooters\Models\Repositories\Countries;
use EScooters\Models\Repositories\Providers;
use EScooters\Services\MapboxGeocodingService;
use EScooters\Services\QuickChartIconsService;
use EScooters\Utils\BuildInfo;

Dotenv::createImmutable(__DIR__)->load();
$token = $_ENV["VUE_APP_MAPBOX_TOKEN"];

$cities = new Cities();
$countries = new Countries();
$providers = new Providers();

/** @var array<DataImporter> $dataImporters */
$dataImporters = [
    new BoltDataImporter($cities, $countries), /*100% works*/
    new SpinDataImporter($cities, $countries), /*100% works*/
    new NeuronDataImporter($cities, $countries), /*100% works*/
    new HelbizDataImporter($cities, $countries), /*100% works*/
    new WhooshDataImporter($cities, $countries), /*100% works*/
    new QuickDataImporter($cities, $countries), /*100% works*/
    new VoiDataImporter($cities, $countries), /*100% works*/
    new BirdDataImporter($cities, $countries), /*50% works - some cities are not assigned*/

//    new LimeDataImporter($cities, $countries), /*doesn't work - import failed*/
//    new TierDataImporter($cities, $countries), /*doesn't work - error*/
//    new LinkDataImporter($cities, $countries), /*doesn't work - 0 cities fetched*/
//    new DottDataImporter($cities, $countries), /*doesn't work - 0 cities fetched*/
];

$timestamp = date("Y-m-d H:i:s");
echo "Build date: $timestamp" . PHP_EOL . PHP_EOL;

foreach ($dataImporters as $dataImporter) {
    try {
        $provider = $dataImporter->extract()->transform()->load();
    } catch (Throwable $exception) {
        echo $exception->getMessage() . PHP_EOL;
        continue;
    }

    $providers->add($provider);

    echo "{$provider->getCities()->count()} cities fetched for {$provider->getName()}." . PHP_EOL;
}

$count = count($cities->all());
echo PHP_EOL . "$count cities fetched." . PHP_EOL;

$mapbox = new MapboxGeocodingService($token);
$mapbox->setCoordinatesToCities($cities);

$mapbox = new QuickChartIconsService();
$mapbox->generateCityIcons($cities);

$info = new BuildInfo(
    timestamp: $timestamp,
    citiesCount: $count,
    providersCount: count($providers->jsonSerialize()),
);

file_put_contents("./public/data/cities.json", json_encode($cities, JSON_UNESCAPED_UNICODE));
file_put_contents("./public/data/countries.json", json_encode($countries, JSON_UNESCAPED_UNICODE));
file_put_contents("./public/data/providers.json", json_encode($providers, JSON_UNESCAPED_UNICODE));
file_put_contents("./public/data/info.json", json_encode($info, JSON_UNESCAPED_UNICODE));
