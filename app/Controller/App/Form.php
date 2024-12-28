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
 * Form
 *
 * Main methods of you crazy page
 *
 * @package    kzarshenas/crazyphp
 * @author     kekefreedog <kevin.zarshenas@gmail.com>
 * @copyright  2022-2024 Kévin Zarshenas
 */
class Form extends Controller {

    /** @const string TEMPLATE */
    public const TEMPLATE = "@app_root/app/Environment/Page/Form/template.hbs";
    
    /**
     * Get
     */
    public static function get($request){
        
        # Set state
        $state = static::State()
            ->pushColorSchema()
            ->pushForm(static::SIMPLE_FORM)
            ->pushForm(static::DISABLED_FORM)
            ->pushForm(static::CUSTOM_FORM)
            ->pushForm(static::READONLY_FORM)
            ->pushForm(static::DEFAULT_FORM)
            ->pushForm(static::REQUIRED_FORM)
            ->pushForm(static::MULTIPLE_FORM)
            ->pushForm(static::SELECT_FORM)
            ->pushForm(static::FORM_NO_CONFIRM)
            ->pushForm(static::FORM_CONFIRM_TITLE)
            ->pushForm(static::FORM_CUSTOM_CONFIRM)
            ->pushForm(static::FORM_CUSTOM_INVERT)
            ->pushForm(static::FORM_DEPENDS)
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

    /** @var array FORM_SIMPLE */
    public const SIMPLE_FORM = [
        "id"            =>  "simple_form",
        "title"         =>  "Simple Form",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
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

    /** @var array FORM_SIMPLE */
    public const CUSTOM_FORM = [
        "id"            =>  "custom_form",
        "title"         =>  "Custom Form",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "items"         =>  [
            # Placeholder text input with placeholder
            [
                "name"          =>  "placeholder_text_input",
                "type"          =>  "text",
                "label"         =>  "Placeholder Text Input",
                "placeholder"   =>  "Text used as placeholder"
            ],
            # Placeholder text input with custom class
            [
                "name"          =>  "custom_class_text_input",
                "type"          =>  "text",
                "label"         =>  "Text Input With Custom Class",
                "_style"        =>  [
                    "customClass"   =>  [
                        "input-field"   =>  "outlined"
                    ]
                ]
            ],
            # Text input with prefix
            [
                "name"          =>  "prefix_text_input",
                "type"          =>  "text",
                "label"         =>  "Text Input With Prefix",
                "_style"        =>  [
                    "prefix"        =>  [
                        "class"         =>  "material-icons",
                        "text"          =>  "place",
                    ]   
                ]
            ],
            # Text input with suffix
            [
                "name"          =>  "prefix_text_input",
                "type"          =>  "text",
                "label"         =>  "Text Input With Prefix",
                "_style"        =>  [
                    "suffix"        =>  [
                        "class"         =>  "material-icons",
                        "text"          =>  "place",
                    ]   
                ]
            ],
            # Simple checkbox with custom class
            [
                "name"      =>  "checkbox_input",
                "type"      =>  "checkbox",
                "label"     =>  "Checkbox Input",
                "_style"    =>  [
                    "customClass"   =>  [
                        "input"   =>  "filled-in"
                    ]
                ]
            ],
            # Custom range min and max
            [
                "name"      =>  "custom_range_input_min_max",
                "type"      =>  "range",
                "label"     =>  "Custom Range Min and Max Input",
                "select"    =>  [
                    [
                        "value" =>  10
                    ],
                    [
                        "value" =>  90
                    ],
                ]
            ],
            # Custom range with steps
            [
                "name"      =>  "custom_range_input_step",
                "type"      =>  "range",
                "label"     =>  "Custom Range with Step Input",
                "_style"    =>  [
                    "range"     =>  [
                        "step"      =>  10
                    ]
                ]
            ],
            # Today Date
            [
                "name"      =>  "today_date_input",
                "type"      =>  "date",
                "label"     =>  "Current Date Input (today)",
                "default"   =>  "today()"
            ],
            # Previous Date
            [
                "name"      =>  "previous_date_input",
                "type"      =>  "date",
                "label"     =>  "Previous Date Input (yesterday)",
                "default"   =>  "yesterday()"
            ],
            # Next Date
            [
                "name"      =>  "next_date_input",
                "type"      =>  "date",
                "label"     =>  "Next Date Input (tomorrow)",
                "default"   =>  "tomorrow()"
            ],
            # Date with range
            [
                "name"      =>  "next_date_range",
                "type"      =>  "date",
                "label"     =>  "Range Date Input",
                "select"    =>  [
                    [
                        "value" =>  "tomorrow()"
                    ],
                    [
                        "value" =>  "yesterday()"
                    ],
                ]
            ],
            # Custom number min and max
            [
                "name"      =>  "custom_number_input_min_max",
                "type"      =>  "number",
                "label"     =>  "Custom Number Min and Max Input",
                "select"    =>  [
                    [
                        "value" =>  10
                    ],
                    [
                        "value" =>  90
                    ],
                ]
            ],
            # Custom decimal min and max
            [
                "name"      =>  "custom_decimal_input_min_max",
                "type"      =>  "number",
                "label"     =>  "Custom Decimal Number with Min and Max Input",
                "select"    =>  [
                    [
                        "value" =>  0
                    ],
                    [
                        "value" =>  2
                    ],
                ],
                "_style"        =>  [
                    "number"         =>  [
                        "decimal"     =>  2,
                    ]   
                ]
            ],
            # Text input with min and max
            [
                "name"          =>  "text_input_min_max",
                "type"          =>  "text",
                "label"         =>  "Text Input With Min And Max",
                "_style"        =>  [
                    "text"        =>  [
                        "minlength"     =>  2,
                        "maxlength"     =>  10,
                    ]   
                ]
            ],
            # Password
            [
                "name"      =>  "custom_password_input",
                "type"      =>  "password",
                "label"     =>  "Custom Password Input",
                "default"   =>  "Password Visible",
                "_style"        =>  [
                    "password"        =>  [
                        "visible"       =>  true,
                    ]   
                ]
            ],
            # Color
            [
                "name"      =>  "color_input",
                "type"      =>  "color",
                "label"     =>  "Color Input Pickr",
                "_style"        =>  [
                    "color"        =>  [
                        "picker"       =>  "pickr",
                    ]   
                ]
            ],
            # Color Monolith
            [
                "name"      =>  "color_input_monolith",
                "type"      =>  "color",
                "label"     =>  "Color Input Monolith",
                "_style"        =>  [
                    "color"        =>  [
                        "picker"        =>  "pickr",
                        "theme"         =>  "monolith"
                    ]   
                ]
            ],
            # Color Nano
            [
                "name"      =>  "color_input_nano",
                "type"      =>  "color",
                "label"     =>  "Color Input Nano",
                "_style"        =>  [
                    "color"        =>  [
                        "picker"        =>  "pickr",
                        "theme"         =>  "nano"
                    ]   
                ]
            ],
            # Color Opacity
            [
                "name"      =>  "color_input_opacity",
                "type"      =>  "color",
                "label"     =>  "Color Input Opacity",
                "_style"        =>  [
                    "color"        =>  [
                        "picker"        =>  "pickr",
                        "opacity"       =>  false
                    ]   
                ]
            ],
            # Cutom file input
            [
                "name"      =>  "custom_file_input",
                "type"      =>  "file",
                "label"     =>  "Custom File Input",
                "_style"        =>  [
                    "file"          =>  [
                        "picker"        =>  "filepond",
                    ]   
                ]
            ],
            # Cutom file input with preview
            [
                "name"      =>  "custom_file_input_with_preview",
                "type"      =>  "file",
                "label"     =>  "Custom File Input with Preview",
                "_style"        =>  [
                    "file"          =>  [
                        "picker"        =>  "filepond",
                        "preview"       =>  true,
                    ]   
                ]
            ],
            # Cutom max file input
            [
                "name"      =>  "custom_max_file_input",
                "type"      =>  "file",
                "label"     =>  "Custom Max File Input",
                "multiple"  =>  true,
                "_style"        =>  [
                    "file"          =>  [
                        "picker"        =>  "filepond",
                        "maxFiles"      =>  3,
                    ]   
                ]
            ],
            # Cutom accept file input
            [
                "name"      =>  "custom_accept_file_input",
                "type"      =>  "file",
                "label"     =>  "Custom Accept File Input",
                "multiple"  =>  true,
                "_style"        =>  [
                    "file"          =>  [
                        "picker"            =>  "filepond",
                        "acceptedFileTypes" =>  ['image/*'],
                    ]   
                ]
            ],
            # Cutom lang file input
            [
                "name"      =>  "custom_lang_file_input",
                "type"      =>  "file",
                "label"     =>  "Custom Lang File Input",
                "_style"        =>  [
                    "file"          =>  [
                        "picker"        =>  "filepond",
                        "locale"        =>  "fr-fr",
                    ]   
                ]
            ],
        ]
    ];

    /** @var array BASIC_SIMPLE */
    public const DISABLED_FORM = [
        "id"            =>  "disabled_form",
        "title"         =>  "Disabled Form",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "items"         =>  [
            # Disabled text input
            [
                "name"      =>  "disabled_text_input",
                "type"      =>  "text",
                "label"     =>  "Disabled Text Input",
                "disabled"  =>  true,
                "default"   =>  "Text"
            ],
            # Disabled checkbox
            [
                "name"      =>  "disabled_checkbox_input",
                "type"      =>  "checkbox",
                "label"     =>  "Disabled Checkbox Input",
                "disabled"  =>  true,
            ],
            # Disabled Simple radio
            [
                "name"      =>  "disabled_radio_input",
                "type"      =>  "radio",
                "label"     =>  "Disabled Radio Input",
                "disabled"  =>  true,
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
            # Partial Disabled Simple radio
            [
                "name"      =>  "partial_disabled_radio_input",
                "type"      =>  "radio",
                "label"     =>  "Partial Disabled Radio Input",
                "select"    =>  [
                    [
                        "label" =>  "Option 1",
                        "value" =>  1,
                        "disabled"  =>  true,
                    ],
                    [
                        "label" =>  "Option 2",
                        "value" =>  2
                    ],
                    [
                        "label" =>  "Option 3",
                        "value" =>  3,
                        "disabled"  =>  true,
                    ],
                ]
            ],
            # Disabled Simple switch
            [
                "name"      =>  "disabled_switch_input",
                "type"      =>  "switch",
                "label"     =>  "Disabled Switch Input",
                "disabled"  =>  true,
            ],
            # Disabled Simple range
            [
                "name"      =>  "disabled_range_input",
                "type"      =>  "range",
                "label"     =>  "Disabled Range Input",
                "disabled"  =>  true,
            ],
            # Password
            [
                "name"      =>  "password_input",
                "type"      =>  "password",
                "label"     =>  "Password Input",
                "disabled"  =>  true,
            ],
            # Select
            [
                "name"      =>  "Disabled select",
                "type"      =>  "select",
                "label"     =>  "Disabled Select",
                "disabled"  =>  true, 
                "default"   =>  1,
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
                ],
            ],
            # Select
            [
                "name"      =>  "Partial Disabled select",
                "type"      =>  "select",
                "label"     =>  "Partial Disabled Select",
                "default"   =>  1,
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
                        "value" =>  3,
                        "disabled"  =>  true, 
                    ],
                ],
            ],
            # Color
            [
                "name"      =>  "color_input",
                "type"      =>  "color",
                "label"     =>  "Color Input",
                "disabled"  =>  true, 
            ],
            # File
            [
                "name"      =>  "disabled_file_input",
                "type"      =>  "file",
                "label"     =>  "File Input Disabled",
                "disabled"  =>  true, 
                "_style"        =>  [
                    "file"          =>  [
                        "picker"        =>  "filepond",
                        "preview"       =>  true
                    ]   
                ]
            ],
        ]
    ];

    /** @var array READONLY_SIMPLE */
    public const READONLY_FORM = [
        "id"            =>  "readonly_form",
        "title"         =>  "Read Only Form",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "items"         =>  [
            # Read Only text input
            [
                "name"      =>  "readonly_text_input",
                "type"      =>  "text",
                "label"     =>  "Read Only Text Input",
                "readonly"  =>  true,
                "default"   =>  "Text"
            ],
            # Password
            [
                "name"      =>  "password_input",
                "type"      =>  "password",
                "label"     =>  "Password Input",
                "readonly"  =>  true,
            ],
        ]
    ];

    /** @var array DEFAULT_SIMPLE */
    public const DEFAULT_FORM = [
        "id"            =>  "default_form",
        "title"         =>  "Default Form",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "items"         =>  [
            # Default text input
            [
                "name"      =>  "default_text_input",
                "type"      =>  "text",
                "label"     =>  "Default Text Input",
                "default"   =>  "Default text"
            ],
            # Default checkbox (True)
            [
                "name"      =>  "default_checkbox_input_true",
                "type"      =>  "checkbox",
                "label"     =>  "Default Checkbox Input (True)",
                "default"   =>  true,
            ],
            # Default checkbox (False)
            [
                "name"      =>  "default_checkbox_input_false",
                "type"      =>  "checkbox",
                "label"     =>  "Default Checkbox Input (False)",
                "default"   =>  false,
            ],
            # Default radio value on item
            [
                "name"      =>  "default_radio_input_item",
                "type"      =>  "radio",
                "label"     =>  "Default Radio Input (On Item)",
                "default"   =>  2,
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
            # Default radio value on select
            [
                "name"      =>  "default_radio_input_select",
                "type"      =>  "radio",
                "label"     =>  "Default Radio Input (On Select)",
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
                        "label"     =>  "Option 3",
                        "value"     =>  3,
                        "default"   =>  true
                    ],
                ]
            ],
            # Default switch (True)
            [
                "name"      =>  "default_switch_input_true",
                "type"      =>  "switch",
                "label"     =>  "Default Switch Input (True)",
                "default"   =>  true
            ],
            # Default switch (False)
            [
                "name"      =>  "default_switch_input_false",
                "type"      =>  "switch",
                "label"     =>  "Default Switch Input (False)",
                "default"   =>  false
            ],
            # Simple range
            [
                "name"      =>  "default_range_input",
                "type"      =>  "range",
                "label"     =>  "Default Range Input",
                "default"   =>  75
            ],
            # Simple number
            [
                "name"      =>  "default_number_input",
                "type"      =>  "number",
                "label"     =>  "Default Number Input",
                "default"   =>  29
            ],
            # Date number
            [
                "name"      =>  "default_date_input",
                "type"      =>  "date",
                "label"     =>  "Default Date Input",
                "default"   =>  "2024-09-26"
            ],
            # Password
            [
                "name"      =>  "password_input",
                "type"      =>  "password",
                "label"     =>  "Password Input",
                "default"   =>  "password"
            ],
            # Color
            [
                "name"      =>  "color_input",
                "type"      =>  "color",
                "label"     =>  "Color Input",
                "default"   =>  "#FF0000",
            ],
        ]
    ];

    /** @var array FORM_REQUIRED */
    public const REQUIRED_FORM = [
        "id"            =>  "required_form",
        "title"         =>  "Required Form",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "items"         =>  [
            # Required text input
            [
                "name"      =>  "required_text_input",
                "type"      =>  "text",
                "label"     =>  "Required Text Input",
                "required"  =>  true,
            ],
            # Required email input
            [
                "name"      =>  "required_email_input",
                "type"      =>  "email",
                "label"     =>  "Required Email Input",
                "required"  =>  true,
            ],
            # Simple checkbox
            [
                "name"      =>  "checkbox_input",
                "type"      =>  "checkbox",
                "label"     =>  "Checkbox Input",
                "required"  =>  true,
            ],
            # Simple radio
            [
                "name"      =>  "radio_input",
                "type"      =>  "radio",
                "label"     =>  "Radio Input",
                "required"  =>  true,
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
                "required"  =>  true,
            ],
            # Simple range
            [
                "name"      =>  "range_input",
                "type"      =>  "range",
                "label"     =>  "Range Input",
                "required"  =>  true,
            ],
            # Simple number
            [
                "name"      =>  "number_input",
                "type"      =>  "number",
                "label"     =>  "Number Input",
                "required"  =>  true,
            ],
            # Date number
            [
                "name"      =>  "date_input",
                "type"      =>  "date",
                "label"     =>  "Date Input",
                "required"  =>  true,
            ],
            # Password
            [
                "name"      =>  "password_input",
                "type"      =>  "password",
                "label"     =>  "Password Input",
                "required"  =>  true,
            ],
            # Color
            [
                "name"      =>  "color_input",
                "type"      =>  "color",
                "label"     =>  "Color Input",
                "required"  =>  true,
            ],
            # File
            [
                "name"      =>  "required_file_input",
                "type"      =>  "file",
                "label"     =>  "Required File Input",
                "required"  =>  true,
                "_style"        =>  [
                    "file"          =>  [
                        "picker"        =>  "filepond",
                        "preview"       =>  true
                    ]   
                ]
            ],
        ]
    ];

    /** @var array FORM_MULTIPLE */
    public const MULTIPLE_FORM = [
        "id"            =>  "multiple_form",
        "title"         =>  "Multiple Form",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "items"         =>  [
            # Simple radio
            [
                "name"      =>  "multiple_radio_input",
                "type"      =>  "radio",
                "label"     =>  "Multiple Radio Input",
                "multiple"  =>  true,
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
            # Simple Default select
            [
                "name"      =>  "multiple_select",
                "type"      =>  "select",
                "multiple"  =>  true,
                "label"     =>  "Multiple Select",
                "select"    =>  [
                    [
                        "label"     =>  "Option 1",
                        "value"     =>  1,
                        "default"   =>  true
                    ],
                    [
                        "label"     =>  "Option 2",
                        "value"     =>  2,
                        "default"   =>  true
                    ],
                    [
                        "label"     =>  "Option 3",
                        "value"     =>  3
                    ],
                    [
                        "label"     =>  "Option 4",
                        "value"     =>  4
                    ],
                    [
                        "label"     =>  "Option 5",
                        "value"     =>  5
                    ],
                ],
            ],
            # Multiple file
            [
                "name"      =>  "multiple_file_input",
                "type"      =>  "file",
                "label"     =>  "Multiple File Input",
                "multiple"  =>  true,
                "_style"        =>  [
                    "file"          =>  [
                        "picker"        =>  "filepond",
                        "preview"       =>  true
                    ]   
                ]
            ],
        ]
    ];

    /** @var array FORM_MULTIPLE */
    public const SELECT_FORM = [
        "id"            =>  "select_form",
        "title"         =>  "Select Form",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "items"         =>  [
            # Simple select
            [
                "name"      =>  "simple_select",
                "type"      =>  "select",
                "label"     =>  "Simple Select",
                "select"    =>  [
                    [
                        "label" =>  "Title",
                    ],
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
                ],
            ],
            # Simple Default select
            [
                "name"      =>  "simple_default_select",
                "type"      =>  "select",
                "label"     =>  "Simple Default Select",
                "select"    =>  [
                    [
                        "label"     =>  "Option 1",
                        "value"     =>  1,
                        "default"   =>  true
                    ],
                    [
                        "label" =>  "Option 2",
                        "value" =>  2
                    ],
                    [
                        "label" =>  "Option 3",
                        "value" =>  3
                    ],
                ],
            ],
            # Alt Default select
            [
                "name"      =>  "alt_default_select",
                "type"      =>  "select",
                "label"     =>  "Alt Default Select",
                "default"   =>  2,
                "select"    =>  [
                    [
                        "label"     =>  "Option 1",
                        "value"     =>  1,
                    ],
                    [
                        "label" =>  "Option 2",
                        "value" =>  2
                    ],
                    [
                        "label" =>  "Option 3",
                        "value" =>  3
                    ],
                ],
            ],
            # Simple tag select
            [
                "name"      =>  "simple_tag_select",
                "type"      =>  "select",
                "label"     =>  "Simple Tag Select",
                "default"    =>  [
                    "Option 1",
                    "Option 2",
                    "Option 3",
                ],
                "_style"        =>  [
                    "select"        =>  [
                        "tag"           =>  true,
                        "clear"         =>  true,
                    ]
                ]
            ],
        ]
    ];

    /** @var array FORM_SIMPLE */
    public const FORM_NO_CONFIRM = [
        "id"            =>  "form_no_confirm",
        "title"         =>  "Form Without Confirm",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  false,
        "confirm"       =>  false,
        "items"         =>  [
            # Simple text input
            [
                "name"      =>  "text_input",
                "type"      =>  "text",
                "label"     =>  "Text Input"
            ],
        ]
    ];

    /** @var array FORM_SIMPLE */
    public const FORM_CONFIRM_TITLE = [
        "id"            =>  "form_confirm_title",
        "title"         =>  "Form With other Confirm title",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  false,
        "confirm"       =>  "Confirm",
        "items"         =>  [
            # Simple text input
            [
                "name"      =>  "text_input",
                "type"      =>  "text",
                "label"     =>  "Text Input"
            ],
        ]
    ];

    /** @var array FORM_SIMPLE */
    public const FORM_CUSTOM_CONFIRM = [
        "id"            =>  "form_custom_confirm",
        "title"         =>  "Form With Custom Confirm",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  false,
        "confirm"       =>  [
            "title"         =>  "Custom",
            "icon"          =>  [
                "class"         =>  "material-icons",
                "text"          =>  "place",
            ],
            "align"         =>  "center"
        ],
        "items"         =>  [
            # Simple text input
            [
                "name"      =>  "text_input",
                "type"      =>  "text",
                "label"     =>  "Text Input"
            ],
        ]
    ];

    /** @var array FORM_SIMPLE */
    public const FORM_CUSTOM_INVERT = [
        "id"            =>  "form_custom_invert",
        "title"         =>  "Form with inverted buttons",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  true,
        "confirm"       =>  [
            "title"         =>  "Save",
            "icon"          =>  [
                "class"         =>  "material-icons",
                "text"          =>  "save",
            ],
            "invert"        =>  true
        ],
        "items"         =>  [
            # Simple text input
            [
                "name"      =>  "text_input",
                "type"      =>  "text",
                "label"     =>  "Text Input"
            ],
        ]
    ];

    /** @var array FORM_SIMPLE */
    public const FORM_DEPENDS = [
        "id"            =>  "form_with_depends",
        "title"         =>  "Form with depends",
        "entity"        =>  null,
        "onready"       =>  null,
        "reset"         =>  false,
        "confirm"       =>  false,
        "items"         =>  [
            # Depends
            [
                "name"      =>  "checkbox_parent",
                "type"      =>  "switch",
                "label"     =>  "Checkbox parent",
                "default"   =>  true,
            ],
            # Depending
            [
                "name"      =>  "checkbox_children",
                "type"      =>  "switch",
                "label"     =>  "Checkbox child",
                "default"   =>  true,
                "depends"   =>  "checkbox_parent" // Can be an array
            ]
        ]
    ];

}