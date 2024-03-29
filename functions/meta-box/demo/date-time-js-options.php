<?php
add_action("admin_init", "YOUR_PREFIX_register_meta_boxes");
function YOUR_PREFIX_register_meta_boxes()
{
    if (!class_exists("RW_Meta_Box")) {
        return;
    }
    $prefix = "YOUR_PREFIX_";
    $meta_box = [
        "title" => __("Date Time Picker With JS Options", "rwmb"),
        "fields" => [
            [
                "name" => __("Date", "rwmb"),
                "id" => $prefix . "date",
                "type" => "date",
                // jQuery date picker options. See here http://jqueryui.com/demos/datepicker
                "js_options" => [
                    "appendText" => __("(yyyy-mm-dd)", "rwmb"),
                    "autoSize" => true,
                    "buttonText" => __("Select Date", "rwmb"),
                    "dateFormat" => __("yy-mm-dd", "rwmb"),
                    "numberOfMonths" => 2,
                    "showButtonPanel" => true,
                ],
            ],
            [
                "name" => __("Datetime", "rwmb"),
                "id" => $prefix . "datetime",
                "type" => "datetime",
                // jQuery datetime picker options. See here http://trentrichardson.com/examples/timepicker/
                "js_options" => [
                    "stepMinute" => 15,
                    "showTimepicker" => true,
                ],
            ],
            [
                "name" => __("Time", "rwmb"),
                "id" => $prefix . "time",
                "type" => "time",
                // jQuery datetime picker options. See here http://trentrichardson.com/examples/timepicker/
                "js_options" => [
                    "stepMinute" => 5,
                    "showSecond" => true,
                    "stepSecond" => 10,
                ],
            ],
        ],
    ];
    new RW_Meta_Box($meta_box);
}
