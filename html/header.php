<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?//todo-Egor dynamic title?>Научный журнал Juvenis scientia - Главная</title>
    <meta name="description"
          content="Научный журнал. Публикация статей студентов, аспирантов и молодых ученых в области точных, естественных и гуманитарных наук.">
    <meta name="keywords" content="опубликовать научную статью, публикация аспирантов, научный журнал, публикация РИНЦ">
    <link href="/images/ico.ico" rel="shortcut icon" type="image/x-icon">
    <link href="/css/28.07.css" rel="stylesheet">
    <link href="/css/static.css" rel="stylesheet">
    <link href="/css/<?= $containerStyle ?>.css" rel="stylesheet">
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/wb.lazyload.min.js"></script>
    <script src="/js/searchindex.js"></script>
    <script>
        var features = 'toolbar=no,menubar=no,location=no,scrollbars=yes,resizable=yes,status=yes,left=,top=,width=,height=';
        var searchDatabase = new SearchDatabase();
        var searchResults_length = 0;
        var searchResults = new Object();
        function searchPage(features) {
            var element = document.getElementById('SiteSearch1');
            if (element.value.length != 0 || element.value != " ") {
                var value = unescape(element.value);
                var keywords = value.split(" ");
                searchResults_length = 0;
                for (var i = 0; i < database_length; i++) {
                    var matches = 0;
                    var words = searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords;
                    for (var j = 0; j < keywords.length; j++) {
                        var pattern = new RegExp(keywords[j], "i");
                        var result = words.search(pattern);
                        if (result >= 0) {
                            matches++;
                        }
                        else {
                            matches = 0;
                        }
                    }
                    if (matches == keywords.length) {
                        searchResults[searchResults_length++] = searchDatabase[i];
                    }
                }
                var wndResults = window.open('about:blank', '', features);
                setTimeout(function () {
                    var results = '';
                    var html = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=Windows-1251"><meta http-equiv="Content-Language" content="ru"><title>Search results<\/title><\/head>';
                    html = html + '<body style="background-color:#FFFFFF;margin:0;padding:2px 2px 2px 2px;">';
                    html = html + '<span style="font-family:Tahoma;font-size:13px;color:#000000">';
                    for (var n = 0; n < searchResults_length; n++) {
                        var page_keywords = searchResults[n].keywords;
                        results = results + '<strong><a style="color:#00A0E4" target="_parent" href="' + searchResults[n].url + '">' + searchResults[n].title + '<\/a><\/strong><br>Описание: ' + searchResults[n].description + '<br>Ключевые слова: ' + page_keywords + '<br><br>\n';
                    }
                    if (searchResults_length == 0) {
                        results = 'Нет результатов';
                    }
                    else {
                        html = html + searchResults_length;
                        html = html + 'Результаты поиска: ';
                        html = html + value;
                        html = html + '<br><br>';
                    }
                    html = html + results;
                    html = html + '<\/span>';
                    html = html + '<\/body><\/html>';
                    wndResults.document.write(html);
                }, 100);
            }
            return false;
        }
        function searchParseURL() {
            var url = decodeURIComponent(window.location.href);
            if (url.indexOf('?') > 0) {
                var terms = '';
                var params = url.split('?');
                var values = params[1].split('&');
                for (var i = 0; i < values.length; i++) {
                    var param = values[i].split('=');
                    if (param[0] == 'q') {
                        terms = unescape(param[1]);
                        break;
                    }
                }
                if (terms != '') {
                    var element = document.getElementById('SiteSearch1');
                    element.value = terms;
                    searchPage('');
                }
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#Blog1').each(function () {
                var currentPage = 0;
                var numPerPage = 3;
                var $blog = $(this);
                var repaginate = function () {
                    $blog.find('.blogitem').hide()
                        .slice(currentPage * numPerPage, (currentPage + 1) * numPerPage)
                        .show();
                };
                var numRows = $blog.find('.blogitem').length;
                var numPages = Math.ceil(numRows / numPerPage);
                var $pager = $('<div class="pager"></div>');
                for (var page = 0; page < numPages; page++) {
                    $('<span class="page-number"></span>').text(page + 1)
                        .bind('click', {newPage: page}, function (event) {
                            currentPage = event.data['newPage'];
                            repaginate();
                            $(this).addClass('active').siblings().removeClass('active');
                        }).appendTo($pager).addClass('clickable');
                }
                $pager.prependTo($blog).find('span.page-number:first').addClass('active');
                repaginate();
            });
            searchParseURL();
            var $autocomplete = $('<ul class="autocomplete"></ul>').hide().insertAfter('#SiteSearch1');
            var selectedItem = null;
            var setSelectedItem = function (item) {
                selectedItem = item;
                if (selectedItem === null) {
                    $autocomplete.hide();
                    return;
                }
                if (selectedItem < 0) {
                    selectedItem = 0;
                }
                if (selectedItem >= $autocomplete.find('li').length) {
                    selectedItem = $autocomplete.find('li').length - 1;
                }
                $autocomplete.find('li').removeClass('selected').eq(selectedItem).addClass('selected');
                $autocomplete.css('left', $('#SiteSearch1').position().left);
                $autocomplete.css('top', $('#SiteSearch1').position().top + $('#SiteSearch1').outerHeight());
                $autocomplete.show();
            };
            var populateSearchField = function () {
                $('#SiteSearch1').val($autocomplete.find('li').eq(selectedItem).text());
                setSelectedItem(null);
            };
            $('#SiteSearch1').attr('autocomplete', 'off').keyup(function (event) {
                if (event.keyCode > 40 || event.keyCode == 8) {
                    var data = new Array();
                    var keywordVal = $('#SiteSearch1').val();
                    keywordVal = keywordVal.toLowerCase();
                    for (i = 0; i < database_length; i++) {
                        var words = (searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords).toLowerCase();
                        var array = words.split(" ");
                        data = $.merge(data, array);
                    }

                    var unique = new Array();
                    o:for (var i = 0; i < data.length; i++) {
                        for (var j = 0; j < unique.length; j++) {
                            if (unique[j] == data[i]) continue o;
                        }
                        unique[unique.length] = data[i];
                    }

                    unique.sort();
                    if (keywordVal.length && unique.length) {
                        $autocomplete.empty();
                        var item = 0;
                        $.each(unique, function (index, term) {
                            term = term.toLowerCase();
                            if (term.indexOf(keywordVal) == 0) {
                                $('<li></li>').text(term).data('item', item).appendTo($autocomplete).mouseover(function () {
                                    var item = $(this).data('item');
                                    setSelectedItem(item);
                                }).click(populateSearchField);
                                item++;
                            }
                        });
                        setSelectedItem(0);
                    }
                    else {
                        setSelectedItem(null);
                    }
                }
                else if (event.keyCode == 38 && selectedItem !== null) {
                    setSelectedItem(selectedItem - 1);
                    event.preventDefault();
                }
                else if (event.keyCode == 40 && selectedItem !== null) {
                    setSelectedItem(selectedItem + 1);
                    event.preventDefault();
                }
                else if (event.keyCode == 27 && selectedItem !== null) {
                    setSelectedItem(null);
                }
            }).keypress(function (event) {
                if (event.keyCode == 13 && selectedItem !== null) {
                    populateSearchField();
                    event.preventDefault();
                }
            }).blur(function (event) {
                setTimeout(function () {
                    setSelectedItem(null);
                }, 250);
            });
            $('img[data-src]').lazyload();
        });
    </script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-49084421-5', 'auto');
        ga('send', 'pageview');

    </script>

    <!-- Yandex.Metrika counter -->
    <script>
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter31965626 = new Ya.Metrika({
                        id: 31965626,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true
                    });
                } catch (e) {
                }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/31965626" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<div id="container">