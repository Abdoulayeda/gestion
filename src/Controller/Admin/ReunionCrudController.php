<?php

namespace App\Controller\Admin;

use App\Entity\Reunion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReunionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reunion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextEditorField::new('theme'),
            DateTimeField::new('prevu_at'),
        ];
    }
}
