<?php

namespace App\Exports;

use App\Models\AgentDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AgentDetailsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Eager load the district relation
        return AgentDetail::with('district')->get()->map(function ($agent) {
            return [
                'District' => $agent->district->name ?? 'N/A',
                'State Agent Name' => $agent->state_agent_name,
                'Address' => $agent->address,
                'Contact Number' => $agent->contact_no,
                'Contact Person' => $agent->contact_person,
                'Display Order' => $agent->display_order,
                'Published' => $agent->is_published ? 'Yes' : 'No',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'District',
            'State Agent Name',
            'Address',
            'Contact Number',
            'Contact Person',
            'Display Order',
            'Published',
        ];
    }
}
