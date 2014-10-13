<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_341eb1a9efb7416b1e2d5fab53fdecc37bc57064305b3228187a6a727b2e0a63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  83 => 30,  79 => 29,  75 => 28,  70 => 26,  66 => 25,  50 => 15,  32 => 6,  30 => 5,  26 => 3,  24 => 2,  19 => 1,  653 => 315,  650 => 314,  644 => 44,  532 => 365,  528 => 364,  524 => 363,  520 => 362,  516 => 361,  510 => 358,  506 => 357,  502 => 356,  498 => 355,  494 => 354,  490 => 353,  486 => 352,  482 => 351,  478 => 350,  474 => 349,  470 => 348,  466 => 347,  460 => 344,  456 => 343,  452 => 342,  447 => 340,  443 => 339,  439 => 338,  433 => 335,  429 => 334,  425 => 333,  421 => 332,  410 => 324,  400 => 316,  398 => 314,  323 => 242,  254 => 176,  116 => 44,  111 => 42,  106 => 40,  96 => 36,  92 => 35,  86 => 32,  80 => 29,  76 => 28,  72 => 27,  67 => 25,  63 => 24,  53 => 20,  45 => 18,  41 => 17,  37 => 16,  21 => 2,  177 => 68,  166 => 64,  162 => 63,  158 => 62,  152 => 58,  146 => 56,  140 => 54,  138 => 53,  134 => 59,  127 => 50,  121 => 49,  115 => 48,  109 => 47,  105 => 46,  102 => 39,  98 => 44,  73 => 22,  62 => 24,  59 => 23,  49 => 19,  46 => 14,  42 => 12,  39 => 6,  36 => 5,  29 => 3,);
    }
}
