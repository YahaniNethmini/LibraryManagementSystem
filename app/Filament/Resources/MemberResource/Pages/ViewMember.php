<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\BadgeEntry;

class ViewMember extends ViewRecord
{
    public static string $resource = MemberResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
            TextEntry::make('name')
                ->label('Member Name')
                ->extraAttributes(['class' => 'text-lg font-bold']),
            TextEntry::make('email')
                ->label('Email'),
            TextEntry::make('phone_number')
                ->label('Phone Number'),
            TextEntry::make('address')
                ->label('Address'),

            TextEntry::make('borrowed_at')
                ->label('Borrowed At')
                ->color('primary')
                ->formatStateUsing(fn($state) => date('F d, Y', strtotime($state))),
            TextEntry::make('returned_at')
                ->label('Returned At')
                ->color(fn($state) => $state ? 'success' : 'danger')
                ->formatStateUsing(fn($state) => $state ? date('F d, Y', strtotime($state)) : 'Not Returned'),
        ]);
    }
}
