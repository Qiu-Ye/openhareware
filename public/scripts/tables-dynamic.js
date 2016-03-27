$(function(){
    var unsortableColumns = [];
    $('#datatable-table').find('thead th').each(function(){
        if ($(this).hasClass( 'no-sort')){
            unsortableColumns.push({"bSortable": false});
        } else {
            unsortableColumns.push(null);
        }
    });

    $("#datatable-table").dataTable({
        //"processing": true,
        //"serverSide": true,
        //"ajax": "",
        "sDom": "<'row table-top-control'<'col-md-6 hidden-xs per-page-selector'l><'col-md-6'f>r>t<'row table-bottom-control'<'col-md-6'i><'col-md-6'p>>",
        "oLanguage": {
            "sLengthMenu": "_MENU_ &nbsp; records per page"
        },
        "aoColumns": unsortableColumns
    });

    $(".chzn-select, .dataTables_length select").select2({
        minimumResultsForSearch: 10
    });

});
