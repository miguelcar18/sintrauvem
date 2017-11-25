$.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}
function decision(message, url){
    if(confirm(message)) location.href = url;
}
function confirmSubmit(form, message) { 
    var agree=confirm(message); 
    if (agree) {
        form.submit();
        return false; //de todas formas el link no se ejecutara
    } else {
        return false;
    } 
}

function eliminarFila(fila){ fila.parentNode.parentNode.remove(); }

function agregarValor(){
    var tabla           = document.getElementById("tablaCargaFamiliar").tBodies[0];
    var nombreRelacion  = document.getElementById("nombreRelacion").value;
    var relacion        = document.getElementById("relacion").value;
    var combo           = document.getElementById("relacion");
    var selected        = combo.options[combo.selectedIndex].text;

    if(relacion == ""){
        alert("Seleccione el tipo de relacion");
    }
    else if(nombreRelacion == ""){
        alert("Ingrese un nombre");
    }
    else{
        var fila = tabla.insertRow(-1);
        var celda0 = fila.insertCell(0);
        var celda1 = fila.insertCell(1);
        var celda2 = fila.insertCell(2);

        celda0.innerHTML = '<input type="hidden" name="nombreA[]" id="nombreA[]" value="'+nombreRelacion+'" />'+nombreRelacion;
        celda1.innerHTML = '<input type="hidden" name="relacionA[]" id="relacionA[]" value="'+relacion+'" />'+selected;
        celda2.innerHTML = '<button type="button" onclick="eliminarFila(this)" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>';
        $('#relacion').val('');
        document.getElementById("nombreRelacion").value = "";
    }
}

function agregarDisciplina(){
    var tabla           = document.getElementById("tablaDisciplinas").tBodies[0];
    var idDisciplina    = document.getElementById("disciplina").value;
    var combo           = document.getElementById("disciplina");
    var selected        = combo.options[combo.selectedIndex].text;

    if(idDisciplina == ""){
        alert("Seleccione una disciplina");
    }
    else{
        var fila = tabla.insertRow(-1);
        var celda0 = fila.insertCell(0);
        var celda1 = fila.insertCell(1);

        celda0.innerHTML = '<input type="hidden" name="disciplinaA[]" id="disciplinaA[]" value="'+idDisciplina+'" />'+selected;
        celda1.innerHTML = '<button type="button" onclick="eliminarFila(this)" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>';
        $('#disciplina').val('');
    }
}

$(function() {

    // Basic datatable
    var tablaData = $('.datatable-basic').DataTable({
        destroy: true,
        language: {
            search: '<span>Filtrar:</span> _INPUT_',
            lengthMenu: '<span>Mostrar:</span> _MENU_',
            paginate: {'first': 'Primero', 'last': 'Último', 'next': 'Siguiente &rarr;', 'previous': '&larr; Anterior'},
            emptyTable:"No hay datos disponibles en la tabla",
            info:"Mostrando _START_ a _END_ de _TOTAL_ entradas",
            infoEmpty:"Mostrando 0 a 0 de 0 entradas",
            infoFiltered:"(filtrado de _MAX_ entradas totales)",
            infoPostFix:"",
            decimal:"",
            thousands:",",
            lengthMenu:"Mostrar _MENU_ entradas",
            loadingRecords:"Cargando...",
            processing:"Procesando...",
            search:"Buscar:",
            searchPlaceholder:"",
            url:"",
            zeroRecords:"No se encontraron registros coincidentes"
        }
    });

	// Style checkboxes and radios
	$('.styled').uniform();

    // Single picker
    $('.daterange-single').datepicker({ 
        format: 'dd/mm/yyyy'
    });

    // Setup validation
    $("#form_user").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            name: {
                required: true
            },
            cedula: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
            rol: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Ingrese nombre y apellido'
            },
            cedula: {
                required: 'Ingrese un número de cédula'
            },
            username: {
                required: 'Ingrese un nombre de usuario'
            },
            email: {
                required: 'Ingrese un email',
                email: 'Ingrese un email válido'
            },
            password: {
                required: "Ingrese su contraseña",
                minlength: jQuery.validator.format("Debe ingresar al menos {0} caracteres")
            },
            password_confirmation: {
                required: 'Repita la contraseña',
                equalTo: 'Las contraseñas deben de ser iguales'
            },
            rol: {
                required: 'Seleccione un cargo'
            }
        },
        submitHandler: function () {
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#form_user")[0]);
            $.ajax({
                url:  $("form#form_user").attr('action'),
                type: $("form#form_user").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("button#usuarioSubmit").addClass('disabled');
                    $("a.btn-link").addClass('disabled');
                },
                success:function(respuesta){
                    new PNotify({
                        title: 'Realizado',
                        text: 'Usuario registrado satisfactoriamente.',
                        addclass: 'bg-success alert-styled-right',
                        type: 'success'
                    });

                    $('form#form_user').reset();
                    $(document).find('.validation-valid-label').remove();
                    $("button#usuarioSubmit").removeClass('disabled');
                    $("a.btn-link").removeClass('disabled');
                }
            })
            return false;
        }
    });

    $("#passwordForm").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            password_actual: {
                required: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password_actual: {
                required: 'Ingrese su contraseña actual'
            },
            password: {
                required: "Ingrese su nueva contraseña",
                minlength: jQuery.validator.format("Debe ingresar al menos {0} caracteres")
            },
            password_confirmation: {
                required: 'Repita la nueva contraseña',
                equalTo: 'Las contraseñas deben de ser iguales'
            }
        },
        submitHandler: function () {
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#passwordForm")[0]);
            $.ajax({
                url:  $("form#passwordForm").attr('action'),
                type: $("form#passwordForm").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("button#passwordSubmit").addClass('disabled');
                    $("button#cancelar").addClass('disabled');
                },
                success:function(respuesta){
                    if(respuesta.message == "correcto")
                    {
                        new PNotify({
                            title: 'Realizado',
                            text: 'Contraseña actualizada satisfactoriamente.',
                            addclass: 'bg-success alert-styled-right',
                            type: 'success'
                        });

                        $('form#passwordForm').reset();
                        $(document).find('.validation-valid-label').remove();
                        $("button#passwordSubmit").removeClass('disabled');
                        $("button#cancelar").removeClass('disabled');
                    }
                    else if(respuesta.message == "error")
                    {
                        new PNotify({
                            title: 'Error',
                            text: 'La contraseña acutal ingresada es incorrecta.',
                            addclass: 'bg-danger alert-styled-right',
                            type: 'error'
                        });
                        $("button#passwordSubmit").removeClass('disabled');
                        $("button#cancelar").removeClass('disabled');
                    }
                }
            })
            return false;
        }
    });

    $("#afiliadoForm").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            nombre: {
                required: true
            },
            apellido: {
                required: true
            },
            cedula: {
                required: true,
                number: true
            },
            sexo: {
                required: true
            },
            fechaNacimiento: {
                required: true
            },
            edad: {
                required: true,
                number: true
            },
            telefonoMovil: {
                required: true,
                number: true
            },
            telefonoCasa: {
                required: true,
                number: true
            },
            correo: {
                required: true,
                email: true
            },
            cargo: {
                required: true
            },
            fechaIngreso: {
                required: true
            },
            aniosServicio: {
                required: true,
                number: true
            },
            status: {
                required: true
            },
            dependencia: {
                required: true
            },
            fechaAfiliacion: {
                required: true
            },
            cotizaUdo: {
                required: true
            },
            disciplina: {
                required: true
            }
        },
        messages: {
            nombre: {
                required: 'Ingrese un nombre'
            },
            apellido: {
                required: "Ingrese un apellido"
            },
            cedula: {
                required: 'Ingrese un número de cédula',
                number: 'Ingrese solo números'
            },
            sexo: {
                required: "Seleccione un género"
            },
            fechaNacimiento: {
                required: 'Ingrese la fecha de nacimiento'
            },
            edad: {
                required: 'Ingrese la edad',
                number: 'Ingrese solo números'
            },
            telefonoMovil: {
                required: 'Ingrese un número de teléfono',
                number: 'Ingrese solo números'
            },
            telefonoCasa: {
                required: 'Ingrese un número de teléfono',
                number: 'Ingrese solo números'
            },
            correo: {
                required: 'Ingrese un correo',
                email: 'Tngrese un correo válido'
            },
            cargo: {
                required: "Seleccione un cargo"
            },
            fechaIngreso: {
                required: 'Ingrese la fecha de ingreso'
            },
            aniosServicio: {
                required: 'Ingrese la cantidad de años de servicio',
                number: 'Ingrese solo números'
            },
            status: {
                required: "Seleccione un estado"
            },
            dependencia: {
                required: "Seleccione una dependencia"
            },
            fechaAfiliacion: {
                required: "Ingrese la fecha de afiliación"
            },
            cotizaUdo: {
                required: "Seleccione una opción"
            },
            disciplina: {
                required: "Seleccione una disciplina"
            }
        },
        submitHandler: function () {
            var accion = '';
            if($("button#afiliadoSubmit").attr('data') == 1)
                accion = 'agregado';
            else if($("button#afiliadoSubmit").attr('data') == 0)
                accion = 'actualizado';
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#afiliadoForm")[0]);
            $.ajax({
                url:  $("form#afiliadoForm").attr('action'),
                type: $("form#afiliadoForm").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("button#afiliadoSubmit").addClass('disabled');
                    $("button#cancelar").addClass('disabled');
                },
                success:function(respuesta){
                    var alertMessage = '';
                    var count = 0;
                    if(respuesta.validations == false){
                        $.each(respuesta.errors, function(index, value){
                            count++;
                            alertMessage+= count+". "+value+"<br>";
                        });
                        new PNotify({
                            title: 'Alerta',
                            text: alertMessage,
                            addclass: 'bg-primary alert-styled-right',
                            type: 'info'
                        });
                    }
                    else if(respuesta.validations == true){
                        new PNotify({
                            title: 'Realizado',
                            text: 'Afiliado '+accion+' satisfactoriamente.',
                            addclass: 'bg-success alert-styled-right',
                            type: 'success'
                        });
                        console.log("se ejecuta la validation true");
                        if($("button#afiliadoSubmit").attr('data') == 1){
                            console.log("se ejecuta el data = 1");
                            $('form#afiliadoForm').reset();
                            $("#tablaCargaFamiliar tbody > tr").remove();
                            $(document).find('.validation-valid-label').remove();
                        }
                    }
                    $("button#afiliadoSubmit").removeClass('disabled');
                    $("button#cancelar").removeClass('disabled');
                }
            })
            return false;
        }
    });

    $("#disciplinaForm").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            nombre: {
                required: true
            }
        },
        messages: {
            nombre: {
                required: 'Ingrese un nombre'
            }
        },
        submitHandler: function () {
            var accion = '';
            if($("button#disciplinaSubmit").attr('data') == 1)
                accion = 'agregada';
            else if($("button#disciplinaSubmit").attr('data') == 0)
                accion = 'actualizada';
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#disciplinaForm")[0]);
            $.ajax({
                url:  $("form#disciplinaForm").attr('action'),
                type: $("form#disciplinaForm").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("button#disciplinaSubmit").addClass('disabled');
                    $("button#cancelar").addClass('disabled');
                },
                success:function(respuesta){
                    new PNotify({
                        title: 'Realizado',
                        text: 'Disciplina '+accion+' satisfactoriamente.',
                        addclass: 'bg-success alert-styled-right',
                        type: 'success'
                    });
                    if($("button#disciplinaSubmit").attr('data') == 1){
                        $('form#disciplinaForm').reset();
                        $(document).find('.validation-valid-label').remove();
                    }
                    $("button#disciplinaSubmit").removeClass('disabled');
                    $("button#cancelar").removeClass('disabled');
                }
            })
            return false;
        }
    });

    $("select#afiliado").on('change', function(){
        var url = $("#direccion").val();
        var id = $(this).val();
        if(id != ""){
            $.ajax({
                url:  url+"/"+id,
                type: "GET",
                success:function(respuesta){
                    $("#labelNombre").html(respuesta.respuesta.nombre);
                    $("#labelApellido").html(respuesta.respuesta.apellido);
                    $("#labelCedula").html(respuesta.respuesta.cedula);
                    var sexo = respuesta.respuesta.sexo == "M" ? "Masculino" : "Femenino";
                    $("#labelSexo").html(sexo);
                    var fechaSql = respuesta.respuesta.fechaNacimiento.split("-");
                    var fechaNormal = fechaSql[2]+"/"+fechaSql[1]+"/"+fechaSql[0];
                    $("#labelFechaNacimiento").html(fechaNormal);
                    $("#labelEdad").html(respuesta.respuesta.edad);
                    $("#labelTelefonoMovil").html(respuesta.respuesta.telefonoMovil);
                    $("#labelCargo").html(respuesta.respuesta.nombre_cargo.nombre);
                }
            });
        }
        else {
            $("#labelNombre").html("--");
            $("#labelApellido").html("--");
            $("#labelCedula").html("--");
            $("#labelSexo").html("--");
            $("#labelFechaNacimiento").html("--");
            $("#labelEdad").html("--");
            $("#labelTelefonoMovil").html("--");
            $("#labelCargo").html("--");
        }
    }).change();

    $("#atletaForm").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            afiliado: {
                required: true
            },
            disciplinaUno: {
                required: true
            },
            disciplinaDos: {
                required: true
            }
        },
        messages: {
            afiliado: {
                required: 'Seleccione un afiliado'
            },
            disciplinaUno: {
                required: 'Seleccione una disciplina'
            },
            disciplinaDos: {
                required: 'Seleccione una disciplina o la opción "Ninguna" si posee solo una'
            }
        },
        submitHandler: function () {
            var accion = '';
            if($("button#atletaSubmit").attr('data') == 1)
                accion = 'agregado';
            else if($("button#atletaSubmit").attr('data') == 0)
                accion = 'actualizado';
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#atletaForm")[0]);
            $.ajax({
                url:  $("form#atletaForm").attr('action'),
                type: $("form#atletaForm").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("button#atletaSubmit").addClass('disabled');
                    $("button#cancelar").addClass('disabled');
                },
                success:function(respuesta){
                    new PNotify({
                        title: 'Realizado',
                        text: 'Atleta '+accion+' satisfactoriamente.',
                        addclass: 'bg-success alert-styled-right',
                        type: 'success'
                    });
                    if($("button#atletaSubmit").attr('data') == 1){
                        $('form#atletaForm').reset();
                        $("#labelNombre").html("--");
                        $("#labelApellido").html("--");
                        $("#labelCedula").html("--");
                        $("#labelSexo").html("--");
                        $("#labelFechaNacimiento").html("--");
                        $("#labelEdad").html("--");
                        $("#labelTelefonoMovil").html("--");
                        $("#labelCargo").html("--");
                        $(document).find('.validation-valid-label').remove();
                    }
                    $("button#atletaSubmit").removeClass('disabled');
                    $("button#cancelar").removeClass('disabled');
                }
            })
            return false;
        }
    });
    
    $("button#atletaConsultar").on('click', function(e){
        var valorDisciplina = $("select#consultaDisciplina").val() != "" ? $("select#consultaDisciplina").val() : "-1";
        var valorSexo = $("select#consultaSexo").val() != "" ? $("select#consultaSexo").val() : "-1";
        var url = $("#direccionConsulta").val();
        var contenido = "";
        $("#reporteAtletas").attr("data-disciplina", valorDisciplina);
        $("#reporteAtletas").attr("data-sexo", valorSexo);

        $.ajax({
            url: url+"/"+valorDisciplina+"/"+valorSexo,
            type: "GET",
            success: function(respuesta){
                tablaData.clear().draw();
                respuesta.respuesta.forEach(function(element) {
                    tablaData.row.add([
                        element.cedula, 
                        element.nombre, 
                        element.apellido, 
                        element.disciplinaNombreUno, 
                        element.disciplinaNombreDos
                    ]).draw();
                });
            }
        });
    });

    $("button#reporteAtletas").on('click', function(){
        if($(this).data("disciplina") == "-" && $(this).data("sexo") == "-"){
            alert("Debe realizar una consulta primero");
        }
        else {
            var url = $(this).data("href")+"/"+$(this).data("disciplina")+"/"+$(this).data("sexo");
            window.open(url, '');
        }
    });

     $("button#afiliadoConsultar").on('click', function(e){
        var valorEstado = $("select#consultaEstado").val() != "" ? $("select#consultaEstado").val() : "-1";
        var valorDependencia = $("select#consultaDependencia").val() != "" ? $("select#consultaDependencia").val() : "-1";
        var url = $("#direccionConsulta").val();
        var contenido = "";
        $("#reporteAfiliados").attr("data-estado", valorEstado);
        $("#reporteAfiliados").attr("data-dependencia", valorDependencia);

        $.ajax({
            url: url+"/"+valorEstado+"/"+valorDependencia,
            type: "GET",
            success: function(respuesta){
                tablaData.clear().draw();
                respuesta.respuesta.forEach(function(element) {
                    tablaData.row.add([
                        element.cedula, 
                        element.nombre, 
                        element.apellido, 
                    ]).draw();
                });
            }
        });
    });

    $("button#reporteAfiliados").on('click', function(){
        if($(this).data("estado") == "-" && $(this).data("dependencia") == "-"){
            alert("Debe realizar una consulta primero");
        }
        else {
            var url = $(this).data("href")+"/"+$(this).data("estado")+"/"+$(this).data("dependencia");
            window.open(url, '');
        }
    });

    $("button#eleccionConsultar").on('click', function(e){
        var valorCentro = $("select#consultaCentro").val() != "" ? $("select#consultaCentro").val() : "-1";
        var valorMesa = $("select#consultaMesa").val() != "" ? $("select#consultaMesa").val() : "-1";
        var url = $("#direccionConsulta").val();
        var contenido = "";
        $("#reporteElecciones").attr("data-centro", valorCentro);
        $("#reporteElecciones").attr("data-mesa", valorMesa);

        $.ajax({
            url: url+"/"+valorCentro+"/"+valorMesa,
            type: "GET",
            success: function(respuesta){
                tablaData.clear().draw();
                respuesta.respuesta.forEach(function(element) {
                    tablaData.row.add([
                        element.cedula, 
                        element.nombre, 
                        element.apellido, 
                        element.centro, 
                        element.mesa
                    ]).draw();
                });
            }
        });
    });

    $("button#reporteElecciones").on('click', function(){
        if($(this).data("centro") == "-" && $(this).data("mesa") == "-"){
            alert("Debe realizar una consulta primero");
        }
        else {
            var url = $(this).data("href")+"/"+$(this).data("centro")+"/"+$(this).data("mesa");
            window.open(url, '');
        }
    });

    $("#resetPasswordForm").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            email: {
                required: true, 
                email: true
            }
        },
        messages: {
            email: {
                required: 'Ingrese su email',
                email: 'Ingrese un formato de email válido'
            }
        }
    });

    $("#requestPasswordForm").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            email: {
                required: true, 
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            email: {
                required: 'Ingrese su email',
                email: 'Ingrese un formato de email válido'
            },
            password: {
                required: "Ingrese su contraseña",
                minlength: jQuery.validator.format("Debe ingresar al menos {0} caracteres")
            },
            password_confirmation: {
                required: 'Repita la contraseña',
                equalTo: 'Las contraseñas deben de ser iguales'
            },

        }
    });

    $("#eventoForm").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            fecha: {
                required: true
            },
            solicitudTransporte: {
                required: true
            },
            tipoTorneo: {
                required: true
            }
            ,
            lugar: {
                required: true
            }
        },
        messages: {
            fecha: {
                required: 'Ingrese una fecha'
            },
            solicitudTransporte: {
                required: 'Seleccione una opción'
            },
            tipoTorneo: {
                required: 'Ingrese el tipo de torneo'
            },
            lugar: {
                required: 'Ingrese el lugar'
            }
        },
        submitHandler: function () {
            var accion = '';
            if($("button#eventoSubmit").attr('data') == 1)
                accion = 'agregado';
            else if($("button#eventoSubmit").attr('data') == 0)
                accion = 'actualizado';
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#eventoForm")[0]);
            $.ajax({
                url:  $("form#eventoForm").attr('action'),
                type: $("form#eventoForm").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("button#eventoSubmit").addClass('disabled');
                    $("button#cancelar").addClass('disabled');
                },
                success:function(respuesta){
                    new PNotify({
                        title: 'Realizado',
                        text: 'Evento '+accion+' satisfactoriamente.',
                        addclass: 'bg-success alert-styled-right',
                        type: 'success'
                    });
                    if($("button#eventoSubmit").attr('data') == 1){
                        $('form#eventoForm').reset();
                        $(document).find('.validation-valid-label').remove();
                    }
                    $("button#eventoSubmit").removeClass('disabled');
                    $("button#cancelar").removeClass('disabled');
                }
            })
            return false;
        }
    });

    $("#eleccionForm").validate({
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function(error, element) {
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label")
        },
        rules: {
            afiliado: {
                required: true
            },
            centro: {
                required: true
            },
            mesa: {
                required: true
            }
        },
        messages: {
            afiliado: {
                required: 'Seleccione un afiliado'
            },
            centro: {
                required: 'Seleccione un centro'
            },
            mesa: {
                required: 'Seleccione una mesa'
            }
        },
        submitHandler: function () {
            var accion = '';
            if($("button#eleccionSubmit").attr('data') == 1)
                accion = 'agregado';
            else if($("button#eleccionSubmit").attr('data') == 0)
                accion = 'actualizado';
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#eleccionForm")[0]);
            $.ajax({
                url:  $("form#eleccionForm").attr('action'),
                type: $("form#eleccionForm").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("button#eleccionSubmit").addClass('disabled');
                    $("button#cancelar").addClass('disabled');
                },
                success:function(respuesta){
                    new PNotify({
                        title: 'Realizado',
                        text: 'Registro '+accion+' satisfactoriamente.',
                        addclass: 'bg-success alert-styled-right',
                        type: 'success'
                    });
                    if($("button#eleccionSubmit").attr('data') == 1){
                        $('form#eleccionForm').reset();
                        $("#labelNombre").html("--");
                        $("#labelApellido").html("--");
                        $("#labelCedula").html("--");
                        $("#labelSexo").html("--");
                        $("#labelFechaNacimiento").html("--");
                        $("#labelEdad").html("--");
                        $("#labelTelefonoMovil").html("--");
                        $("#labelCargo").html("--");
                        $(document).find('.validation-valid-label').remove();
                    }
                    $("button#eleccionSubmit").removeClass('disabled');
                    $("button#cancelar").removeClass('disabled');
                }
            })
            return false;
        }
    });
});