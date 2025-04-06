<?php

namespace App\Exports;

use App\Models\AgentDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AgentDetailsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return AgentDetail::all();
    }

    public function headings(): array
    {
        return [
            'district_id',
            'state_agent_name',
            'address',
            'contact_no',
            'contact_person',
            'display_order',
            'is_published',
        ];
    }
}
