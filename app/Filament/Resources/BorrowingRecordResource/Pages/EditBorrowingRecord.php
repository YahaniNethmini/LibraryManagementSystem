<?php

namespace App\Filament\Resources\BorrowingRecordResource\Pages;

use App\Filament\Resources\BorrowingRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBorrowingRecord extends EditRecord
{
    protected static string $resource = BorrowingRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
