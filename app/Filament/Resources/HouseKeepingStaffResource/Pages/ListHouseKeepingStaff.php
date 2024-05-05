<?php

namespace App\Filament\Resources\HouseKeepingStaffResource\Pages;

use App\Filament\Resources\HouseKeepingStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHouseKeepingStaff extends ListRecords
{
    protected static string $resource = HouseKeepingStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
