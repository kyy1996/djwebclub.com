<?php
echo '<?php
/**
 * Created by Webmaster CURD Generator
 * Version: {version}
 * Type: {type}
 * Time: {time}
 */';

$type = ['email', 'url', 'number', 'file'];
?>

namespace {namespace}\validate;

use think\Validate;

class {model} extends Validate
{
protected $rule = [
<?php foreach ($field as $name => $item):
    $rules = [];
    if (key_exists("required", $item['type_option']) && $item['type_option']['required']) $rules[] = "require";
    if (key_exists("pattern", $item['type_option']) && $item['type_option']['pattern']) $rules[] = "regex:" . $item['type_option']['pattern'];
    if (key_exists("length", $item['type_option']) && $item['type_option']['length']) $rules[] = "length:" . $item['type_option']['length'];
    if (in_array($item['type'], $type)) $rules[] = $item['type'];
    if ($item['type'] == "img") $rules[] = "image";
    if ($rules) :?>
        '<?= $name ?>|<?= $item['alias'] ?: $name ?>' => "<?php
        echo implode("|", $rules); ?>",
        <?php
    endif;
endforeach; ?>
];
}
