<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Lab;
use League\Csv\Reader;

class ImportLabs extends Command
{
    protected $signature = 'labs:import';
    protected $description = 'Import lab locations from CSV file';
    /**
     * Reads through a CSV file containing lab locations and imports them into the database.
     *
     * @return void
     */
    public function handle()
    {
        $csv = Reader::createFromPath(storage_path('app/labs.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv->getRecords() as $record) {
            $record = array_map('trim', $record);

            //for debugging, check added records
            //dd($record);

            Lab::create([
                'Title'     => $record['Title'],
                'Category'  => $record['Category'],
                'Privacy'   => $record['Privacy'],
                'Latitude'  => $record['Latitude'],
                'Longitude' => $record['Longitude'],
                'Address'   => $record['Address'],
                'City'      => $record['City'],
                'Country'   => $record['Country'],
            ]);
        }

        $this->info('Labs imported successfully!');
    }
}