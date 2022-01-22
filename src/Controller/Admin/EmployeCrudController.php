<?php

namespace App\Controller\Admin;

use App\Entity\Employe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EmployeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employe::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('prenom'),
            TextField::new('nom'),
            TextField::new('email'),
            TextField::new('telephone'),
            TextField::new('section'),
            TextField::new('post'),
            IntegerField::new('salaire'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
           ImageField::new('photo')->setUploadDir('public/images/employes/')->onlyOnIndex(),
        ];
    }
}
