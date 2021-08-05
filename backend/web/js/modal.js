$(function(){
    $('#modalButton').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));

    });


    // $('#modal').on('show.bs.modal', function(){
    //         alert('dev');
    // })


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

    $('#modalUpdate').on('hidden.bs.modal', function (e) { for(e in tinyMCE.editors){
        tinyMCE.editors[e].destroy();
 }});

// $('#modalButton').on(
//     'hidden.bs.modal',
//     function() {
//         tinymce.EditorManager.execCommand('mceRemoveEditor', true,
//                 '#homeslider-slider_description_text');
//         setTimeout(function() {
//             tinymce.EditorManager.execCommand('mceAddEditor', true,
//                     '#homeslider-slider_description_text');
//         }, 30);

//     });

});





