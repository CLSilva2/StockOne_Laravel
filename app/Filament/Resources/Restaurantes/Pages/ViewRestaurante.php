<?php

namespace App\Filament\Resources\Restaurantes\Pages;

use App\Filament\Resources\Restaurantes\RestauranteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRestaurante extends ViewRecord
{
    protected static string $resource = RestauranteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}




