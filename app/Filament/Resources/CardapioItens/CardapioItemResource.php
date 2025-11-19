<?php

namespace App\Filament\Resources\CardapioItens;

use App\Filament\Resources\CardapioItens\Pages\CreateCardapioItem;
use App\Filament\Resources\CardapioItens\Pages\EditCardapioItem;
use App\Filament\Resources\CardapioItens\Pages\ListCardapioItens;
use App\Filament\Resources\CardapioItens\Pages\ViewCardapioItem;
use App\Filament\Resources\CardapioItens\Schemas\CardapioItemForm;
use App\Filament\Resources\CardapioItens\Schemas\CardapioItemInfolist;
use App\Filament\Resources\CardapioItens\Tables\CardapioItensTable;
use App\Models\CardapioItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CardapioItemResource extends Resource
{
    protected static ?string $model = CardapioItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static ?string $titleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return CardapioItemForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CardapioItemInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CardapioItensTable::configure($table);
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
            'index' => ListCardapioItens::route('/'),
            'create' => CreateCardapioItem::route('/create'),
            'view' => ViewCardapioItem::route('/{record}'),
            'edit' => EditCardapioItem::route('/{record}/edit'),
        ];
    }
}




