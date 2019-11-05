/*
*  Function responsible for disabling the Index number text box and clearing input that user could insert
*  in the there before role swap. This function improves user experience, if you are changing the role of the user,
*  so there will not be any confusion whether the lecturer also has to input index number, that they do not have.
*/
var radioValue = $("input[name='role']:checked").val();
if (radioValue=='lecturer') {
    $("#index").prop("disabled","disabled");
}
$('input:radio').click(function() {
    if($(this).hasClass('enable_tb')) {
        $("#index").prop("disabled","");
    }
    else {
        $("#index").val("");
        $("#index").prop("disabled","disabled");
    }
});
