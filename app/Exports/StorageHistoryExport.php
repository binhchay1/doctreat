<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Repositories\StorageHistoryRepository;

class StorageHistoryExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{

    public function collection()
    {
        $storageHistoryRepository = new StorageHistoryRepository();
        return $storageHistoryRepository->getListHistory(1);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tên sản phẩm',
            'Gía',
            'Số lượng',
            'Trạng thái',
            'Người tạo',
            'Ngày tạo',
        ];
    }


    public function columnWidths(): array
    {
        return [
            'A' => 35,
            'B' => 40,
            'C' => 35,
            'D' => 35,
            'E' => 35,
            'F' => 35,
            'G' => 35,
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function map($row): array
    {
        return [
            $row->id ? $row->id : 'N/A',
            $row->productClone->name ? $row->productClone->name : 'N/A',
            $row->productClone->price ? $row->productClone->price : 'N/A',
            $row->add_quantity ? $row->add_quantity : 'N/A',
            $row->status ? $row->status : 'N/A',
            $row->employee ? $row->employee : 'N/A',
            $row->created_at ? date("d F, Y, H:i e", strtotime($row->created_at)) : 'N/A',
        ];
    }
}
