<?php

   namespace Grayl\Gateway\Common\Entity;

   /**
    * Interface ResponseDataInterface
    * This interface describes all API based gateway response entities
    *
    * @package Grayl\Gateway\Common
    */
   interface ResponseDataInterface
   {

      /**
       * Sets the response object returned from an API gateway request
       *
       * @param object $api_response The response object returned from an API gateway request
       */
      public function setAPIResponse ( object $api_response ): void;


      /**
       * Returns the response object returned from an API gateway request
       *
       * @return object
       */
      public function getAPIResponse ();


      /**
       * Sets the gateway name
       *
       * @param string $gateway_name The name of the gateway
       */
      public function setGatewayName ( string $gateway_name ): void;


      /**
       * Returns the gateway name
       *
       * @return string
       */
      public function getGatewayName (): string;


      /**
       * Sets the action of the original request
       *
       * @param string $action The action performed in the original request (send, etc.)
       */
      public function setAction ( string $action ): void;


      /**
       * Returns the action of the original request
       *
       * @return string
       */
      public function getAction (): string;

   }