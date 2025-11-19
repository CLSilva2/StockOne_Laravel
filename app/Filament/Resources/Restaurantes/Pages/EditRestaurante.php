<?php

namespace App\Filament\Resources\Restaurantes\Pages;

use App\Filament\Resources\Restaurantes\RestauranteResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRestaurante extends EditRecord
{
    protected static string $resource = RestauranteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}




