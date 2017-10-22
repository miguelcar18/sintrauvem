/* ------------------------------------------------------------------------------
*
*  # Basic datatables
*
*  Specific JS code additions for datatable_basic.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '100px'//,
            //targets: [ 4 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Basic datatable
    /*
    $('.datatable-basic').DataTable({
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
    */

    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Tipo de filtro...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
    
});
