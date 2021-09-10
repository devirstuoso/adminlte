$(function(){
    $('#modalButton').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });

    $('#modal').on('hidden.bs.modal', function (e) { 
            for(e in tinyMCE.editors){
            tinyMCE.editors[e].destroy();
            }
        });


     $('.modalUpdateButton').click(function(){
        $('#modalUpdate').modal('show')
        .find('#modalUpdateContent')
        .load($(this).attr('value'));
    });

    $('#modalUpdate').on('hidden.bs.modal', function (e) { 
        for(e in tinyMCE.editors){
        tinyMCE.editors[e].destroy();
        }
    });


});





