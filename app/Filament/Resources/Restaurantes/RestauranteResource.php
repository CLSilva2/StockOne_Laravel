<?php

namespace App\Filament\Resources\Restaurantes;

use App\Filament\Resources\Restaurantes\Pages\CreateRestaurante;
use App\Filament\Resources\Restaurantes\Pages\EditRestaurante;
use App\Filament\Resources\Restaurantes\Pages\ListRestaurantes;
use App\Filament\Resources\Restaurantes\Pages\ViewRestaurante;
use App\Filament\Resources\Restaurantes\Schemas\RestauranteForm;
use App\Filament\Resources\Restaurantes\Schemas\RestauranteInfolist;
use App\Filament\Resources\Restaurantes\Tables\RestaurantesTable;
use App\Models\Restaurante;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RestauranteResource extends Resource
{
    protected static ?string $model = Restaurante::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static ?string $titleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return RestauranteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RestauranteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RestaurantesTable::configure($table);
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
            'index' => ListRestaurantes::route('/'),
            'create' => CreateRestaurante::route('/create'),
            'view' => ViewRestaurante::route('/{record}'),
            'edit' => EditRestaurante::route('/{record}/edit'),
        ];
    }
}




