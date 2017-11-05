<?php if ($layout['status']): ?>
    {extend name="<?= $layout['name'] ?>"/}
    {block name="body"}
<?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="btn-group btn-group-md">
                <button class="btn btn-primary" onclick="helper.form.modify()">+ 新增</button>
            </div>
            <table class="table table-hover middle-align text-center">
                <thead>
                <tr>
                    <?php foreach ($field as $item_name => $item) :if ($item['position']['table'] != "hide"): ?>
                        <th><?= $item['alias'] ?: $item_name ?></th>
                    <?php endif;endforeach; ?>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                {volist name="_list" id="item"}
                <tr class="item" data-id="{$item.<?= $key ?>}">
                    <?php foreach ($field as $item_name => $item) :
                        if ($item['position']['table'] != "hide"):?>
                            <td>
                                <?php switch ($item['position']['table']):
                                    case "static": ?>
                                        <p class="form-control-static" data-name="<?= $item_name ?>">
                                            {$item.<?= $item_name ?>}</p>
                                        <input type="hidden" name="<?= $item_name ?>" value="{$item.<?= $item_name ?>}"
                                               form="form-{$item.<?= $key ?>}">
                                        <?php break;
                                    case "input": ?>
                                        <?php switch ($item['type']):
                                            case "img":
                                                $has_image = true;
                                                ?>
                                                <figure class="img-uploader-wrapper">
                                                    <img src="{$item.<?= $item_name ?>}" data-name="<?= $item_name ?>"
                                                         alt="" width="120"
                                                         onerror="this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAC0lEQVQYV2NgAAIAAAUAAarVyFEAAAAASUVORK5CYII='">
                                                    <input type="file" data-name="<?= $item_name ?>"
                                                           id="modal-form-<?= $item_name ?>"
                                                           class="form-control uploader-file"
                                                           data-title="<?= $item['alias'] ?: $item_name ?>"
                                                           onchange="helper.imageInputChange()">
                                                    <input type="hidden" name="<?= $item_name ?>"
                                                           value="{$item.<?= $item_name ?>}">
                                                </figure>
                                                <?php break;
                                            case "select": ?>
                                                <select name="<?= $item_name ?>"
                                                        class="form-control"<?= $item['type_option_html'] ?>
                                                        form="form-{$item.<?= $key ?>}"
                                                        title="<?= $item['alias'] ?: $item_name ?>">
                                                    <?php foreach (explode("\n", $item['type_option']['options']) as $option): list($title, $value) = strpos($option = trim($option), ":") !== false ? explode(":", trim($option)) : [$option, $option] ?>
                                                        {if condition="$item.<?= $item_name ?> == '<?= $value ?>'"}
                                                        <option value="<?= $value ?>"
                                                                selected="selected"><?= $title ?></option>
                                                        {else/}
                                                        <option value="<?= $value ?>"><?= $title ?></option>
                                                        {/if}
                                                    <?php endforeach; ?>
                                                </select>
                                                <?php break;
                                            case "radio": ?>
                                                <?php foreach (explode("\n", $item['type_option']['options']) as $option): list($title, $value) = strpos($option = trim($option), ":") !== false ? explode(":", trim($option)) : [$option, $option] ?>
                                                    <label>
                                                        {if condition="$item.<?= $item_name ?> == '<?= $value ?>'"}
                                                        <input type="radio" value="<?= $value ?>" checked="checked"
                                                               form="form-{$item.<?= $key ?>}" name="<?= $item_name ?>">
                                                        {else/}
                                                        <input type="radio" value="<?= $value ?>"
                                                               form="form-{$item.<?= $key ?>}" name="<?= $item_name ?>">
                                                        {/if}
                                                        <?= $title ?>
                                                    </label>
                                                <?php endforeach; ?>
                                                <?php break;
                                            case "switch": ?>
                                                <label><?= $item['placeholder'] ?: $item_name ?>
                                                    {if condition="$item.<?= $item_name ?>"}
                                                    <input type="checkbox" class="iswitch iswitch-info" value="1"
                                                           form="form-{$item.<?= $key ?>}" name="<?= $item_name ?>"
                                                           checked="checked">
                                                    {else/}
                                                    <input type="checkbox" class="iswitch iswitch-info" value="1"
                                                           form="form-{$item.<?= $key ?>}" name="<?= $item_name ?>">
                                                    {/if}
                                                </label>
                                                <?php break;
                                            case "textarea": ?>
                                                <textarea name="<?= $item_name ?>"
                                                          form="form-{$item.<?= $key ?>}"<?= $item['type_option_html'] ?>
                                                          placeholder="<?= $item['placeholder'] ?>" class="form-control"
                                                          cols="30">{$item.<?= $item_name ?>}</textarea>
                                                <?php break;
                                            case "number": ?>
                                                <div class="input-group spinner">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-gray" data-type="decrement">-</button>
                                                    </span>
                                                    <input type="number" name="<?= $item_name ?>"
                                                           form="form-{$item.<?= $key ?>}"
                                                           class="form-control text-center"<?= $item['type_option_html'] ?>
                                                           value="{$item.<?= $item_name ?>}"
                                                           placeholder="<?= $item['placeholder'] ?>">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-gray" data-type="increment">+</button>
                                                    </span>
                                                </div>
                                                <?php break;
                                            default: ?>
                                                <input type="<?= $item['type'] ?>" name="<?= $item_name ?>"
                                                       form="form-{$item.<?= $key ?>}"
                                                       class="form-control"<?= $item['type_option_html'] ?>
                                                       value="{$item.<?= $item_name ?>}"
                                                       placeholder="<?= $item['placeholder'] ?>">
                                                <?php break; ?>
                                            <?php endswitch; ?>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                            </td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td>
                        <?php foreach ($field as $item_name => $item) :
                            if ($item['position']['table'] == "hide"):?>
                                <input type="hidden" name="<?= $item_name ?>" value="{$item.<?= $item_name ?>}"
                                       form="form-{$item.<?= $key ?>}">
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <form action="{:url('update')}" id="form-{$item.<?= $key ?>}" onsubmit="helper.form.submit()">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">保存</button>
                                <button type="button" class="btn btn-info" onclick="helper.form.modify(this)">修改
                                </button>
                                <button type="button" class="btn btn-danger"
                                        onclick="helper.form.del('{:url(\'delete\')}')">删除
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
                {/volist}
                </tbody>
            </table>
            <div class="text-right">
                {$_list->render()}
            </div>
        </div>
    </div>
<?php if ($layout['status']): ?>
    {/block}
    {block name="script"}
<?php endif; ?>
    <div class="modal-group">
        <div class="modal fade" id="update-modal" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{:url('update')}" class="form" method="post" onsubmit="helper.form.submit();">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"><span class="action-type">更新</span><?= $controller['title'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach ($field as $item_name => $item) :
                                if ($item['position']['modal'] != "hide" && $item['type'] != "hidden"):?>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <?php switch ($item['position']['modal']):
                                                    case "static":
                                                        ?><label class="control-label"
                                                                 for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                        <p class="form-control-static" id="modal-form-<?= $item_name ?>"
                                                           data-name="<?= $item_name ?>"></p>
                                                        <input type="hidden" name="<?= $item_name ?>">
                                                        <?php break;
                                                    case "input": ?>
                                                        <?php switch ($item['type']):
                                                            case "img":
                                                                $has_image = true;
                                                                ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                                <figure class="img-uploader-wrapper">
                                                                    <img src="" alt="" width="120"
                                                                         onerror="this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAC0lEQVQYV2NgAAIAAAUAAarVyFEAAAAASUVORK5CYII='">
                                                                    <input type="file" data-name="<?= $item_name ?>"
                                                                           id="modal-form-<?= $item_name ?>"
                                                                           class="form-control uploader-file"
                                                                           data-title="<?= $item['alias'] ?: $item_name ?>"
                                                                           onchange="helper.imageInputChange()">
                                                                    <input type="hidden" name="<?= $item_name ?>"
                                                                           value="">
                                                                </figure>
                                                                <?php break;
                                                            case "select": ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                                <select name="<?= $item_name ?>"
                                                                        id="modal-form-<?= $item_name ?>"
                                                                        class="form-control"
                                                                        title="<?= $item['alias'] ?: $item_name ?>">
                                                                    <?php foreach (explode("\n", $item['type_option']['options']) as $option): list($title, $value) = strpos($option = trim($option), ":") !== false ? explode(":", trim($option)) : [$option, $option] ?>
                                                                        <option
                                                                                value="<?= $value ?>"><?= $title ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <?php break;
                                                            case "radio": ?>
                                                                <label
                                                                        class="control-label"><?= $item['alias'] ?: $item_name ?></label>
                                                                <?php foreach (explode("\n", $item['type_option']['options']) as $option): list($title, $value) = strpos($option = trim($option), ":") !== false ? explode(":", trim($option)) : [$option, $option] ?>
                                                                    <label>
                                                                        <?= $title ?><input type="radio"
                                                                                            value="<?= $value ?>"
                                                                                            name="<?= $item_name ?>">
                                                                    </label>
                                                                <?php endforeach; ?>
                                                                <?php break;
                                                            case "switch": ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?>
                                                                    <input type="checkbox" class="iswitch iswitch-info"
                                                                           value="1" id="modal-form-<?= $item_name ?>"
                                                                           name="<?= $item_name ?>"></label>
                                                                <?php break;
                                                            case "textarea": ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                                <textarea name="<?= $item_name ?>"
                                                                          id="modal-form-<?= $item_name ?>"
                                                                          class="form-control"<?= $item['type_option_html'] ?>
                                                                          placeholder="<?= $item['placeholder'] ?>"></textarea>
                                                                <?php break;
                                                            case "number": ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                                <div class="input-group spinner">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-gray"
                                                                                data-type="decrement">-</button>
                                                                    </span>
                                                                    <input type="number" name="<?= $item_name ?>"
                                                                           id="modal-form-<?= $item_name ?>"
                                                                           class="form-control text-center"<?= $item['type_option_html'] ?>
                                                                           placeholder="<?= $item['placeholder'] ?>">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-gray"
                                                                                data-type="increment">+</button>
                                                                    </span>
                                                                </div>
                                                                <?php break;
                                                            default: ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                                <input type="<?= $item['type'] ?>"
                                                                       name="<?= $item_name ?>"
                                                                       id="modal-form-<?= $item_name ?>"
                                                                       class="form-control"<?= $item['type_option_html'] ?>
                                                                       placeholder="<?= $item['placeholder'] ?>">
                                                                <?php break; ?>
                                                            <?php endswitch; ?>
                                                        <?php break; ?>
                                                    <?php endswitch; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <input type="hidden" name="<?= $item_name ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php if (@$has_image): ?>
    {load href="http://gosspublic.alicdn.com/aliyun-oss-sdk-4.4.4.min.js"}
    {load href="__STATIC__/Common/js/OSSHelper.js"}
<?php endif; ?>
<?php if ($layout['status']): ?>
    {/block}
<?php endif; ?>