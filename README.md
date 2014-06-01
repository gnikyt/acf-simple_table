# ACF: Simple Table

*This is for ACF v4*

This field plugin for ACF simply allows anyone to enter data in a table-like format and have it converted into an array for use in the theme. You can set the number of rows, columns and as well, the column headers which will display on the ACF form.

## Installation

+ Copy this repo and place the folder into `wp-content/plugins`
+ Go into your Wordpress backend, then to Plugins
+ Activate `ACF: Simple Table`

That's it! You can now go to `Custom Fields` and add the field `Simple Table` listed under the content group. Enter the number columns and rows and you're set!

![Sample Setup](http://i.imgur.com/QtQvSwV.jpg "Sample Setup")
![Sample Setup](http://i.imgur.com/Vgwc7mQ.jpg "Sample Setup")

## Usage

```php
<?php
$attributes = get_field('attributes'); // the simple table field ID
$num_rows   = sizeof($attributes);
$num_cols   = sizeof($attributes[0]);
?>
<table>
    <?php for($row = 0; $row < $num_rows; $row++) { ?>
        <tr>
            <?php for($col = 0; $col < $num_cols; $col++) { ?>
                <td><?php print $attributes[$row][$col]; ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>
```

In the above screenshot in the Installation section, the output would be:

         |
-------- | --------
Height   | 5' 11"
Weight   | 210LBS
Dash     | 11.3

Of couse this is simply an example; its an array of data so you can parse it or display it however you please.

## Notes

There is no translation support for this field. It was a quick plugin I wrote to help with a client's website.