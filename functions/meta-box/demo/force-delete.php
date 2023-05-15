<?php
add_action("admin_init", "force_delete_register_meta_boxes");
function force_delete_register_meta_boxes()
{
    if (!class_exists("RW_Meta_Box")) {
        return;
    }
    $prefix = "";
    $meta_box = [
        "title" => __("Test Meta Box", "rwmb"),
        "fields" => [
            // FILE UPLOAD
            [
                "name" => __("File Upload", "rwmb"),
                "id" => "{$prefix}file",
                "type" => "file",
                "force_delete" => true,
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
                "force_delete" => true,
            ],
            // PLUPLOAD IMAGE UPLOAD (WP 3.3+)
            [
                "name" => __("Plupload Image Upload", "rwmb"),
                "id" => "{$prefix}plupload",
                "type" => "plupload_image",
                "max_file_uploads" => 4,
                "force_delete" => true,
            ],
        ],
    ];
    new RW_Meta_Box($meta_box);
}
