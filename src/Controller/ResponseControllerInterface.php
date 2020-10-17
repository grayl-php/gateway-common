<?php

   namespace Grayl\Gateway\Common\Controller;

   /**
    * Interface ResponseControllerInterface
    * This interface describes the controller for all API based gateway responses
    *
    * @package Grayl\Gateway\Common
    */
   interface ResponseControllerInterface
   {
      /**
       * Returns the name of the gateway that submitted the original request
       *
       * @return string
       */
      public function getGatewayName (): string;


      /**
       * Returns the action performed in the original request (send, get etc.)
       *
       * @return string
       */
      public function getAction (): string;


      /**
       * Returns a true / false value based on a gateway API response
       *
       * @return bool
       */
      public function isSuccessful (): bool;


      /**
       * Returns the reference ID from a gateway API response
       *
       * @return string
       */
      public function getReferenceID (): ?string;


      /**
       * Returns the status message from a gateway API response
       *
       * @return string
       */
      public function getMessage (): ?string;


      /**
       * Returns the raw data from a gateway API response
       *
       * @return mixed
       */
      public function getData ();

   }