<?php

namespace App\Components\Product\Manipulate;

use Nette\Application\UI\Form;
use App\Model\ProductManager;
use App\Model\CategoryManager;


class FormFactory {

   private array $product;
   private int $user_id;
    public function __construct(private ProductManager $productManager, private CategoryManager $categoryManager) {}

    public function create(array $product, int $user_id): Form {
      $this->product = $product;
      $this->user_id = $user_id;
       $form = new Form();
       $form->addText("name", "Název: ");
       $form->addText("price", "Cena: ");
       $form->addTextArea("description", "Popis: ");
       $form->addSelect("category_id", "Kategorie:", $this->getCategories());
       $form->addSubmit("send", "Odeslat");
       $form->onSuccess[] = [$this, "onSuccess"];
       $form->setDefaults($product);
       return $form;
    }

    public function onSuccess(Form $form, array $values): void {
      $product_id = $this->product["id"];

      if($product_id > 0) { 
         $this->productManager->update($product_id, $values);
      } 
      else 
      {
         $values["user_id"] = $this->user_id; 
         $this->productManager->add($values);
      }
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