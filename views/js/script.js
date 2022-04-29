$("#email").change(function(){

    $(".alert").remove();
    var email = $(this).val();

    var datos = new FormData();
    //construyendo variable post
    datos.append("validarEmail", email);

    $.ajax({

        url:"ajax/form.ajax.php",
        method:"POST",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
            
            if(respuesta){

             $("#email").val("");
             $("#email").parent().after(`
             <div class="alert alert-warning">

             <b>ERROR:</b>

             El correo ya existe, por favor ingrese otro diferente
             
             </div>
             `);
            }
        }
    });
});