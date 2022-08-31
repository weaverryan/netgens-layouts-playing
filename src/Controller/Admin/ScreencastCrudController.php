<?php

namespace App\Controller\Admin;

use App\Entity\Screencast;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ScreencastCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Screencast::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('description'),
            NumberField::new('length'),
            ImageField::new('imagePath')
                ->setBasePath('uploads/screencasts')
                ->setUploadDir('public/uploads/screencasts')
                ->setUploadedFileNamePattern('[slug]-[randomhash].[extension]'),
        ];
    }
}
