<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $now = now();

        DB::table('settings')->insert([
            [
                'key'        => 'tawkto_property_id',
                'value'      => '',
                'type'       => 'text',
                'group'      => 'integrations',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key'        => 'ga4_measurement_id',
                'value'      => '',
                'type'       => 'text',
                'group'      => 'integrations',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('settings')->whereIn('key', [
            'tawkto_property_id',
            'ga4_measurement_id',
        ])->delete();
    }
};
