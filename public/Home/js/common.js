/**
 * Created by alen on 2015/11/24.
 */
var User = {
    login: function () {
        $.ajax({
            url: loginUrl,
            data: $("#loginForm").serialize(),
            type: "post",
            dataType: "json",
            success: function (data) {
                if (data.code) {
                    layer.msg(data.msg);
                    location.href = data.url;
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            },
            error: function () {
                layer.msg("服务器错误，请稍候再试", {shift: 6});
            }
        });
    }
};
var Comment = {
    add: function () {
        $.ajax({
            url: addCommentUrl,
            data: $("#addCommentForm").serialize(),
            type: "post",
            dataType: "json",
            success: function (data) {
                if (data.code) {
                    layer.msg(data.msg);
                    $("#addCommentForm").find("textarea,input").val("");
                    location.reload();
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            },
            error: function () {
                layer.msg("服务器错误，请稍候再试", {shift: 6});
            }
        });
    },
    reply: function () {
        $.ajax({
            url: replyCommentUrl,
            data: $("#replyCommentForm").serialize(),
            type: "post",
            dataType: "json",
            success: function (data) {
                if (data.code) {
                    layer.msg(data.msg);
                    location.reload();
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            },
            error: function () {
                layer.msg("服务器错误，请稍候再试", {shift: 6});
            }
        });
    },
    del: function (id) {
        $.ajax({
            url: delCommentUrl,
            data: {id: id},
            type: "post",
            dataType: "json",
            success: function (data) {
                if (data.code) {
                    layer.msg(data.msg);
                    //$("#commentForm").find("textarea,input").val("");
                    $("[data-id='" + id + "']").slideUp(150, function () {
                        $(this).remove();
                    });
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            },
            error: function () {
                layer.msg("服务器错误，请稍候再试", {shift: 6});
            }
        });
    }
};
var Blog = {
    update: function () {
        $.ajax({
            url: updateBlogUrl,
            type: "post",
            data: $("#blog-form").serialize(),
            dataType: "json",
            success: function (data) {
                if (data.code) {
                    layer.msg(data.msg);
                    location.href = data.url;
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            },
            error: function () {
                layer.msg("服务器错误，请稍候再试", {shift: 6});
            }
        });
    },
    del: function (id) {
        $.ajax({
            url: delUrl,
            data: {id: id},
            dataType: "json",
            type: "post",
            success: function (data) {
                if (data.code) {
                    layer.msg(data.msg);
                    location.reload();
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            },
            error: function () {
                layer.msg("服务器错误，请稍候再试", {shift: 6});
            }
        });
    },
    updateCategory: function () {
        $.ajax({
            url: updateCategoryUrl,
            data: $("#updateCategoryForm").serialize(),
            dataType: "json",
            type: "post",
            success: function (data) {
                if (data.code) {
                    layer.msg(data.msg);
                    location.reload();
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            },
            error: function () {
                layer.msg("服务器错误，请稍候再试", {shift: 6});
            }
        });
    },
    uploadImage: function (file) {
        var fd = new FormData();
        fd.append("file", file);
        $.ajax({
            data: fd,
            type: "POST",
            url: UploadUrl,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                fd = data;
            }
        });
        return fd;
    }
};
var Common = {
    update: function () {
        $.ajax({
            url: updateUrl,
            data: $("#common-form").serialize(),
            type: "post",
            dataType: "json",
            success: function (data) {
                if (data.code) {
                    layer.msg(data.msg);
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            },
            error: function () {
                layer.msg("服务器错误，请稍候再试", {shift: 6});
            }
        });
    }
};
var Activity = {
    checkIn: function () {
        $.ajax({
            type: "post",
            url: CheckInUrl,
            async: true,
            data: $("#checkin-form").serialize(),
            dataType: "json",
            success: function (data) {
                if (data.code)
                    layer.msg("签到成功！", {
                        shift: 1,
                        shade: 0.6,
                        btn: ['社长最帅！', '你算什么东西'],
                        time: 0,
                        yes: function () {
                            layer.closeAll();
                            localStorage.setItem("webmaster_name", $("#name").val());
                            localStorage.setItem("webmaster_stu_no", $("#stu_no").val());
                            localStorage.setItem("webmaster_class", $("#class").val());
                            window.close();
                        },
                        btn2: function () {
                            layer.closeAll();
                            layer.msg("农要么起西！<br>不帮你保存信息了，<br>罚你下次签到要手打信息！", {
                                time: 0
                            });
                        }
                    });
                else
                    layer.msg(data.msg, {
                        shift: 6,
                        time: 3000
                    });
            },
            error: function () {
                layer.msg("网络出错了呢，再试一次吧！", {
                    shift: 6,
                    time: 2000
                });
            }
        });
    },
    signUp: function (id) {
        layer.closeAll();
        var load_id = layer.load();
        $.ajax({
            url: signUpPageUrl,
            type: "post",
            dataType: "json",
            data: {id: id},
            success: function (data) {
                layer.close(load_id);
                if (data.code) {
                    layer.msg(data.msg, {time: 0, area: "24rem", shadeClose: true, shade: 0.7});
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            }
        });
    },
    quit: function (stu_no, activity) {
        layer.closeAll();
        var load_id = layer.load();
        $.ajax({
            url: quitUrl,
            type: "post",
            dataType: "json",
            data: {stu_no: stu_no, activity: activity},
            success: function (data) {
                layer.close(load_id);
                if (data.code) {
                    layer.msg(data.msg);
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            }
        });
    },
    comment: function () {
        layer.closeAll();
        var load_id = layer.load();
        $.get(commentPageUrl, {}, function (data) {
            layer.close(load_id);
            if (data.code) {
                layer.msg(data.msg, {time: 0, area: "24rem", shadeClose: true, shade: 0.7});
            } else {
                layer.msg(data.msg, {shift: 6});
            }
        }, "json");
    }
};
var Job = {
    apply: function (form) {
        layer.closeAll();
        var load_id = layer.load();
        var fd = new FormData(form);
        $.ajax({
            url: applyUrl,
            type: "post",
            dataType: "json",
            processData: false,
            contentType: false,
            data: fd,
            success: function (data) {
                layer.close(load_id);
                if (data.code) {
                    if (localStorage) {
                        localStorage.setItem("webmaster_name", form.name.value);
                        localStorage.setItem("webmaster_stu_no", form.stu_no.value);
                        localStorage.setItem("webmaster_class", form.class.value);
                        localStorage.setItem("webmaster_contact", form.qq.value);
                    }
                    layer.msg(data.msg);
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            }
        });
        return false;
    },
    quit: function (stu_no, activity) {
        layer.closeAll();
        var load_id = layer.load();
        $.ajax({
            url: quitUrl,
            type: "post",
            dataType: "json",
            data: {stu_no: stu_no, activity: activity},
            success: function (data) {
                layer.close(load_id);
                if (data.code) {
                    layer.msg(data.msg);
                } else {
                    layer.msg(data.msg, {shift: 6});
                }
            }
        });
    }
};

function subString(str, len, hasDot) {
    var newLength = 0;
    var newStr = "";
    var chineseRegex = /[^\x00-\xff]/g;
    var singleChar = "";
    var strLength = str.replace(chineseRegex, "**").length;
    for (var i = 0; i < strLength; i++) {
        singleChar = str.charAt(i).toString();
        if (singleChar.match(chineseRegex) != null) {
            newLength += 2;
        }
        else {
            newLength++;
        }
        if (newLength > len) {
            break;
        }
        newStr += singleChar;
    }

    if (hasDot && strLength > len) {
        newStr += "...";
    }
    return newStr;
}