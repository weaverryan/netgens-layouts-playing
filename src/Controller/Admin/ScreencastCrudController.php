<?php

namespace App\Controller\Admin;

use App\Entity\Screencast;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ScreencastCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Screencast::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
