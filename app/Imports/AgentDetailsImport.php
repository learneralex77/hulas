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
            'district_id' => $row['district_id'],
            'state_agent_name' => json_encode(explode(',', $row['state_agent_name'])), // Example: convert CSV string to JSON
            'address' => json_encode(explode(',', $row['address'])),
            'contact_no' => json_encode(explode(',', $row['contact_no'])),
            'contact_person' => json_encode(explode(',', $row['contact_person'])),
            'display_order' => $row['display_order'],
            'is_published' => $row['is_published'] == '1', // Assuming '1' is true
        ]);
    }
}
