<?php declare(strict_types=1);
/**
 * App
 *
 * Workflow of your app
 *
 * PHP version 8.1.2
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */
namespace App\Controller\App;

/**
 * Dependances
 */
use CrazyPHP\Core\Controller;

/**
 * Progressbar
 *
 * Main methods of you crazy page
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */
class Progressbar extends Controller {

    /** @const string TEMPLATE */
    public const TEMPLATE = "@app_root/app/Environment/Page/Progressbar/template.hbs";
    
    /**
     * Get
     */
    public static function get($request){
        
        # Set state
        $state = static::State()
            ->pushColorSchema()
            ->render()
        ;
        
        # Set structure
        $structure = static::Structure()
            ->setDoctype()
            ->setLanguage()
            ->setHead()
            ->setBodyTemplate(self::TEMPLATE, null, (array) $state)
            ->setJsScripts()
            ->prepare()
            ->render()
        ;

        # Set response
        static::Response()
            ->setContent($structure)
            ->send();

    }

}