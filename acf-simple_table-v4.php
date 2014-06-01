<?php

class acf_field_simple_table extends acf_field
{
    public $name,
           $label,
           $category,
           $defaults
    ;
    
    public function __construct()
    {
        $this->name     = 'simple_table';
        $this->label    = 'Simple Table';
        $this->category = __('Content','acf');
        $this->defaults = array(
            'rows' => 2,
            'cols' => 2
        );

        parent::__construct();

        $this->settings = array(
            'path'    => apply_filters('acf/helpers/get_path', __FILE__),
            'dir'     => apply_filters('acf/helpers/get_dir', __FILE__),
            'version' => '1.0.0'
        );
    }

    public function create_options($field)
    {
        $field = array_merge($this->defaults, $field);
        $key   = $field['name'];
        ?>
        <tr class="field_option field_option_<?php print $this->name; ?>">
            <td class="label">
                <label>Rows</label>
                <p class="description">Number of rows for the table.</p>
            </td>
            <td>
                <?php
                do_action('acf/create_field', array(
                    'type'      =>  'number',
                    'name'      =>  'fields['.$key.'][rows]',
                    'value'     =>  $field['rows']
                ));
                ?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php print $this->name; ?>">
            <td class="label">
                <label>Columns</label>
                <p class="description">Number of columns for the table.</p>
            </td>
            <td>
                <?php
                do_action('acf/create_field', array(
                    'type'      =>  'number',
                    'name'      =>  'fields['.$key.'][cols]',
                    'value'     =>  $field['cols']
                ));
                ?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php print $this->name; ?>">
            <td class="label">
                <label>Column Names</label>
                <p class="description">Comma separated values of columns headers.<br /><small>ex: "Attribute,Value"</small></p>
            </td>
            <td>
                <?php
                do_action('acf/create_field', array(
                    'type'      =>  'text',
                    'name'      =>  'fields['.$key.'][col_headers]',
                    'value'     =>  $field['col_headers']
                ));
                ?>
            </td>
        </tr>
        <?php
        
    }

    public function create_field($field)
    {
        $field       = array_merge($this->defaults, $field);
        $name        = $field['name'];
        $value       = $field['value'];
        $rows        = $field['rows'];
        $cols        = $field['cols'];
        $col_headers = explode(',', $field['col_headers']);
        ?>
        <div>
            <table>
                <?php for($r = 0; $r < $rows; $r++) { ?>
                    <tr>
                        <?php for($c = 0; $c < $cols; $c++) { ?>
                            <td>
                                <?php if ($r == 0) { ?>
                                    <em><?php print $col_headers[$c]; ?></em>
                                <?php } ?>
                                <input type="text" name="<?php print esc_attr($name) ?>[<?php print $r; ?>][<?php print $c; ?>]" value="<?php print esc_attr($value[$r][$c]); ?>" />
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php
    }
    
    public function load_value($value, $post_id, $field)
    {
        return $value;
    }
    
    public function update_value($value, $post_id, $field)
    {
        $value = serialize(
            array_filter(
                array_map('array_filter', $value)
            )
        );

        return $value;
    }

    public function load_field($field)
    {
        return $field;
    }

    public function update_field($field, $post_id)
    {
        $field['col_headers'] = trim(
            str_replace(
                array(', ', ' ,', ' , '),
                ',',
                $field['col_headers']
            )
        );

        return $field;
    }
}

new acf_field_simple_table;
