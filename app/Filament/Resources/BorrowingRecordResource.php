<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BorrowingRecordResource\Pages;
use App\Models\BorrowingRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BorrowingRecordResource extends Resource
{
    protected static ?string $model = BorrowingRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('book_id')
                    ->label('Book')
                    ->relationship('book', 'book_name')
                    ->required(),
                Forms\Components\Select::make('member_id')
                    ->label('Member')
                    ->relationship('member', 'name')
                    ->required(),
                Forms\Components\Datepicker::make('borrowed_at')
                    ->label('Borrowed At')
                    ->required(),
                Forms\Components\Datepicker::make('due_date')
                    ->label('Due Date')
                    ->required(),
                Forms\Components\Datepicker::make('returned_at')
                    ->label('Returned At'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('book.book_name')
                    ->label('Book')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('member.name')
                    ->label('Member')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('borrowed_at')
                    ->label('Borrowed At')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->label('Due Date')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('returned_at')
                    ->label('Returned At')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBorrowingRecords::route('/'),
            'create' => Pages\CreateBorrowingRecord::route('/create'),
            'edit' => Pages\EditBorrowingRecord::route('/{record}/edit'),
            'view' => Pages\ViewBorrowingRecord::route('/{record}'),
        ];
    }
}
