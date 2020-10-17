<?php

   namespace Grayl\Gateway\Common\Service;

   use Grayl\Config\Controller\ConfigController;

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
       * @param ConfigController $config      The ConfigController entity containing the API settings
       * @param string           $environment The API environment to use (live, sandbox, etc.)
       * @param string           $endpoint_id The API endpoint ID to use (typically "default" is there is only one API gateway)
       *
       * @return array
       * @throws \Exception
       */
      public function getAPICredentials ( ConfigController $config,
                                          string $environment,
                                          string $endpoint_id ): array
      {

         // Get the API credentials from the config
         $credentials = $config->getConfig( 'api' );

         // Make sure we have credentials for this environment
         if ( empty ( $credentials[ $environment ][ $endpoint_id ] ) ) {
            // Error, no APi credentials
            throw new \Exception( "Missing API credentials" );
         }

         // Return the credentials for this environment
         return $credentials[ $environment ][ $endpoint_id ];
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