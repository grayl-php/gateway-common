<?php

   namespace Grayl\Gateway\Common\Config;

   use Grayl\Mixin\Common\Entity\KeyedDataBag;

   /**
    * Class GatewayConfigAbstract
    * The abstract class of the configs for all API gateways
    *
    * @package Grayl\Gateway\Common
    */
   abstract class GatewayConfigAbstract
   {

      /**
       * The name of the gateway
       *
       * @var string
       */
      protected string $gateway_name;

      /**
       * A bag of live GatewayAPIEndpointAbstract entities
       *
       * @var KeyedDataBag
       */
      protected KeyedDataBag $live_api_endpoints;

      /**
       * A bag of sandbox GatewayAPIEndpointAbstract entities
       *
       * @var KeyedDataBag
       */
      protected KeyedDataBag $sandbox_api_endpoints;


      /**
       * Class constructor
       *
       * @param string $gateway_name The name of the gateway
       */
      public function __construct ( string $gateway_name )
      {

         // Set the class data
         $this->setGatewayName( $gateway_name );

         // Create the required bags
         $this->live_api_endpoints    = new KeyedDataBag();
         $this->sandbox_api_endpoints = new KeyedDataBag();
      }


      /**
       * Gets the gateway name
       *
       * @return string
       */
      public function getGatewayName (): string
      {

         // Return it
         return $this->gateway_name;
      }


      /**
       * Sets the gateway name
       *
       * @param string $gateway_name
       */
      public function setGatewayName ( string $gateway_name ): void
      {

         // Set the gateway name
         $this->gateway_name = $gateway_name;
      }


      /**
       * Retrieves a stored live API endpoint
       *
       * @param string $api_endpoint_id The ID of the live API endpoint
       *
       * @return GatewayAPIEndpointAbstract
       */
      public function getLiveAPIEndpoint ( string $api_endpoint_id ): object
      {

         // Return the endpoint object
         return $this->live_api_endpoints->getVariable( $api_endpoint_id );
      }


      /**
       * Sets a live API endpoint into the data bag
       *
       * @param GatewayAPIEndpointAbstract $api_endpoint The configured GatewayAPIEndpointAbstract entity to set
       */
      public function setLiveAPIEndpoint ( $api_endpoint ): void
      {

         // Set the API endpoint
         $this->live_api_endpoints->setVariable( $api_endpoint->getAPIEndpointID(),
                                                 $api_endpoint );
      }


      /**
       * Retrieves a stored sandbox API endpoint
       *
       * @param string $api_endpoint_id The ID of the sandbox API endpoint
       *
       * @return GatewayAPIEndpointAbstract
       */
      public function getSandboxAPIEndpoint ( string $api_endpoint_id ): object
      {

         // Return the endpoint object
         return $this->sandbox_api_endpoints->getVariable( $api_endpoint_id );
      }


      /**
       * Sets a sandbox API endpoint into the data bag
       *
       * @param GatewayAPIEndpointAbstract $api_endpoint The configured GatewayAPIEndpointAbstract entity to set
       */
      public function setSandboxAPIEndpoint ( $api_endpoint ): void
      {

         // Set the API endpoint
         $this->sandbox_api_endpoints->setVariable( $api_endpoint->getAPIEndpointID(),
                                                    $api_endpoint );
      }

   }