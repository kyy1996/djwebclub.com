<?php
echo '<?php
/**
 * Created by Webmaster CURD Generator
 * Version: {version}
 * Type: {type}
 * Time: {time}
 */';
?>

namespace {namespace}\model;

use think\Model;
use think\Request;

class {model} extends Model
{
protected $auto = [<?= isset($auto) && is_array($auto) ? "'" . implode("', '", $auto) . "'" : null; ?>];
protected $readonly = [<?= isset($readonly) && is_array($readonly) ? "'" . implode("', '", $readonly) . "'" : null; ?>];
protected $autoWriteTimestamp = <?= $timestamp ? "true" : "false" ?>;

<?php foreach ($auto as $name): ?>
    protected function set<?= ucfirst(strtolower($name)) ?>Attr($value = ""){
    //logic...
    return $value;
    }
<?php endforeach; ?>

<?php if ($relation['type']): ?>
    public function <?= $relation['model'] ?>() {
    <?php switch ($relation['type']): ?>
<?php case "belongsto": ?>
            return $this->belongsTo("<?= ucfirst($relation['model']) ?>", "<?= $relation['foreign_key'] ?>", "<?= $relation['other_key'] ?>");
            <?php
            break;
        case "hasone":
            ?>
            return $this->hasOne("<?= ucfirst($relation['model']) ?>", "<?= $relation['foreign_key'] ?>", "<?= $relation['local_key'] ?>");
            <?php
            break;
        case "hasmany":
            ?>
            return $this->hasMany("<?= ucfirst($relation['model']) ?>", "<?= $relation['foreign_key'] ?>", "<?= $relation['local_key'] ?>");
            <?php
            break;
        case "belongstomany":
            ?>
            return $this->belongsToMany("<?= ucfirst($relation['model']) ?>", "<?= $relation['table'] ?>", "<?= $relation['foreign_key'] ?>", "<?= $relation['local_key'] ?>");
            <?php
            break;
        case "hasmanythrough":
            ?>
            return $this->hasManyThrough("<?= ucfirst($relation['model']) ?>", "<?= $relation['foreign_key'] ?>", "<?= $relation['local_key'] ?>");
            <?php break; endswitch; ?>
    }
<?php endif; ?>
}