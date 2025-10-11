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
 * Filter
 *
 * Main methods of you crazy page
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */
class Filter extends Controller {

    /** @const string TEMPLATE */
    public const TEMPLATE = "@app_root/app/Environment/Page/Filter/template.hbs";
    
    /**
     * Get
     */
    public static function get($request){
        
        # Set state
        $state = static::State()
            ->pushColorSchema()
            ->pushForm(static::SIMPLE_FILTER)
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

    /** Public constant
     ******************************************************
     */

    /** @var array FILTER_SIMPLE */
    public const SIMPLE_FILTER = [
        "id"            =>  "simple_filter",
        "title"         =>  "Simple Filter",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "filter"        =>  true,
        "items"         =>  [
            # Simple text input
            [
                "name"      =>  "text_input",
                "type"      =>  "text",
                "label"     =>  "Text Input"
            ],
            # Simple email input
            [
                "name"      =>  "email_input",
                "type"      =>  "email",
                "label"     =>  "Email Input",
            ],
            # Simple checkbox
            [
                "name"      =>  "checkbox_input",
                "type"      =>  "checkbox",
                "label"     =>  "Checkbox Input",
            ],
            # Simple radio
            [
                "name"      =>  "radio_input",
                "type"      =>  "radio",
                "label"     =>  "Radio Input",
                "select"    =>  [
                    [
                        "label" =>  "Option 1",
                        "value" =>  1
                    ],
                    [
                        "label" =>  "Option 2",
                        "value" =>  2
                    ],
                    [
                        "label" =>  "Option 3",
                        "value" =>  3
                    ],
                ]
            ],
            # Simple switch
            [
                "name"      =>  "switch_input",
                "type"      =>  "switch",
                "label"     =>  "Switch Input",
            ],
            # Simple range
            [
                "name"      =>  "range_input",
                "type"      =>  "range",
                "label"     =>  "Range Input",
            ],
            # Simple number
            [
                "name"      =>  "number_input",
                "type"      =>  "number",
                "label"     =>  "Number Input",
            ],
            # Date number
            [
                "name"      =>  "date_input",
                "type"      =>  "date",
                "label"     =>  "Date Input",
            ],
            # Password
            [
                "name"      =>  "password_input",
                "type"      =>  "password",
                "label"     =>  "Password Input",
            ],
            # Color
            [
                "name"      =>  "color_input",
                "type"      =>  "color",
                "label"     =>  "Color Input",
            ],
            # Simple file input
            [
                "name"      =>  "file_input",
                "type"      =>  "file",
                "label"     =>  "File Input"
            ],
        ]
    ];

}