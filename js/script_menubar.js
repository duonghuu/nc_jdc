$(document).ready(function(){
    /*=================== Dropdown Anmiation ===================*/ 
    var drop = $('nav.menu_top > ul > li > ul > li') 
    $('nav.menu_top > ul > li').each(function(){
        var delay = 0;
        $(this).find(drop).each(function(){
        $(this).css({transitionDelay: delay+'ms'});
        delay += 50;
        });
    });  
    var drop2 = $('nav.menu_top > ul > li > ul > li > ul > li') 
    $('nav.menu_top > ul > li > ul > li').each(function(){
        var delay2 = 0;
        $(this).find(drop2).each(function(){
        $(this).css({transitionDelay: delay2+'ms'});
        delay2 += 50;
        });
    }); 

    

});








