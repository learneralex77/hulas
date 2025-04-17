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
                'State Agent Name (EN)' => $agent->state_agent_name_en,
                'State Agent Name (NP)' => $agent->state_agent_name_np,
                'Address (EN)' => $agent->address_en,
                'Address (NP)' => $agent->address_np,
                'Contact Number' => $agent->contact_no,
                'Contact Person (EN)' => $agent->contact_person_en,
                'Contact Person (NP)' => $agent->contact_person_np,
                'Display Order' => $agent->display_order,
                'Published' => $agent->is_published ? 'Yes' : 'No',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'District',
            'State Agent Name (EN)',
            'State Agent Name (NP)',
            'Address (EN)',
            'Address (NP)',
            'Contact Number',
            'Contact Person (EN)',
            'Contact Person (NP)',
            'Display Order',
            'Published',
        ];
    }
}
