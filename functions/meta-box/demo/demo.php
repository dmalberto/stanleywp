<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */
/********************* META BOX DEFINITIONS ***********************/
/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = "YOUR_PREFIX_";
global $meta_boxes;
$meta_boxes = [];
// 1st meta box
$meta_boxes[] = [
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    "id" => "standard",
    // Meta box title - Will appear at the drag and drop handle bar. Required.
    "title" => __("Standard Fields", "rwmb"),
    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    "pages" => ["post", "page"],
    // Where the meta box appear: normal (default), advanced, side. Optional.
    "context" => "normal",
    // Order of meta box: high (default), low. Optional.
    "priority" => "high",
    // Auto save: true, false (default). Optional.
    "autosave" => true,
    // List of meta fields
    "fields" => [
        // TEXT
        [
            // Field name - Will be used as label
            "name" => __("Text", "rwmb"),
            // Field ID, i.e. the meta key
            "id" => "{$prefix}text",
            // Field description (optional)
            "desc" => __("Text description", "rwmb"),
            "type" => "text",
            // Default value (optional)
            "std" => __("Default text value", "rwmb"),
            // CLONES: Add to make the field cloneable (i.e. have multiple value)
            "clone" => true,
        ],
        // CHECKBOX
        [
            "name" => __("Checkbox", "rwmb"),
            "id" => "{$prefix}checkbox",
            "type" => "checkbox",
            // Value can be 0 or 1
            "std" => 1,
        ],
        // RADIO BUTTONS
        [
            "name" => __("Radio", "rwmb"),
            "id" => "{$prefix}radio",
            "type" => "radio",
            // Array of 'value' => 'Label' pairs for radio options.
            // Note: the 'value' is stored in meta field, not the 'Label'
            "options" => [
                "value1" => __("Label1", "rwmb"),
                "value2" => __("Label2", "rwmb"),
            ],
        ],
        // SELECT BOX
        [
            "name" => __("Select", "rwmb"),
            "id" => "{$prefix}select",
            "type" => "select",
            // Array of 'value' => 'Label' pairs for select box
            "options" => [
                "value1" => __("Label1", "rwmb"),
                "value2" => __("Label2", "rwmb"),
            ],
            // Select multiple values, optional. Default is false.
            "multiple" => false,
            "std" => "value2",
            "placeholder" => __("Select an Item", "rwmb"),
        ],
        // HIDDEN
        [
            "id" => "{$prefix}hidden",
            "type" => "hidden",
            // Hidden field must have predefined value
            "std" => __("Hidden value", "rwmb"),
        ],
        // PASSWORD
        [
            "name" => __("Password", "rwmb"),
            "id" => "{$prefix}password",
            "type" => "password",
        ],
        // TEXTAREA
        [
            "name" => __("Textarea", "rwmb"),
            "desc" => __("Textarea description", "rwmb"),
            "id" => "{$prefix}textarea",
            "type" => "textarea",
            "cols" => 20,
            "rows" => 3,
        ],
    ],
    "validation" => [
        "rules" => [
            "{$prefix}password" => [
                "required" => true,
                "minlength" => 7,
            ],
        ],
        // optional override of default jquery.validate messages
        "messages" => [
            "{$prefix}password" => [
                "required" => __("Password is required", "rwmb"),
                "minlength" => __(
                    "Password must be at least 7 characters",
                    "rwmb"
                ),
            ],
        ],
    ],
];
// 2nd meta box
$meta_boxes[] = [
    "title" => __("Advanced Fields", "rwmb"),
    "fields" => [
        // HEADING
        [
            "type" => "heading",
            "name" => __("Heading", "rwmb"),
            "id" => "fake_id", // Not used but needed for plugin
        ],
        // SLIDER
        [
            "name" => __("Slider", "rwmb"),
            "id" => "{$prefix}slider",
            "type" => "slider",
            // Text labels displayed before and after value
            "prefix" => __('$', "rwmb"),
            "suffix" => __(" USD", "rwmb"),
            // jQuery UI slider options. See here http://api.jqueryui.com/slider/
            "js_options" => [
                "min" => 10,
                "max" => 255,
                "step" => 5,
            ],
        ],
        // NUMBER
        [
            "name" => __("Number", "rwmb"),
            "id" => "{$prefix}number",
            "type" => "number",
            "min" => 0,
            "step" => 5,
        ],
        // DATE
        [
            "name" => __("Date picker", "rwmb"),
            "id" => "{$prefix}date",
            "type" => "date",
            // jQuery date picker options. See here http://api.jqueryui.com/datepicker
            "js_options" => [
                "appendText" => __("(yyyy-mm-dd)", "rwmb"),
                "dateFormat" => __("yy-mm-dd", "rwmb"),
                "changeMonth" => true,
                "changeYear" => true,
                "showButtonPanel" => true,
            ],
        ],
        // DATETIME
        [
            "name" => __("Datetime picker", "rwmb"),
            "id" => $prefix . "datetime",
            "type" => "datetime",
            // jQuery datetime picker options.
            // For date options, see here http://api.jqueryui.com/datepicker
            // For time options, see here http://trentrichardson.com/examples/timepicker/
            "js_options" => [
                "stepMinute" => 15,
                "showTimepicker" => true,
            ],
        ],
        // TIME
        [
            "name" => __("Time picker", "rwmb"),
            "id" => $prefix . "time",
            "type" => "time",
            // jQuery datetime picker options.
            // For date options, see here http://api.jqueryui.com/datepicker
            // For time options, see here http://trentrichardson.com/examples/timepicker/
            "js_options" => [
                "stepMinute" => 5,
                "showSecond" => true,
                "stepSecond" => 10,
            ],
        ],
        // COLOR
        [
            "name" => __("Color picker", "rwmb"),
            "id" => "{$prefix}color",
            "type" => "color",
        ],
        // CHECKBOX LIST
        [
            "name" => __("Checkbox list", "rwmb"),
            "id" => "{$prefix}checkbox_list",
            "type" => "checkbox_list",
            // Options of checkboxes, in format 'value' => 'Label'
            "options" => [
                "value1" => __("Label1", "rwmb"),
                "value2" => __("Label2", "rwmb"),
            ],
        ],
        // EMAIL
        [
            "name" => __("Email", "rwmb"),
            "id" => "{$prefix}email",
            "desc" => __("Email description", "rwmb"),
            "type" => "email",
            "std" => "name@email.com",
        ],
        // RANGE
        [
            "name" => __("Range", "rwmb"),
            "id" => "{$prefix}range",
            "desc" => __("Range description", "rwmb"),
            "type" => "range",
            "min" => 0,
            "max" => 100,
            "step" => 5,
            "std" => 0,
        ],
        // URL
        [
            "name" => __("URL", "rwmb"),
            "id" => "{$prefix}url",
            "desc" => __("URL description", "rwmb"),
            "type" => "url",
            "std" => "http://google.com",
        ],
        // OEMBED
        [
            "name" => __("oEmbed", "rwmb"),
            "id" => "{$prefix}oembed",
            "desc" => __("oEmbed description", "rwmb"),
            "type" => "oembed",
        ],
        // SELECT ADVANCED BOX
        [
            "name" => __("Select", "rwmb"),
            "id" => "{$prefix}select_advanced",
            "type" => "select_advanced",
            // Array of 'value' => 'Label' pairs for select box
            "options" => [
                "value1" => __("Label1", "rwmb"),
                "value2" => __("Label2", "rwmb"),
            ],
            // Select multiple values, optional. Default is false.
            "multiple" => false,
            // 'std'         => 'value2', // Default value, optional
            "placeholder" => __("Select an Item", "rwmb"),
        ],
        // TAXONOMY
        [
            "name" => __("Taxonomy", "rwmb"),
            "id" => "{$prefix}taxonomy",
            "type" => "taxonomy",
            "options" => [
                // Taxonomy name
                "taxonomy" => "category",
                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                "type" => "checkbox_list",
                // Additional arguments for get_terms() function. Optional
                "args" => [],
            ],
        ],
        // POST
        [
            "name" => __("Posts (Pages)", "rwmb"),
            "id" => "{$prefix}pages",
            "type" => "post",
            // Post type
            "post_type" => "page",
            // Field type, either 'select' or 'select_advanced' (default)
            "field_type" => "select_advanced",
            // Query arguments (optional). No settings means get all published posts
            "query_args" => [
                "post_status" => "publish",
                "posts_per_page" => "-1",
            ],
        ],
        // WYSIWYG/RICH TEXT EDITOR
        [
            "name" => __("WYSIWYG / Rich Text Editor", "rwmb"),
            "id" => "{$prefix}wysiwyg",
            "type" => "wysiwyg",
            // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
            "raw" => false,
            "std" => __("WYSIWYG default value", "rwmb"),
            // Editor settings, see wp_editor() function: look4wp.com/wp_editor
            "options" => [
                "textarea_rows" => 4,
                "teeny" => true,
                "media_buttons" => false,
            ],
        ],
        // DIVIDER
        [
            "type" => "divider",
            "id" => "fake_divider_id", // Not used, but needed
        ],
        // FILE UPLOAD
        [
            "name" => __("File Upload", "rwmb"),
            "id" => "{$prefix}file",
            "type" => "file",
        ],
        // FILE ADVANCED (WP 3.5+)
        [
            "name" => __("File Advanced Upload", "rwmb"),
            "id" => "{$prefix}file_advanced",
            "type" => "file_advanced",
            "max_file_uploads" => 4,
            "mime_type" => "application,audio,video", // Leave blank for all file types
        ],
        // IMAGE UPLOAD
        [
            "name" => __("Image Upload", "rwmb"),
            "id" => "{$prefix}image",
            "type" => "image",
        ],
        // THICKBOX IMAGE UPLOAD (WP 3.3+)
        [
            "name" => __("Thickbox Image Upload", "rwmb"),
            "id" => "{$prefix}thickbox",
            "type" => "thickbox_image",
        ],
        // PLUPLOAD IMAGE UPLOAD (WP 3.3+)
        [
            "name" => __("Plupload Image Upload", "rwmb"),
            "id" => "{$prefix}plupload",
            "type" => "plupload_image",
            "max_file_uploads" => 4,
        ],
        // IMAGE ADVANCED (WP 3.5+)
        [
            "name" => __("Image Advanced Upload", "rwmb"),
            "id" => "{$prefix}imgadv",
            "type" => "image_advanced",
            "max_file_uploads" => 4,
        ],
        // BUTTON
        [
            "id" => "{$prefix}button",
            "type" => "button",
            "name" => " ", // Empty name will "align" the button to all field inputs
        ],
    ],
];
/********************* META BOX REGISTERING ***********************/
/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if (!class_exists("RW_Meta_Box")) {
        return;
    }
    global $meta_boxes;
    foreach ($meta_boxes as $meta_box) {
        new RW_Meta_Box($meta_box);
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action("admin_init", "YOUR_PREFIX_register_meta_boxes");
