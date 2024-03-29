<?php
// Prevent loading this file directly
defined("ABSPATH") || exit();
if (!class_exists("RWMB_Text_List_Field")) {
    class RWMB_Text_List_Field extends RWMB_Field
    {
        /**
         * Get field HTML
         *
         * @param mixed $meta
         * @param array $field
         *
         * @return string
         */
        static function html($meta, $field)
        {
            $html = [];
            $tpl =
                '<label><input type="text" class="rwmb-text-list" name="%s" id="%s" value="%s" placeholder="%s"/> %s</label>';
            foreach ($field["options"] as $value => $label) {
                $html[] = sprintf(
                    $tpl,
                    $field["field_name"],
                    $field["id"],
                    $value,
                    $field["placeholder"],
                    $label
                );
            }
            return implode(" ", $html);
        }
        /**
         * Get meta value
         * If field is cloneable, value is saved as a single entry in DB
         * Otherwise value is saved as multiple entries (for backward compatibility)
         *
         * @see "save" method for better understanding
         *
         * TODO: A good way to ALWAYS save values in single entry in DB, while maintaining backward compatibility
         *
         * @param $post_id
         * @param $saved
         * @param $field
         *
         * @return array
         */
        static function meta($post_id, $saved, $field)
        {
            $meta = get_post_meta($post_id, $field["id"], $field["clone"]);
            $meta =
                (!$saved && "" === $meta) || [] === $meta
                    ? $field["std"]
                    : $meta;
            $meta = array_map("esc_attr", (array) $meta);
            return $meta;
        }
        /**
         * Save meta value
         * If field is cloneable, value is saved as a single entry in DB
         * Otherwise value is saved as multiple entries (for backward compatibility)
         *
         * TODO: A good way to ALWAYS save values in single entry in DB, while maintaining backward compatibility
         *
         * @param $new
         * @param $old
         * @param $post_id
         * @param $field
         */
        static function save($new, $old, $post_id, $field)
        {
            if (!$field["clone"]) {
                parent::save($new, $old, $post_id, $field);
                return;
            }
            if (empty($new)) {
                delete_post_meta($post_id, $field["id"]);
            } else {
                update_post_meta($post_id, $field["id"], $new);
            }
        }
        /**
         * Normalize parameters for field
         *
         * @param array $field
         *
         * @return array
         */
        static function normalize_field($field)
        {
            $field["multiple"] = true;
            $field["field_name"] = $field["id"];
            if (!$field["clone"]) {
                $field["field_name"] .= "[]";
            }
            return $field;
        }
    }
}
