<?php

namespace App\Filament\Resources\BorrowingRecordResource\Pages;

use App\Filament\Resources\BorrowingRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBorrowingRecords extends ListRecords
{
    protected static string $resource = BorrowingRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
