<?php

   namespace Grayl\Gateway\Common;

   use Grayl\Gateway\Common\Config\GatewayAPIEndpointAbstract;
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
       * @param string $api_endpoint_id The API endpoint ID to use (typically "default" if there is only one API gateway)
       *
       * @return GatewayDataAbstract
       * @throws \Exception
       */
      public function getSavedGatewayDataEntity ( string $api_endpoint_id ): object;


      /**
       * Creates a new GatewayDataAbstract entity
       *
       * @param string $api_endpoint_id The API endpoint ID to use (typically "default" if there is only one API gateway)
       *
       * @return GatewayDataAbstract
       * @throws \Exception
       */
      public function newGatewayDataEntity ( string $api_endpoint_id ): object;


      /**
       * Creates a new API object for use in a GatewayDataAbstract entity
       *
       * @param GatewayAPIEndpointAbstract $api_endpoint A GatewayAPIEndpointAbstract with credentials needed to create a gateway API object
       *
       * @return object
       */
      public function newGatewayAPI ( $api_endpoint ): object;
   }