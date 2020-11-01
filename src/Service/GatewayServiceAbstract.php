<?php

   namespace Grayl\Gateway\Common\Service;

   use Grayl\Gateway\Common\Config\GatewayAPIEndpointAbstract;
   use Grayl\Gateway\Common\Config\GatewayConfigAbstract;

   /**
    * Abstract class GatewayServiceAbstract
    * The abstract class for all gateway API services
    *
    * @package Grayl\Gateway\Common
    */
   abstract class GatewayServiceAbstract implements GatewayServiceInterface
   {

      /**
       * Gets the credentials for the gateway based on the environment
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
                                       string $api_endpoint_id ): object
      {

         // Get the API endpoint from the config
         $api_endpoint = ( $environment == 'live' ? $config->getLiveAPIEndpoint( $api_endpoint_id ) : $config->getSandboxAPIEndpoint( $api_endpoint_id ) );

         // Make sure we have an API endpoint for this environment
         if ( empty ( $api_endpoint ) ) {
            // Error, no APi credentials
            throw new \Exception( "Missing API credentials" );
         }

         // Return the API endpoint for this environment
         return $api_endpoint;
      }


      /**
       * Configures a gateway's environmental API settings
       *
       * @param object $api         The API object to configure
       * @param string $environment The API environment to use (live, sandbox, etc.)
       */
      public function configureAPI ( $api,
                                     string $environment ): void
      {

         // If we are in sandbox mode, use that environment
         if ( $environment == 'sandbox' ) {
            // Configure the sandbox environment
            $this->configureSandboxAPI( $api );

            // Done
            return;
         }

         // No sandbox, use the live environment by default
         $this->configureLiveAPI( $api );
      }


      /**
       * Configures an API to use the sandbox environment
       *
       * @param object $api The API object to configure
       */
      public function configureSandboxAPI ( $api ): void
      {
         // No additional sandbox configurations needed
      }


      /**
       * Configures an API to use the live environment
       *
       * @param object $api The API object to configure
       */
      public function configureLiveAPI ( $api ): void
      {
         // No additional live configurations needed
      }

   }