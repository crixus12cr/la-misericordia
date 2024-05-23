<?php

namespace App\Services;

use App\Models\Module;

class ModuleService
{
    public function getModules()
    {
        return Module::all();
    }
}
