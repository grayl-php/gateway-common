<?php

   namespace Grayl\Gateway\Common\Service;

   use Grayl\Gateway\Common\Config\GatewayAPIEndpointAbstract;
   use Grayl\Gateway\Common\Config\GatewayConfigAbstract;

   /**
    * Interface GatewayServiceInterface
    * This interface describes the service for all API based gateways
    *
    * @package Grayl\Gateway\Common
    */
   interface GatewayServiceInterface
   {

      /**
       * Gets the API endpoint for the gateway based on the environment
       *
       * @param GatewayConfigAbstract $config          The GatewayConfigAbstract entity containing the API endpoint settings
       * @param string                $environment     The API environment to use (live, sandbox, etc.)
       * @param string                $api_endpoint_id The API endpoint ID to use (typically "default" if there is only one API gateway)
       *
       * @return GatewayAPIEndpointAbstract
       * @throws \Exception
       */
      public function getAPIEndpoint ( $config,
                                       string $environment,
                                       string $api_endpoint_id ): object;


      /**
       * Configures a gateway's environmental API settings
       *
       * @param object $api         The API object to configure
       * @param string $environment The API environment to use (live, sandbox, etc.)
       */
      public function configureAPI ( object $api,
                                     string $environment ): void;


      /**
       * Configures an API to use the sandbox environment
       *
       * @param object $api The API object to configure
       */
      public function configureSandboxAPI ( object $api ): void;


      /**
       * Configures an API to use the live environment
       *
       * @param object $api The API object to configure
       */
      public function configureLiveAPI ( object $api ): void;

   }