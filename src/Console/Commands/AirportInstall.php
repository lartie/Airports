<?php

namespace LArtie\Airports\Console\Commands;

use Illuminate\Console\Command;
use LArtie\Airports\Dump\AirportsSeeder;
use LArtie\Airports\Models\Country;

class AirportInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'airports:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Установить пакет';

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
        if ($this->confirm('Вы действительно хотите установить список аэропортов?')) {

            $data = $this->getListOfAirports();

            $bar = $this->output->createProgressBar(count($data));

            foreach ($data as $key => $value) {

                $bar->advance();

                $this->saveAirport($value);
            }

            $bar->finish();


            $this->line('');
            $this->line('');
            $this->info('Информация о аэропортах установлена успешно!');
            $this->line('');
        }
    }

    /**
     * @return array
     */
    private function getListOfAirports()
    {
        $data = file_get_contents(resource_path('assets/airports.json'));

        return json_decode($data, true);
    }

    /**
     * @param array $value
     * @return bool
     */
    private function saveAirport(array $value)
    {
        /** @var Country $country */
        $country = Country::where('name_en', $value['country_eng'])->first();

        if (!$country) {
            $country = Country::create([
                'name_en' => $value['country_eng'],
                'name_ru' => $value['country_rus'],
                'iso_code' => $value['iso_code'],
            ]);
        }

        /** @var City $city */
        $city = $country->cities()->where('name_en', $value['city_eng'])->first();

        if (!$city) {
            $city = $country->cities()->firstOrCreate([
                'name_en' => $value['city_eng'],
                'name_ru' => $value['city_rus'] ?? null,
            ]);
        }

        /** @var Airport $airport */
        $airport = $city->airports()->where('iata_code', $value['iata_code'])->orWhere('icao_code', $value['icao_code'])->first();

        if (!$airport) {
            $airport = $city->airports()->create([
                'iata_code' => $value['iata_code'],
                'icao_code' => $value['icao_code'],
                'gmt_offset' => $value['gmt_offset'],
            ]);
        }

        return true;
    }
}
