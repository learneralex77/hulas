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
            'state_agent_name' => json_encode([$row['state_agent_name']]),
            'address' => json_encode([$row['address']]),
            'contact_no' => json_encode([$row['contact_no']]),
            'contact_person' => json_encode([$row['contact_person']]),
            'display_order' => $row['display_order'] ?? 0,
            'is_published' => (bool) ($row['is_published'] ?? true),
        ]);
    }
}
