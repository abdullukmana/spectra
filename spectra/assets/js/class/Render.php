<script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/2.1.0/showdown.min.js" integrity="sha512-LhccdVNGe2QMEfI3x4DVV3ckMRe36TfydKss6mJpdHjNFiV07dFpS2xzeZedptKZrwxfICJpez09iNioiSZ3hA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
class Render {
    constructor(
        target,
        {
            removeParent        = false,
            customizations      = false,
            template            = [],
            configShowdown      = {}
        } = {}
    ) {
        if (Render.instance) {
            return Render.instance;
        }
        Render.instance = this;

        this.configShowdown         = {};
        this.convertedElements      = [];
        this.promise                = Promise.resolve();
        this.converter              = null;
        this.elements               = null;
        this.defaultConfig          = {
            tables: true,
            tablesHeaderId: true,
            simpleLineBreaks: true,
        };
        this.template               = template;
        this.removeParent           = removeParent;
        this.customizations         = customizations;

        if (typeof target === 'string') {
            this.elements = document.querySelectorAll(target);
        } else if (target instanceof HTMLElement) {
            this.elements = [target];
        } else if (target instanceof NodeList) {
            this.elements = Array.from(target);
        } else {
            throw new Error('Parameter harus berupa selector, elemen HTML, atau NodeList.');
        }

        this.configShowdown = Object.keys(configShowdown).length === 0
            ? this.defaultConfig
            : configShowdown;
    }

    applyMarkdown() {
        this.promise = this.promise.then(() => {
            return new Promise((resolve, reject) => {
                try {
                    this.converter = new showdown.Converter(this.configShowdown);
                    console.log(showdown.getDefaultOptions());
                    this.elements.forEach(element => {
                        var cleanedText     = this.cleanContent(element.textContent);
                        var html            = this.converter.makeHtml(cleanedText);
                        element.innerHTML   = html;

                        if(this.customizations) {
                            this.applyCustomizations(element);
                        }
                    });
                    resolve();
                } catch (error) {
                    reject(error)
                }
            })
        })
    }

    applyCustomizations(element) {
        this.template.forEach(temp => {
            element.querySelectorAll(temp.selector).forEach(element => {
                const data = element.textContent.trim();
                const newElement = temp.element({data, element});
                if (newElement) {
                    element.outerHTML = newElement;
                }
            });
        });
    }    

    cleanContent(content) {
        const assign = Object.assign || function (obj1, obj2) {
            for (var name in obj2) {
                if (obj2.hasOwnProperty(name))
                    obj1[name] = obj2[name];
            }
            return obj1;
        };
    
        function toCamelCase(value) {
            return value.replace(/-(\w)/g, function(match, firstChar) {
                return firstChar.toUpperCase();
            });
        }
    
        function tabLen(str) {
            var res = 0;
            for (var i = 0; i < str.length; ++i) {
                if (str.charCodeAt(i) === '\t'.charCodeAt(0))
                    res += 3;
            }
            return str.length + res;
        }
    
        var NormalizeWhitespace = function(defaults) {
            this.defaults = assign({}, defaults);
        };
    
        NormalizeWhitespace.prototype = {
            setDefaults: function (defaults) {
                this.defaults = assign(this.defaults, defaults);
            },
            normalize: function (input, settings) {
                settings = assign(this.defaults, settings);
    
                for (var name in settings) {
                    var methodName = toCamelCase(name);
                    if (name !== "normalize" && methodName !== 'setDefaults' &&
                            settings[name] && this[methodName]) {
                        input = this[methodName].call(this, input, settings[name]);
                    }
                }
    
                return input;
            },
    
            leftTrim: function (input) {
                return input.replace(/^\s+/, '');
            },
            rightTrim: function (input) {
                return input.replace(/\s+$/, '');
            },
            tabsToSpaces: function (input, spaces) {
                spaces = spaces|0 || 4;
                return input.replace(/\t/g, new Array(++spaces).join(' '));
            },
            spacesToTabs: function (input, spaces) {
                spaces = spaces|0 || 4;
                return input.replace(RegExp(' {' + spaces + '}', 'g'), '\t');
            },
            removeTrailing: function (input) {
                return input.replace(/\s*?$/gm, '');
            },
            removeInitialLineFeed: function (input) {
                return input.replace(/^(?:\r?\n|\r)/, '');
            },
            removeIndent: function (input) {
                var indents = input.match(/^[^\S\n\r]*(?=\S)/gm);
    
                if (!indents || !indents[0].length)
                    return input;
    
                indents.sort(function(a, b){return a.length - b.length; });
    
                if (!indents[0].length)
                    return input;
    
                return input.replace(RegExp('^' + indents[0], 'gm'), '');
            },
            indent: function (input, tabs) {
                return input.replace(/^[^\S\n\r]*(?=\S)/gm, new Array(++tabs).join('\t') + '$&');
            },
            breakLines: function (input, characters) {
                characters = (characters === true) ? 80 : characters|0 || 80;
    
                var lines = input.split('\n');
                for (var i = 0; i < lines.length; ++i) {
                    if (tabLen(lines[i]) <= characters)
                        continue;
    
                    var line = lines[i].split(/(\s+)/g),
                        len = 0;
    
                    for (var j = 0; j < line.length; ++j) {
                        var tl = tabLen(line[j]);
                        len += tl;
                        if (len > characters) {
                            line[j] = '\n' + line[j];
                            len = tl;
                        }
                    }
                    lines[i] = line.join('');
                }
                return lines.join('\n');
            }
        };
    
        var normalizer = new NormalizeWhitespace({
            'remove-trailing': true,
            'remove-indent': true,
            'left-trim': true,
            'right-trim': true,
        });
    
        return normalizer.normalize(content, {});
    }
}
</script>