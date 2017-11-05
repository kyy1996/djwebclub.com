<?php if ($layout['status']): ?>
    {extend name="<?= $layout['name'] ?>"/}
    {block name="body"}
<?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="btn-group btn-group-md">
                <button class="btn btn-primary" onclick="add()">+ 新增</button>
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
                    <?php
                    foreach ($field as $item_name => $item) :
                        if ($item['position']['table'] != "hide"):?>
                            <td>
                                <?php switch ($item['position']['table']):
                                    case "static": ?>
                                        <p class="form-control-static">{$item.<?= $item_name ?>}</p>
                                        <input type="hidden" name="<?= $item_name ?>" value="{$item.<?= $item_name ?>}"
                                               form="form-{$item.<?= $key ?>}">
                                        <?php break;
                                    case "input": ?>
                                        <?php switch ($item['type']):
                                            case "img": ?>
                                                <img src="{$item.<?= $item_name ?>}" alt="" width="120">
                                                <input type="file" name="<?= $item_name ?>"
                                                       class="form-control img-file-input"
                                                       form="form-{$item.<?= $key ?>}"
                                                       data-title="<?= $item['alias'] ?: $item_name ?>"
                                                       onchange="helper.imageInputChange()">
                                                <?php break;
                                            case "select": ?>
                                                <select name="<?= $item_name ?>" class="form-control"
                                                        form="form-{$item.<?= $key ?>}"
                                                        title="<?= $item['alias'] ?: $item_name ?>">
                                                    <?php foreach (explode("\n", $item['type_option']['options']) as $option): list($title, $value) = explode(":", trim($option)) ?>
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
                                                <?php foreach (explode("\n", $item['type_option']['options']) as $option): list($title, $value) = explode(":", trim($option)) ?>
                                                    <label><?= $title ?><input type="radio" value="<?= $value ?>"
                                                                               form="form-{$item.<?= $key ?>}"
                                                                               name="<?= $item_name ?>"></label>
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
                        <?php else: ?>
                            <input type="hidden" name="<?= $item_name ?>" value="{$item.<?= $item_name ?>}">
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td>
                        <form action="{:url('update')}" id="form-{$item.<?= $key ?>}" onsubmit="helper.submitForm()">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">保存</button>
                                <button type="button" class="btn btn-info" onclick="modify(this)">修改</button>
                                <button type="button" class="btn btn-danger" onclick="del(this)">删除</button>
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
                    <form action="{:url('update')}" class="form" method="post" onsubmit="helper.submitForm();">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"><span class="action-type">更新</span><?= $controller['title'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach ($field as $item_name => $item) :
                                if ($item['position']['modal'] != "hide"):?>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <?php switch ($item['position']['modal']):
                                                    case "static":
                                                        ?>
                                                        <input type="hidden" name="<?= $item_name ?>">
                                                        <?php break;
                                                    case "input": ?>
                                                        <?php switch ($item['type']):
                                                            case "img": ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                                <img src="{$item.<?= $item_name ?>}" alt=""
                                                                     width="120">
                                                                <input type="file" name="<?= $item_name ?>"
                                                                       class="form-control"
                                                                       data-title="<?= $item['alias'] ?: $item_name ?>"
                                                                       onchange="helper.imageInputChange()">
                                                                <?php break;
                                                            case "select": ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                                <select name="<?= $item_name ?>"
                                                                        id="modal-form-<?= $item_name ?>"
                                                                        class="form-control"
                                                                        title="<?= $item['alias'] ?: $item_name ?>">
                                                                    <?php foreach (explode("\n", $item['type_option']['options']) as $option): list($title, $value) = explode(":", trim($option)) ?>
                                                                        <option value="<?= $value ?>"><?= $title ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <?php break;
                                                            case "radio": ?>
                                                                <label class="control-label"
                                                                       for="modal-form-<?= $item_name ?>"><?= $item['alias'] ?: $item_name ?></label>
                                                                <?php foreach (explode("\n", $item['type_option']['options']) as $option): list($title, $value) = explode(":", trim($option)) ?>
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
    <script>
        var deleteUrl = "{:url('delete')}";
        var updateUrl = "{:url('update')}";
        $(".img-file-input").change(function (e) {
            helper.imageInputChange();
        });

        function modify(button) {
            var data = {};
            if (button)
                $(button).parents(".item").find("[name]").each(function (i, input) {
                    if (input.type == "checkbox") data[input.getAttribute("name")] = input.getAttribute("checked") ? 1 : 0;
                    else data[input.getAttribute("name")] = input.value;
                });
            var $modal = $("#update-modal").modal("show");
            $modal.find("input:not([type=checkbox],[type=radio]),textarea").val("");
            $modal.find(".action-type").text(+data.<?= $key ?> ? "修改" : "新增");
            helper.fillForm(data, $modal.find("form"));
        }

        function del(button) {
            var $tr = $(button).closest(".item");
            var id = +$tr.find("[name=<?= $key ?>]").val();
            if (!id) return helper.remove($tr);
            var data = {ids: id};
            helper.post(deleteUrl, data, function () {
                helper.remove($tr);
            });
        }

        function add() {
            modify();
        }
    </script>
<?php if ($layout['status']): ?>
    {/block}
<?php endif; ?>