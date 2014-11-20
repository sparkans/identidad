$.fn.nextOrFirst = function(selector) {
    var next = this.next(selector);
    return (next.length) ? next : this.prevAll(selector).last();
}

$(function() {
    $('.fadein div:eq(0)').addClass("active");
    $('.fadein div:gt(0)').hide("slow");
    setInterval(function() {
        $('.active:eq(0)').fadeOut("slow").removeClass("active").nextOrFirst('div').addClass("active").fadeIn("slow").end()
    }, 4000);   
});    

//lside imagen 2
$.fn.nextOrFirstOne = function(selector1) {
    var next = this.next(selector1);
    return (next.length) ? next : this.prevAll(selector1).last();
}

$(function() {
    $('.fadeinuno div:eq(0)').addClass("activeuno");
    $('.fadeinuno div:gt(0)').hide("slow");
    setInterval(function() {
        $('.activeuno:eq(0)').fadeOut("slow").removeClass("activeuno").nextOrFirstOne('div').addClass("activeuno").fadeIn("slow").end()
    }, 4000);
});


//slide imagen 3 
$.fn.nextOrFirstDos = function(selector2) {
    var next = this.next(selector2);
    return (next.length) ? next : this.prevAll(selector2).last();
}

$(function() {
    $('.fadeindos div:eq(0)').addClass("activedos");
    $('.fadeindos div:gt(0)').hide("slow");
    setInterval(function() {
        $('.activedos:eq(0)').fadeOut("slow").removeClass("activedos").nextOrFirstOne('div').addClass("activedos").fadeIn("slow").end()
    }, 4000);
});


//slide Imagen 4
$.fn.nextOrFirstTres = function(selector3) {
    var next = this.next(selector3);
    return (next.length) ? next : this.prevAll(selector3).last();
}

$(function() {
    $('.fadeintres div:eq(0)').addClass("activetres");
    $('.fadeintres div:gt(0)').hide("slow");
    setInterval(function() {
        $('.activetres:eq(0)').fadeOut("slow").removeClass("activetres").nextOrFirstOne('div').addClass("activetres").fadeIn("slow").end()
    }, 4000);
});