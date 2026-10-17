!function($, wysi) {
    "use strict";

    var tpl = {
        "font-styles": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li class='dropdown'>" +
              "<a class='btn dropdown-toggle" + size + "' data-toggle='dropdown' href='#'>" +
              "<i class='icon-font'></i>&nbsp;<span class='current-font'>" + locale.font_styles.normal + "</span>&nbsp;<b class='caret'></b>" +
              "</a>" +
              "<ul class='dropdown-menu'>" +
                "<li><a data-wysihtml51-command='formatBlock' data-wysihtml51-command-value='div'>" + locale.font_styles.normal + "</a></li>" +
                "<li><a data-wysihtml51-command='formatBlock' data-wysihtml51-command-value='h1'>" + locale.font_styles.h1 + "</a></li>" +
                "<li><a data-wysihtml51-command='formatBlock' data-wysihtml51-command-value='h2'>" + locale.font_styles.h2 + "</a></li>" +
                "<li><a data-wysihtml51-command='formatBlock' data-wysihtml51-command-value='h3'>" + locale.font_styles.h3 + "</a></li>" +
              "</ul>" +
            "</li>";
        },

        "emphasis": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='btn-group'>" +
                "<a class='btn" + size + "' data-wysihtml51-command='bold' title='CTRL+B'>" + locale.emphasis.bold + "</a>" +
                "<a class='btn" + size + "' data-wysihtml51-command='italic' title='CTRL+I'>" + locale.emphasis.italic + "</a>" +
                "<a class='btn" + size + "' data-wysihtml51-command='underline' title='CTRL+U'>" + locale.emphasis.underline + "</a>" +
              "</div>" +
            "</li>";
        },

        "lists": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='btn-group'>" +
                "<a class='btn" + size + "' data-wysihtml51-command='insertUnorderedList' title='" + locale.lists.unordered + "'><i class='icon-list'></i></a>" +
                "<a class='btn" + size + "' data-wysihtml51-command='insertOrderedList' title='" + locale.lists.ordered + "'><i class='icon-th-list'></i></a>" +
                "<a class='btn" + size + "' data-wysihtml51-command='Outdent' title='" + locale.lists.outdent + "'><i class='icon-indent-right'></i></a>" +
                "<a class='btn" + size + "' data-wysihtml51-command='Indent' title='" + locale.lists.indent + "'><i class='icon-indent-left'></i></a>" +
              "</div>" +
            "</li>";
        },

        "link": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='bootstrap-wysihtml51-insert-link-modal modal hide fade'>" +
                "<div class='modal-header'>" +
                  "<a class='close' data-dismiss='modal'></a>" +
                  "<h3>" + locale.link.insert + "</h3>" +
                "</div>" +
                "<div class='modal-body'>" +
                  "<input value='http://' class='bootstrap-wysihtml51-insert-link-url m-wrap large' type='text'>" +
                "</div>" +
                "<div class='modal-footer'>" +
                  "<a href='#' class='btn' data-dismiss='modal'>" + locale.link.cancel + "</a>" +
                  "<a href='#' class='btn green  btn-primary' data-dismiss='modal'>" + locale.link.insert + "</a>" +
                "</div>" +
              "</div>" +
              "<a class='btn" + size + "' data-wysihtml51-command='createLink' title='" + locale.link.insert + "'><i class='icon-share'></i></a>" +
            "</li>";
        },

        "image": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='bootstrap-wysihtml51-insert-image-modal modal hide fade'>" +
                "<div class='modal-header'>" +
                  "<a class='close' data-dismiss='modal'></a>" +
                  "<h3>" + locale.image.insert + "</h3>" +
                "</div>" +
                "<div class='modal-body'>" +
                  "<input value='http://' class='bootstrap-wysihtml51-insert-image-url  m-wrap large' type='text'>" +
                "</div>" +
                "<div class='modal-footer'>" +
                  "<a href='#' class='btn' data-dismiss='modal'>" + locale.image.cancel + "</a>" +
                  "<a href='#' class='btn  green btn-primary' data-dismiss='modal'>" + locale.image.insert + "</a>" +
                "</div>" +
              "</div>" +
              "<a class='btn" + size + "' data-wysihtml51-command='insertImage' title='" + locale.image.insert + "'><i class='icon-picture'></i></a>" +
            "</li>";
        },

        "html": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
              "<div class='btn-group'>" + 
                "<a class='btn" + size + "' data-wysihtml51-action='change_view' title='" + locale.html.edit + "'><i class='icon-pencil'></i></a>" +
              "</div>" +
            "</li>";
        },

        "color": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li class='dropdown'>" +
              "<a class='btn dropdown-toggle" + size + "' data-toggle='dropdown' href='#'>" +
                "<span class='current-color'>" + locale.colours.black + "</span>&nbsp;<b class='caret'></b>" +
              "</a>" +
              "<ul class='dropdown-menu'>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='black'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='black'>" + locale.colours.black + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='silver'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='silver'>" + locale.colours.silver + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='gray'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='gray'>" + locale.colours.gray + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='maroon'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='maroon'>" + locale.colours.maroon + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='red'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='red'>" + locale.colours.red + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='purple'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='purple'>" + locale.colours.purple + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='green'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='green'>" + locale.colours.green + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='olive'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='olive'>" + locale.colours.olive + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='navy'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='navy'>" + locale.colours.navy + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='blue'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='blue'>" + locale.colours.blue + "</a></li>" +
                "<li><div class='wysihtml51-colors' data-wysihtml51-command-value='orange'></div><a class='wysihtml51-colors-title' data-wysihtml51-command='foreColor' data-wysihtml51-command-value='orange'>" + locale.colours.orange + "</a></li>" +
              "</ul>" +
            "</li>";
        }
    };

    var templates = function(key, locale, options) {
        return tpl[key](locale, options);
    };


    var wysihtml51 = function(el, options) {
        this.el = el;
        var toolbarOpts = options || defaultOptions;
        for(var t in toolbarOpts.customTemplates) {
          tpl[t] = toolbarOpts.customTemplates[t];
        }
        this.toolbar = this.createToolbar(el, toolbarOpts);
        this.editor =  this.createEditor(options);

        window.editor = this.editor;

        $('iframe.wysihtml51-sandbox').each(function(i, el){
            $(el.contentWindow).off('focus.wysihtml51').on({
                'focus.wysihtml51' : function(){
                    $('li.dropdown').removeClass('open');
                }
            });
        });
    };

    wysihtml51.prototype = {

        constructor: wysihtml51,

        createEditor: function(options) {
            options = options || {};
            options.toolbar = this.toolbar[0];

            var editor = new wysi.Editor(this.el[0], options);

            if(options && options.events) {
                for(var eventName in options.events) {
                    editor.on(eventName, options.events[eventName]);
                }
            }
            return editor;
        },

        createToolbar: function(el, options) {
            var self = this;
            var toolbar = $("<ul/>", {
                'class' : "wysihtml51-toolbar",
                'style': "display:none"
            });
            var culture = options.locale || defaultOptions.locale || "en";
            for(var key in defaultOptions) {
                var value = false;

                if(options[key] !== undefined) {
                    if(options[key] === true) {
                        value = true;
                    }
                } else {
                    value = defaultOptions[key];
                }

                if(value === true) {
                    toolbar.append(templates(key, locale[culture], options));

                    if(key === "html") {
                        this.initHtml(toolbar);
                    }

                    if(key === "link") {
                        this.initInsertLink(toolbar);
                    }

                    if(key === "image") {
                        this.initInsertImage(toolbar);
                    }
                }
            }

            if(options.toolbar) {
                for(key in options.toolbar) {
                    toolbar.append(options.toolbar[key]);
                }
            }

            toolbar.find("a[data-wysihtml51-command='formatBlock']").click(function(e) {
                var target = e.target || e.srcElement;
                var el = $(target);
                self.toolbar.find('.current-font').text(el.html());
            });

            toolbar.find("a[data-wysihtml51-command='foreColor']").click(function(e) {
                var target = e.target || e.srcElement;
                var el = $(target);
                self.toolbar.find('.current-color').text(el.html());
            });

            this.el.before(toolbar);

            return toolbar;
        },

        initHtml: function(toolbar) {
            var changeViewSelector = "a[data-wysihtml51-action='change_view']";
            toolbar.find(changeViewSelector).click(function(e) {
                toolbar.find('a.btn').not(changeViewSelector).toggleClass('disabled');
            });
        },

        initInsertImage: function(toolbar) {
            var self = this;
            var insertImageModal = toolbar.find('.bootstrap-wysihtml51-insert-image-modal');
            var urlInput = insertImageModal.find('.bootstrap-wysihtml51-insert-image-url');
            var insertButton = insertImageModal.find('a.btn-primary');
            var initialValue = urlInput.val();

            var insertImage = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                self.editor.composer.commands.exec("insertImage", url);
            };

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertImage();
                    insertImageModal.modal('hide');
                }
            });

            insertButton.click(insertImage);

            insertImageModal.on('shown', function() {
                urlInput.focus();
            });

            insertImageModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml51-command=insertImage]').click(function() {
                var activeButton = $(this).hasClass("wysihtml51-command-active");

                if (!activeButton) {
                    insertImageModal.modal('show');
                    insertImageModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        },

        initInsertLink: function(toolbar) {
            var self = this;
            var insertLinkModal = toolbar.find('.bootstrap-wysihtml51-insert-link-modal');
            var urlInput = insertLinkModal.find('.bootstrap-wysihtml51-insert-link-url');
            var insertButton = insertLinkModal.find('a.btn-primary');
            var initialValue = urlInput.val();

            var insertLink = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                self.editor.composer.commands.exec("createLink", {
                    href: url,
                    target: "_blank",
                    rel: "nofollow"
                });
            };
            var pressedEnter = false;

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertLink();
                    insertLinkModal.modal('hide');
                }
            });

            insertButton.click(insertLink);

            insertLinkModal.on('shown', function() {
                urlInput.focus();
            });

            insertLinkModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml51-command=createLink]').click(function() {
                var activeButton = $(this).hasClass("wysihtml51-command-active");

                if (!activeButton) {
                    insertLinkModal.appendTo('body').modal('show');
                    insertLinkModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        }
    };

    // these define our public api
    var methods = {
        resetDefaults: function() {
            $.fn.wysihtml51.defaultOptions = $.extend(true, {}, $.fn.wysihtml51.defaultOptionsCache);
        },
        bypassDefaults: function(options) {
            return this.each(function () {
                var $this = $(this);
                $this.data('wysihtml51', new wysihtml51($this, options));
            });
        },
        shallowExtend: function (options) {
            var settings = $.extend({}, $.fn.wysihtml51.defaultOptions, options || {});
            var that = this;
            return methods.bypassDefaults.apply(that, [settings]);
        },
        deepExtend: function(options) {
            var settings = $.extend(true, {}, $.fn.wysihtml51.defaultOptions, options || {});
            var that = this;
            return methods.bypassDefaults.apply(that, [settings]);
        },
        init: function(options) {
            var that = this;
            return methods.shallowExtend.apply(that, [options]);
        }
    };

    $.fn.wysihtml51 = function ( method ) {
        if ( methods[method] ) {
            return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.wysihtml51' );
        }    
    };

    $.fn.wysihtml51.Constructor = wysihtml51;

    var defaultOptions = $.fn.wysihtml51.defaultOptions = {
        "font-styles": true,
        "color": false,
        "emphasis": true,
        "lists": true,
        "html": false,
        "link": true,
        "image": true,
        events: {},
        parserRules: {
            classes: {
                // (path_to_project/lib/css/wysiwyg-color.css)
                "wysiwyg-color-silver" : 1,
                "wysiwyg-color-gray" : 1,
                "wysiwyg-color-white" : 1,
                "wysiwyg-color-maroon" : 1,
                "wysiwyg-color-red" : 1,
                "wysiwyg-color-purple" : 1,
                "wysiwyg-color-fuchsia" : 1,
                "wysiwyg-color-green" : 1,
                "wysiwyg-color-lime" : 1,
                "wysiwyg-color-olive" : 1,
                "wysiwyg-color-yellow" : 1,
                "wysiwyg-color-navy" : 1,
                "wysiwyg-color-blue" : 1,
                "wysiwyg-color-teal" : 1,
                "wysiwyg-color-aqua" : 1,
                "wysiwyg-color-orange" : 1
            },
            tags: {
                "b":  {},
                "i":  {},
                "br": {},
                "ol": {},
                "ul": {},
                "li": {},
                "h1": {},
                "h2": {},
                "h3": {},
                "blockquote": {},
                "u": 1,
                "img": {
                    "check_attributes": {
                        "width": "numbers",
                        "alt": "alt",
                        "src": "url",
                        "height": "numbers"
                    }
                },
                "a":  {
                    set_attributes: {
                        target: "_blank",
                        rel:    "nofollow"
                    },
                    check_attributes: {
                        href:   "url" // important to avoid XSS
                    }
                },
                "span": 1,
                "div": 1
            }
        },
        stylesheets: ["./lib/css/wysiwyg-color.css"], // (path_to_project/lib/css/wysiwyg-color.css)
        locale: "en"
    };

    if (typeof $.fn.wysihtml51.defaultOptionsCache === 'undefined') {
        $.fn.wysihtml51.defaultOptionsCache = $.extend(true, {}, $.fn.wysihtml51.defaultOptions);
    }

    var locale = $.fn.wysihtml51.locale = {
        en: {
            font_styles: {
                normal: "Normal text",
                h1: "Heading 1",
                h2: "Heading 2",
                h3: "Heading 3"
            },
            emphasis: {
                bold: "Bold",
                italic: "Italic",
                underline: "Underline"
            },
            lists: {
                unordered: "Unordered list",
                ordered: "Ordered list",
                outdent: "Outdent",
                indent: "Indent"
            },
            link: {
                insert: "Insert link",
                cancel: "Cancel"
            },
            image: {
                insert: "Insert image",
                cancel: "Cancel"
            },
            html: {
                edit: "Edit HTML"
            },
            colours: {
                black: "Black",
                silver: "Silver",
                gray: "Grey",
                maroon: "Maroon",
                red: "Red",
                purple: "Purple",
                green: "Green",
                olive: "Olive",
                navy: "Navy",
                blue: "Blue",
                orange: "Orange"
            }
        }
    };

}(window.jQuery, window.wysihtml51);