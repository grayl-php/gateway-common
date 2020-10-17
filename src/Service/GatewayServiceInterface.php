<?php

   namespace Grayl\Gateway\Common\Service;

   use Grayl\Config\Controller\ConfigController;

   /**
    * Interface GatewayServiceInterface
    * This interface describes the service for all API based gateways
    *
    * @package Grayl\Gateway\Common
    */
   interface GatewayServiceInterface
   {

      /**
       * Gets the credentials for the gateway based on the environment
       *
       * @param ConfigController $config      The ConfigController entity containing the API settings
       * @param string           $environment The API environment to use (live, sandbox, etc.)
       * @param string           $endpoint_id The API endpoint ID to use (typically "default" is there is only one API gateway)
       *
       * @return array
       * @throws \Exception
       */
      public function getAPICredentials ( ConfigController $config,
                                          string $environment,
                                          string $endpoint_id ): array;


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