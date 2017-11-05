<?php
echo '<?php
/**
 * Created by Webmaster CURD Generator
 * Version: {version}
 * Type: {type}
 * Time: {time}
 */';
$auto = ['img', 'file', 'switch'];
?>

namespace {namespace}\model;

use think\Model;
use think\Request;

class {model} extends Model
{
protected $auto = [<?php foreach ($field as $name => $item): if (in_array($item['type'], $auto)): ?>'<?= $name ?>',<?php endif; endforeach; ?>];

<?php foreach ($field as $name => $item): ?>
    <?php if ($item['type'] == "img" || $item['type'] == "file"): ?>

        protected function set<?= ucfirst(strtolower($name)) ?>Attr($file){
        $file = Request::instance()->file($file);
        $path = ROOT_PATH . "public" . DS . "uploads";
        $info = $file->move($path);
        return $info;
        }
    <?php endif; ?>
    <?php if ($item['type'] == "switch"): ?>

        protected function set<?= ucfirst(strtolower($name)) ?>Attr($value = ""){
        return +Request::instance()->request("<?= $name ?>") ? 1 : 0;
        }
    <?php endif; ?>
<?php endforeach; ?>
}