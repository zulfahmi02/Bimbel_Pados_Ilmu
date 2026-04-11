<?php

namespace App\Filament\Resources\LearningMedia\Pages;

use App\Filament\Resources\LearningMedia\LearningMediaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLearningMedia extends EditRecord
{
    protected static string $resource = LearningMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
