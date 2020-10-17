<?php

   namespace Grayl\Gateway\Common\Entity;

   /**
    * Interface RequestDataInterface
    * This interface describes all API based gateway request entities
    *
    * @package Grayl\Gateway\Common
    */
   interface RequestDataInterface
   {

      /**
       * Sets the action of the request
       *
       * @param string $action The action performed in the request (send, etc.)
       */
      public function setAction ( string $action ): void;


      /**
       * Returns the action performed in the request (send, get etc.)
       *
       * @return string
       */
      public function getAction (): string;

   }