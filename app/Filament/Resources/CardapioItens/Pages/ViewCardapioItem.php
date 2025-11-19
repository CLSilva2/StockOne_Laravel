<?php

namespace App\Filament\Resources\CardapioItens\Pages;

use App\Filament\Resources\CardapioItens\CardapioItemResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCardapioItem extends ViewRecord
{
    protected static string $resource = CardapioItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}




