<?php

namespace App\Filament\Resources\Estoque\Pages;

use App\Filament\Resources\Estoque\EstoqueResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEstoque extends ListRecords
{
    protected static string $resource = EstoqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}




