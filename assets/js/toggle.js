$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".cod-dropdown").not(targetBox).hide();
        $(targetBox).show();
    });
});

$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".atm-dropdown").not(targetBox).hide();
        $(targetBox).show();
    });
});