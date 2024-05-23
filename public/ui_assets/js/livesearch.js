$('.search_input').hide();
$('.bg_sc_bl').css('display', 'none');
$('.search__close').hide();

// function placeholder_randomize() {
//     var fonts = ['Times New Roman', 'Arial', 'Tahoma'];
//     var time = setInterval(function() {
//         var newFont = fonts[Math.floor(Math.random()*fonts.length)];
//         $('#appendedInputButton').attr('placeholder', newFont);
//     },10000);
// }

$('.search__home').click(function(){
    $('.search_input').show();
    $('.bg_sc_bl').fadeIn(500);
    $('.search_input input').focus();
    $('.search__home').hide();
    $('.search__close').show();
    $('body').css('overflow', 'hidden');
});

$('.search__close').click(function(){
    $('.search_input').hide();
    $('.bg_sc_bl').fadeOut(500);
    $(".search_input input:text").val("").trigger("input");
    $('.search__close').hide();
    $('.search__home').show();
    $('body').css('overflow', 'show');
});


$(document).mouseup(function(e){
    var container = $(".search_input");
    var bg = $(".bg_sc_bl");

    if(!container.is(e.target) && container.has(e.target).length === 0){
        container.hide();
        bg.fadeOut(500);
        $(".search_input input:text").val("").trigger("input");
        $('.search__close').hide();
        $('.search__home').show();
        $('body').css('overflow', 'show');
}

$(".search_input").each(function() {

    var $inp = $(this).find("input:text"),
        $cle = $(this).find(".ico_clear");

    $inp.on("input", function(){
        $cle.toggle(!!this.value);
    });
    
    $cle.on("touchstart click", function(e) {
        e.preventDefault();
        $inp.val('').trigger("input");
        $('.search_input input').focus();
    });

});

});

// submit input with js keyup
$('#keyword').on('keyup', function(e) {
    var keyword = document.getElementById('keyword').value;
    if(e.key === 'Enter' || e.keyCode === 13){
        document.location.href = '/search?q='+keyword;
    }
})

// submit search bar for responsive
$('#keyword_rp').on('keyup', function(e) {
    var keyword = document.getElementById('keyword_rp').value;
    if(e.key === 'Enter' || e.keyCode === 13){
        document.location.href = '/search?q='+keyword;
    }
})

// ajax search
var keyword = document.getElementById("keyword");
var box_table = document.getElementById("rc_sc");

keyword.addEventListener('keyup',function(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            if(keyword.value == ''){
                box_table.style.display = 'none';
            }else{
                box_table.style.display = 'block';
                box_table.innerHTML = xhr.responseText;
            }
        }
    }
    
    xhr.open('GET', '/spotlight?q=' + keyword.value.replace(/[^a-zA-Z0-9 ]/g, "") , true);
    xhr.send();
});