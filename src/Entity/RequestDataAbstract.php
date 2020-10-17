<?php

   namespace Grayl\Gateway\Common\Entity;

   /**
    * Class RequestDataAbstract
    * The abstract class of the entity for all API based gateway requests
    *
    * @package Grayl\Gateway\Common
    */
   abstract class RequestDataAbstract implements RequestDataInterface
   {

      /**
       * The action performed in the request (send, get etc.)
       *
       * @var string
       */
      protected string $action;


      /**
       * Class constructor
       *
       * @param string $action The action performed in the request (send, get etc.)
       */
      public function __construct ( string $action )
      {

         // Set the class data
         $this->setAction( $action );
      }


      /**
       * Sets the action of the request
       *
       * @param string $action The action performed in the request (send, etc.)
       */
      public function setAction ( string $action ): void
      {

         // Set the action
         $this->action = $action;
      }


      /**
       * Returns the action performed in the request (send, get etc.)
       *
       * @return string
       */
      public function getAction (): string
      {

         // Return the action
         return $this->action;
      }

   }