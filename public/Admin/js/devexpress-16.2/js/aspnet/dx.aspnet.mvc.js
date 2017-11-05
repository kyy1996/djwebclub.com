/*!
* DevExtreme ASP.NET MVC Wrappers (dx.aspnet.mvc.js)
* Version: 16.2.6
*
* Copyright (c) Developer Express Inc.
* EULA: https://www.devexpress.com/Support/EULAs/DevExtreme.xml
*/

(function($, DX) {

    var ui = DX.ui;

    var openTag = "<%",
        closeTag = "%>",
        encodeQualifier = "-",
        interpolateQualifier = "=";

    var compileTemplate = function(text) {
        var bag = ["var _ = [];", "with(obj||{}) {"];
        var chunks = text.split(openTag);
        acceptText(bag, chunks.shift());
        for(var i = 0; i < chunks.length; i++) {
            var tmp = chunks[i].split(closeTag);
            if(tmp.length !== 2)
                throw "Template syntax error";
            acceptCode(bag, tmp[0]);
            acceptText(bag, tmp[1]);
        }        
        bag.push("};", "return _.join('')");
        return new Function("obj", bag.join(''));
    };

    var acceptText = function(bag, text) {
        if(!text)
            return;
        bag.push("_.push(", JSON.stringify(text), ");");
    };

    var acceptCode = function(bag, code) {
        var encode = code.charAt(0) === encodeQualifier;
        var interpolate = code.charAt(0) === interpolateQualifier;
        if(encode || interpolate) {
            bag.push("_.push(");
            if(encode)
                bag.push("DevExpress.AspNet.encodeHtml(");
            bag.push(code.substr(1));
            if(encode)
                bag.push(")");
            bag.push(");");
        } else {
            bag.push(code);
        }
    };

    var outerHtml = function(element) {
        element = $(element);

        var templateTag = element.length && element[0].nodeName.toLowerCase();
        if(templateTag === "script") {
            return element.html();
        } else {
            element = $("<div>").append(element);
            return element.html();
        }
    };

    $.extend(DX, {
        AspNet: {
            renderComponent: function(name, options, id) {
                id = id || ("dx-" + new DX.data.Guid());
                var templateRendered = ui.templateRendered;

                var render = function(_, container) {
                    $("#" + id, container)[name](options);
                    templateRendered.remove(render);
                };

                templateRendered.add(render);

                return "<div id=\"" + id + "\"></div>";
            },

            getComparisonTargetValue: function(name) {
                var $widget = $("input[name='" + name + "']").closest(".dx-widget");
                if($widget.length) {
                    var dxComponents = $widget.data("dxComponents"),
						widget = $widget.data(dxComponents[0]);

                    if(widget) {
                        return widget.option("value");
                    }
                }
            },

            template: function(content) {
                return compileTemplate(content);
            },

            encodeHtml: function(value) {
                return String(value)
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;");
            }
        }
    });

    ui.setTemplateEngine({
        compile: function(element) {
            return DX.AspNet.template(outerHtml(element));
        },
        render: function(template, data) {
            return template(data);
        }
    });

})(jQuery, DevExpress);