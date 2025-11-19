<?php

namespace App\Filament\Resources\CardapioItens\Pages;

use App\Filament\Resources\CardapioItens\CardapioItemResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCardapioItem extends EditRecord
{
    protected static string $resource = CardapioItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}




