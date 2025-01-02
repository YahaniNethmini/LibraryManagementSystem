<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\BadgeEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;

class ViewBook extends ViewRecord
{
    public static string $resource = BookResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('book_name')
                    ->label('Book Name')
                    ->extraAttributes(['class' => 'text-lg font-bold']), // Customize style
                TextEntry::make('author_name')
                    ->label('Author Name'),
                TextEntry::make('isbn')
                    ->label('ISBN')
                    ->badge()
                    ->color('primary'), // Make it a badge with primary color
                TextEntry::make('book_count')
                    ->label('Book Count')
                    ->suffix(fn($record) => $record->book_count > 1 ? 'Copies' : 'Copy'), // Add "Copies" dynamically
                TextEntry::make('published_at')
                    ->label('Published At')
                    ->badge()
                    ->color('success') // Use a green badge for publishing date
                    ->formatStateUsing(fn($state) => date('F d, Y', strtotime($state))), // Format the date
            ]);
    }
}
