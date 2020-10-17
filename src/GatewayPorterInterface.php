<?php

   namespace Grayl\Gateway\Common;

   use Grayl\Gateway\Common\Entity\GatewayDataAbstract;

   /**
    * Interface GatewayPorterInterface
    * This interface describes the porter for all API based gateways
    *
    * @package Grayl\Gateway\Common
    */
   interface GatewayPorterInterface
   {

      /**
       * Changes the environment of this gateway porter
       *
       * @param string $environment The API environment to use (live, sandbox, etc.)
       */
      public function setEnvironment ( string $environment ): void;


      /**
       * Gets a previously created GatewayDataAbstract object or creates a new one
       *
       * @param string $endpoint_id The API endpoint ID to use (typically "default" is there is only one API gateway)
       *
       * @return GatewayDataAbstract
       * @throws \Exception
       */
      public function getSavedGatewayDataEntity ( string $endpoint_id ): object;


      /**
       * Creates a new GatewayDataAbstract entity
       *
       * @param string $endpoint_id The API endpoint ID to use (typically "default" is there is only one API gateway)
       *
       * @return GatewayDataAbstract
       * @throws \Exception
       */
      public function newGatewayDataEntity ( string $endpoint_id ): object;


      /**
       * Creates a new API object for use in a GatewayDataAbstract entity
       *
       * @param array $credentials An array containing all of the credentials needed to create the gateway API
       *
       * @return object
       */
      public function newGatewayAPI ( array $credentials ): object;
   }