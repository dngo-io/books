<?php


namespace App\Validation\EntityRules;

use App\Entities\Book;
use Somnambulist\EntityValidation\AbstractEntityRules;

class BookImportRules extends AbstractEntityRules
{
    public function supports($entity)
    {
        return $entity instanceof Book;
    }

    protected function buildRules($entity)
    {
        return [
            'name' => 'required|min:1',
            'author' => 'required',
            'isbn' => 'required',
        ];
    }
}