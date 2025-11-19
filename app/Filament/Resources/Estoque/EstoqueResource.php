<?php

namespace App\Filament\Resources\Estoque;

use App\Filament\Resources\Estoque\Pages\CreateEstoque;
use App\Filament\Resources\Estoque\Pages\EditEstoque;
use App\Filament\Resources\Estoque\Pages\ListEstoque;
use App\Filament\Resources\Estoque\Pages\ViewEstoque;
use App\Filament\Resources\Estoque\Schemas\EstoqueForm;
use App\Filament\Resources\Estoque\Schemas\EstoqueInfolist;
use App\Filament\Resources\Estoque\Tables\EstoqueTable;
use App\Models\Estoque;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EstoqueResource extends Resource
{
    protected static ?string $model = Estoque::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;

    protected static ?string $titleAttribute = 'insumo.nome';

    public static function form(Schema $schema): Schema
    {
        return EstoqueForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EstoqueInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EstoqueTable::configure($table);
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
            'index' => ListEstoque::route('/'),
            'create' => CreateEstoque::route('/create'),
            'view' => ViewEstoque::route('/{record}'),
            'edit' => EditEstoque::route('/{record}/edit'),
        ];
    }
}




