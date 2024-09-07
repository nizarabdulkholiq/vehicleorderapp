<?php

namespace App\Exports;

use App\Models\SubmissionList;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SubmissionsExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        return SubmissionList::query()
            ->whereBetween('created_at', [$this->from, $this->to]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Vehicle ID',
            'Submission Date',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}
