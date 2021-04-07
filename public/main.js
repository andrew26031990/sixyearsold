function changeLang(lang, user_id){
    $.ajax({
        url: '/langChange',
        type: 'GET',
        data: { user_id: user_id, lang: lang },
        success: function(response)
        {
            window.location = '/locale/' + response;
        }
    });
}

$(document).ready(function (){
    $('.select2').select2();
})
