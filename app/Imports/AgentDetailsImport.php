<?php

namespace App\Imports;

use App\Models\AgentDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AgentDetailsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new AgentDetail([
            'district_id' => $this->getDistrictId($row['district']), // Map district name to ID
            'state_agent_name-en' => strval($row['state_agent_name']),
            'state_agent_name_np' => strval($row['state_agent_name']),
            'address_en' => strval($row['address'] ?? ''),
            'address_np' => strval($row['address'] ?? ''),
            'contact_no' => strval($row['contact_number'] ?? ''), // Map contact_number to contact_no
            'contact_person_en' => strval($row['contact_person'] ?? ''),
            'contact_person_np' => strval($row['contact_person'] ?? ''),
            'display_order' => (int) ($row['display_order'] ?? 0),
            'is_published' => strtolower($row['published']) === 'yes', // Convert Yes/No to boolean
        ]);
    }

    // Helper function to map district name to ID
    private function getDistrictId(string $districtName): int
    {
        $district = \App\Models\District::where('name_en', $districtName)->first();
        if (!$district) {
            throw new \Exception("District not found: {$districtName}");
        }
        return $district->id;
    }
}
