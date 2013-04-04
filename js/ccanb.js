/// <reference path="jquery-1.8.3-vsdoc.js" />


$.extend({
    getUrlVars: function(){
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },
    getUrlVar: function(name){
        return $.getUrlVars()[name];
    }
});


function resetMenuItemPositionForIE7() {
    // Additional action for IE7 because the PIE decoration moves the menu item out of boundary when hover 
    if ($.browser.msie && $.browser.version == "7.0") {
        $("a", this).css("padding-left", "26px");
    }
}

function getPageContent(lang, url, id) {
    var neutralFileName = url.substring(0, url.lastIndexOf("."));
    var extension = url.substring(url.lastIndexOf("."));

    //alert(neutralFileName);
    //alert(extension);

    $.ajax({
        url: neutralFileName + "_" + lang + extension,
        cache: false
    }).done(function (html) {
        $("#"+id).html(html);
    });
}

$(document).ready(function () {
    $("#menu>ul>li>ul>li:first-child").hover(
        resetMenuItemPositionForIE7,
        resetMenuItemPositionForIE7
    ).attr("title", "first");

    $("#menu>ul>li>ul>li:last-child").hover(
        resetMenuItemPositionForIE7,
        resetMenuItemPositionForIE7
    ).attr("title", "last");

    // If an event gets to the body
    $("body").click(function () {
        $("#menu>ul>li>ul").hide();
        $("#menu>ul>li>a").removeClass();

        $("#menu>ul>li>ul>li>ul").hide();
        $("#menu>ul>li>ul>li>a").removeClass();
    });

    // Add toggle event for second level menu
    $("#menu>ul>li>a>span").click(function (e) {

        e.stopPropagation();
        var hidden = $(this).parents("li").children("ul").is(":hidden");

        $("#menu>ul>li>ul").hide();
        $("#menu>ul>li>a").removeClass();

        $("#menu>ul>li>ul>li>ul").hide();
        $("#menu>ul>li>ul>li>a").removeClass();

        if (hidden) {
            $(this)
                .parents("li").children("ul").toggle()
                .parents("li").children("a").addClass("menuCur");
        }
    });

    // Add toggle event for third level menu
    $("#menu li li:has(a[href='#'])").hover(function (e) {
        $("#menu>ul>li>ul>li>ul").hide();
        $("#menu>ul>li>ul>li>a").removeClass();
        $(this)
            .children("ul").toggle()
            .children("a").addClass("menuCur");
    }).click(function (e) {
        e.stopPropagation();
    });

    $('#menu a[href!="#"]').click(function (e) {
        var url = $(this).attr('href');
        var lang = $("#language-text").val();

        e.preventDefault();
        //alert(url);
        //alert(lang);

        var hostname = window.location.href.substring(0, window.location.href.indexOf("?"));
        window.location.replace(hostname + "?path=" + url + "&lang=" + lang);
        //alert(hostname + "?path=" + url + "&lang=" + lang);
    });

    // load page for the first time
    var lang = $.getUrlVar('lang');
        //$("#language-text").val();
    var url = $.getUrlVar('path');
    alert(url);
    alert(lang);

    if (url && lang) {
        alert('true');
        getPageContent(lang, url, "content");
    }
    else if (url) {
        alert('only url');
    }

    //if (pathname.lastIndexOf("/") == pathname.length - 1) {
    //    //getPageContent(lang, "home/welcome.html", "content");
    //}
    //else {
    //    alert(url);
    //    //getPageContent(lang, url, "content");
    //}

    // Add the value of "Search..." to the input field and a class of .empty
    $("#search-text").val("Search...").addClass("empty");

    // When you click on #search
    $("#search-text").focus(function () {

        // If the value is equal to "Search..."
        if ($(this).val() == "Search...") {
            // remove all the text and the class of .empty
            $(this).val("").removeClass("empty");;
        }

    });

    // When the focus on #search is lost
    $("#search-text").blur(function () {

        // If the input field is empty
        if ($(this).val() == "") {
            // Add the text "Search..." and a class of .empty
            $(this).val("Search...").addClass("empty");
        }

    });
});