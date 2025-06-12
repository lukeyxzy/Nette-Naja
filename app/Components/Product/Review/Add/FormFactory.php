<?php

namespace App\Components\Product\Review\Add;

use Nette\Application\UI\Form;
use App\Model\ReviewManager;

class FormFactory {

   private int $product_id;
   private int $user_id;
    public function __construct(private ReviewManager $reviewManager) {}

    public function create(int $product_id, int $user_id): Form {
      $this->product_id = $product_id;
      $this->user_id = $user_id;

       $form = new Form();
       $form->addTextArea("content", "Recenze: ");
       $form->addRadioList("review", "Hodnocení:", [
                     5 => "★★★★★",
                     4 => "★★★★☆",
                     3 => "★★★☆☆",
                     2 => "★★☆☆☆",
                     1 => "★☆☆☆☆",
             ]);
       $form->addSubmit("send", "Odeslat");
       $form->onSuccess[] = [$this, "onSuccess"];
       return $form;
    }

    public function onSuccess(Form $form, array $values): void {
      $values["product_id"] = $this->product_id;
      $values["user_id"] = $this->user_id;
      $this->reviewManager->add($values);
    }




}