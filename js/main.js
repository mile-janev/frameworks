$(document).ready(function(){
    
    $("#mainMenu li").hover(
        function(){
            $(this).children(".subMenu").show();
        },
        function(){
            $(this).children(".subMenu").hide();
        }
    )
    
    $(".linkDisabled").click(function(e){
        e.preventDefault();
    })
    
})