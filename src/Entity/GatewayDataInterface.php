<?php

   namespace Grayl\Gateway\Common\Entity;

   /**
    * Interface GatewayDataInterface
    * This interface describes all API based gateway entities
    *
    * @package Grayl\Gateway\Common
    */
   interface GatewayDataInterface
   {
      /**
       * Sets the gateway API object
       *
       * @param object $api A fully configured gateway API object to call
       */
      public function setAPI ( object $api ): void;


      /**
       * Returns the gateway API object
       *
       * @return object
       */
      public function getAPI (): object;


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
       * Sets the gateway environment
       *
       * @param string $environment The environment of the gateway (live, sandbox, etc.)
       */
      public function setEnvironment ( string $environment ): void;


      /**
       * Returns the gateway environment (live, sandbox, etc.)
       *
       * @return string
       */
      public function getEnvironment (): string;

   }