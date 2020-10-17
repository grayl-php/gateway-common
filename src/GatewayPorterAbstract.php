<?php

   namespace Grayl\Gateway\Common;

   use Grayl\Config\ConfigPorter;
   use Grayl\Config\Controller\ConfigController;
   use Grayl\Gateway\Common\Entity\GatewayDataAbstract;
   use Grayl\Mixin\Common\Entity\KeyedDataBag;

   /**
    * Abstract class GatewayPorterAbstract
    * The abstract class for all gateway API porters
    *
    * @package Grayl\Gateway\Common
    */
   abstract class GatewayPorterAbstract implements GatewayPorterInterface
   {

      /**
       * The name of the config file for this gateway package
       *
       * @var string
       */
      protected string $config_file;

      /**
       * The config instance for this porter
       *
       * @var ConfigController
       */
      protected ConfigController $config;

      /**
       * The default gateway API environment
       *
       * @var string
       */
      protected string $environment;

      /**
       * A KeyedDataBag entity for storing saved gateway API instances
       *
       * @var KeyedDataBag
       */
      protected KeyedDataBag $saved_gateways;


      /**
       * The class constructor
       *
       * @throws \Exception
       */
      public function __construct ()
      {

         // Create the config instance from the config file
         if ( ! empty( $this->config_file ) ) {
            $this->config = ConfigPorter::getInstance()
                                        ->newConfigControllerFromFile( $this->config_file );
         }

         // Set the default environment to live
         $this->environment = 'live';

         // Create a KeyedDataBag for saving created gateway data instances
         $this->saved_gateways = new KeyedDataBag();
      }


      /**
       * Changes the environment of this gateway porter
       *
       * @param string $environment The API environment to use (live, sandbox, etc.)
       */
      public function setEnvironment ( string $environment ): void
      {

         // Set the gateway API environment
         $this->environment = $environment;
      }


      /**
       * Gets a previously created GatewayDataAbstract object or creates a new one
       *
       * @param string $endpoint_id The API endpoint ID to use (typically "default" is there is only one API gateway)
       *
       * @return GatewayDataAbstract
       * @throws \Exception
       */
      public function getSavedGatewayDataEntity ( string $endpoint_id ): object
      {

         // Create the storage ID for this gateway
         $storage_id = implode( '-',
                                [ $this->environment,
                                  $endpoint_id, ] );

         // Grab the saved copy of the gateway
         $gateway_data = $this->saved_gateways->getVariable( $storage_id );

         // If there was no saved gateway, create a new one
         if ( empty ( $gateway_data ) ) {
            // Create the gateway
            $gateway_data = $this->newGatewayDataEntity( $endpoint_id );

            // Save it for re-use
            $this->saved_gateways->setVariable( $storage_id,
                                                $gateway_data );
         }

         // Return the gateway data object
         return $gateway_data;
      }

   }