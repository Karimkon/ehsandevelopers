<?php

namespace Database\Seeders;

use App\Models\TrustedClient;
use Illuminate\Database\Seeder;

class TrustedClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['name' => 'Bebamart Global',   'industry' => 'E-Commerce & Marketplace', 'sort_order' => 1],
            ['name' => 'ADVANTA',           'industry' => 'Construction Management',  'sort_order' => 2],
            ['name' => 'Chewies',           'industry' => 'Restaurant & Food Tech',   'sort_order' => 3],
            ['name' => 'Rent Today',        'industry' => 'Property Management',      'sort_order' => 4],
            ['name' => 'Bakery MS',         'industry' => 'Bakery & Production',      'sort_order' => 5],
            ['name' => 'Travel Bookings',   'industry' => 'Travel & Tourism',         'sort_order' => 6],
        ];

        foreach ($clients as $client) {
            TrustedClient::updateOrCreate(
                ['name' => $client['name']],
                array_merge($client, ['is_active' => true])
            );
        }
    }
}
