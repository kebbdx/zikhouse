<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function __toString()
    {
        return $this->name;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('last_name'),
            TextField::new('first_name'),
            TextField::new('address'),
            TelephoneField::new('phone'),
            TextField::new('email'),
            

        ];
    }
    
}
