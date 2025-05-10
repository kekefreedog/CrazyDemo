<?php declare(strict_types=1);
/**
 * Api
 *
 * Workflow of your api
 *
 * PHP version 8.1.2
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */
namespace App\Controller\Api\v1;

/**
 * Dependances
 */
use CrazyPHP\Core\ApiResponse;
use CrazyPHP\Core\Controller;

 /**
 * Messagepack
 *
 * Main methods of you crazy api
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */
class Messagepack extends Controller { 
    
    /**
     * Post
     */
    public static function post($request){

        # Set status code
        $statutCode = 200;

        # Get request data
        $requestData = static::getHttpRequestData();

        # Set response
        (new ApiResponse())
            ->setStatusCode($statutCode)
            ->pushContent("results", $requestData)
            ->send();

    }
    
    /**
     * Put
     */
    public static function put($request){

        # Set status code
        $statutCode = 200;

        # Get request data
        $requestData = static::getHttpRequestData();

        # Set content
        $content = [];

        # Set response
        (new ApiResponse())
            ->setStatusCode($statutCode)
            ->pushContent("results", $requestData)
            ->send();

    }

}