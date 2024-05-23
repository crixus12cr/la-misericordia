<?php

namespace App\Services;

use App\Models\TypeDocument;

class TypeDocumentService
{
    public function getTypeDocuments()
    {
        return TypeDocument::all();
    }
}
