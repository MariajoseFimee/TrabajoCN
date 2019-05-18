$(document).ready(function(){


    $("#recargar").click(function(event){

        event.preventDefault();
        $.ajax({
            url: "obtenertodo.php",
            data: {},
            dataType: 'json',
            success: function(data)
            {
                var str = "";
                $.each(data, function(i, item){
                    str += '<div class="alert alert-primary" role="alert">' +
                              item.nombre + ', <a href="editar.php?nombre=' + encodeURIComponent(item.nombre) + '&id='+ item.clientes_id + '" class="alert-link">edit</a>' +
                              ', <a href="#" id="'+ item.clientes_id + '" class="alert-link delete-link">delete</a>' +
                        '</div>';
                });
                $("#obtenertodo").html(str);
            }
        });
    });


/*    $.ajax({
        url: "obtenertodo.php",
        data: {},
        dataType: 'json',
        success: function(data)
        {
            var str = "";
            $.each(data, function(i, item){
                str += '<div class="alert alert-primary" role="alert">' +
                          item.nombre + ', <a href="editar.php?nombre=' + encodeURIComponent(item.nombre) + '&id='+ item.clientes_id + '" class="alert-link">edit</a>' +
                          ', <button  id="eliminar" value="'+ item.clientes_id + '" class="alert-link btn-link" >delete</button>' +
                    '</div>';
            });
            $("#obtenertodo").html(str);
        }
    });*/


    $(function(){
        $(document).on('click', '.delete-link',function(){
            var id=$(this).attr('id');
            $.ajax({
                type: "POST",
                url: "eliminar.php",
                data: {'id':id},
                success: function(data)
                {
                    $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
                    $("#recargar").trigger("click");
                }
            });

        });
    });

    $("#formulario").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "insertar.php",
            data: $("#formulario").serialize(),
            success: function(data)
            {
                $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
                $("#recargar").trigger("click");
            }
        });
    });

    $("#editarnombre").submit(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "actualizar.php",
            data: $("#editarnombre").serialize(),
            success: function(data)
            {
                $("#respuesta").show(3000).html(data).delay(2000).fadeOut(1000);
            }
        });
    });
});