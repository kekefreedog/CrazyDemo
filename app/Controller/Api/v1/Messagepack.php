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
use CrazyPHP\Library\File\File as FileFile;
use CrazyPHP\Core\ApiResponse;
use CrazyPHP\Core\Controller;
use CrazyPHP\Core\File;

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

        # Get content type
        $contentType = array_flip(FileFile::EXTENSION_TO_MIMETYPE)[static::getHeaderFromRequest("Content-Type") ?: false ?? false] ?? "json";

        # Set response
        (new ApiResponse())
            ->setStatusCode($statutCode)
            ->setContentType($contentType)
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