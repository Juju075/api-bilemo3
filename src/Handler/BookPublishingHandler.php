<?php
declare(strict_types = 1); 
namespace App\Handler;

use App\Entity\Book;
class BookPublishingHandler {
   public function handle(Book $book): array
   {
       // your logic for publishing book or/and eg. return your custom data
   } } 