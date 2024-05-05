<?php

namespace App\Filament\Resources\HouseKeepingStaffResource\Pages;

use App\Filament\Resources\HouseKeepingStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHouseKeepingStaff extends EditRecord
{
    protected static string $resource = HouseKeepingStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
