<?php

namespace App\Filament\Resources\BorrowingRecordResource\Pages;

use App\Filament\Resources\BorrowingRecordResource;
use Filament\Infolists\Components\BadgeEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;

class ViewBorrowingRecord extends ViewRecord
{
    public static string $resource = BorrowingRecordResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('book.book_name')
                    ->label('Book Name')
                    ->extraAttributes(['class' => 'text-lg font-bold']), // Add bold styling
                TextEntry::make('member.name')
                    ->label('Borrower'),
                TextEntry::make('borrowed_at')
                    ->label('Borrowed At')
                    ->badge()
                    ->color('primary') // Highlight the borrowing date
                    ->formatStateUsing(fn($state) => date('F d, Y', strtotime($state))), // Format as a human-readable date
                TextEntry::make('due_date')
                    ->label('Due Date')
                    ->badge()
                    ->color('warning') // Highlight the due date
                    ->formatStateUsing(fn($state) => date('F d, Y', strtotime($state))), // Format as a human-readable date
                TextEntry::make('returned_at')
                    ->label('Returned At')
                    ->badge()
                    ->color(fn($state) => $state ? 'success' : 'danger') // Green for returned, red for not returned
                    ->formatStateUsing(fn($state) => $state ? date('F d, Y', strtotime($state)) : 'Not Returned'), // Show dynamic label
            ]);
    }
}
