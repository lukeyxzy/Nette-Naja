<?php

namespace App\Components\Product\Edit;
use Nette\Application\UI\Form;
use App\Model\ProductManager;
use App\Model\CategoryManager;


class FormFactory {

    public function __construct(private ProductManager $productManager, private CategoryManager $categoryManager) {}

    public function create(): Form {
       $form = new Form();
       $form->addText("name", "Název: ");
       $form->addText("price", "Cena: ");
       $form->addTextArea("description", "Popis: ");
       $form->addSelect("category_id", "Kategorie:", $this->getCategories());
       $form->addSubmit("send", "Odeslat");
       return $form;
    }

    public function getCategories(): array {
       $categories = $this->categoryManager->getAll();
       $options = [];

       foreach($categories as $category) {
        $options[$category->id] = $category->name;
       }
       return $options;
    }

}