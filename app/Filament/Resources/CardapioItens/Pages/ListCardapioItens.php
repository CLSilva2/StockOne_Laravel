<?php

namespace App\Filament\Resources\CardapioItens\Pages;

use App\Filament\Resources\CardapioItens\CardapioItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCardapioItens extends ListRecords
{
    protected static string $resource = CardapioItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}




