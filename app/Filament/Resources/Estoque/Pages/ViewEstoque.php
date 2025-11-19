<?php

namespace App\Filament\Resources\Estoque\Pages;

use App\Filament\Resources\Estoque\EstoqueResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEstoque extends ViewRecord
{
    protected static string $resource = EstoqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}




