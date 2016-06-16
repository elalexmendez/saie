(function($){
    var index = 1;
    var alimentos = [];
    $btnAdd = $("#button-add");
    $table = $("#table-content");

    $btnRemove = $(".button-remove");

    $btnAdd.on("click", function(){
        var options = '';
        $.each(alimentos, function(index, val) {
            options = options + '<option value="'+val.id+'">'+val.Alimento+'</option>'
        });

        var tpl =   '<tr><td>'+ index +'</td>'+
                    '<td>'+
                        '<select required name="alimento[]" class="form-control" id="">'+options+'</select>'+
                    '</td>'+
                    '<td>'+
                        '<input required type="number" class="form-control" name="cantidad[]" value="" placeholder="">'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-danger button-remove" data-index="'+index+'"> <i class="fa fa-trash-o"></i> </button>'+
                    '</td></tr>';
        $table.append(tpl);
        index++;
    });

    $('body').on("click", '.button-remove' , function(){
        var index = $(this).data('index');
        $(this).parents('tr').remove();
    });


    /* API Client */

    $.get("/api/?action=getAlimentos", function(response){
        alimentos = response;
    }, 'json');

})(jQuery);