<?php

   namespace Grayl\Gateway\Common\Entity;

   /**
    * Class GatewayDataAbstract
    * The abstract class of the entity for all API gateways
    *
    * @package Grayl\Gateway\Common
    */
   abstract class GatewayDataAbstract implements GatewayDataInterface
   {

      /**
       * A fully configured gateway API object to call
       *
       * @var object
       */
      protected $api;

      /**
       * The name of the gateway
       *
       * @var string
       */
      protected string $gateway_name;

      /**
       * The environment of the gateway (live, sandbox, etc.)
       *
       * @var string
       */
      protected string $environment;


      /**
       * Class constructor
       *
       * @param object $api          A fully configured gateway API object to call
       * @param string $gateway_name The name of the gateway
       * @param string $environment  The environment of the gateway (live, sandbox, etc.)
       */
      public function __construct ( $api,
                                    string $gateway_name,
                                    string $environment )
      {

         // Set the class data
         $this->setAPI( $api );
         $this->setGatewayName( $gateway_name );
         $this->setEnvironment( $environment );
      }


      /**
       * Sets the gateway API object
       *
       * @param object $api A fully configured gateway API object to call
       */
      public function setAPI ( $api ): void
      {

         // Set the gateway API object
         $this->api = $api;
      }


      /**
       * Returns the gateway API object
       *
       * @return object
       */
      public function getAPI (): object
      {

         // Return the gateway API object
         return $this->api;
      }


      /**
       * Sets the gateway name
       *
       * @param string $gateway_name The name of the gateway
       */
      public function setGatewayName ( string $gateway_name ): void
      {

         // Set the gateway name
         $this->gateway_name = $gateway_name;
      }


      /**
       * Returns the gateway name
       *
       * @return string
       */
      public function getGatewayName (): string
      {

         // Return the gateway name
         return $this->gateway_name;
      }


      /**
       * Sets the gateway environment
       *
       * @param string $environment The environment of the gateway (live, sandbox, etc.)
       */
      public function setEnvironment ( string $environment ): void
      {

         // Set the environment
         $this->environment = $environment;
      }


      /**
       * Returns the gateway environment (live, sandbox, etc.)
       *
       * @return string
       */
      public function getEnvironment (): string
      {

         // Return the environment
         return $this->environment;
      }

   }