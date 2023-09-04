$(document).ready(function () {
    $('#tableCS').DataTable( {
        rowReorder: true,
        columnDefs: [
            { orderable: false, targets: 0, className: 'reorder' },
            { orderable: true, className: 'reorder', targets: 1 },
            { orderable: true, className: 'reorder', targets: 2 },
            { orderable: true, className: 'reorder', targets: 3 },
            { orderable: true, className: 'reorder', targets: 4 },
            { orderable: true, className: 'reorder', targets: 5 },
            { orderable: true, className: 'reorder', targets: 6 },
            { orderable: true, className: 'reorder', targets: 7 },
            { orderable: true, className: 'reorder', targets: 8 },
            { orderable: true, className: 'reorder', targets: 12 },
            { orderable: false, className: 'reorder', targets: 9 },
            { orderable: false, className: 'reorder', targets: 10 },
            { orderable: false, className: 'reorder', targets: 11 },
            { orderable: false, className: 'reorder', targets: 13 },
            { orderable: false, className: 'reorder', targets: 14 }
        ],
        scrollX: true,
        "language": {
            "lengthMenu": "Mostrando _MENU_ resultados por página",
            "zeroRecords": "Nenhum registro encontrado.",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro encontrado",
            "loadingRecords": "Carregando...",
            "search":         "Procurar:",
            "paginate": {
                "first":      "Primeira",
                "last":       "Última",
                "next":       "Próxima",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": Ative para ordenar a coluna em ordem ascendente",
                "sortDescending": ": Ative para ordenar a coluna em ordem descendente"
            },
            "infoFiltered": "(de um total de _MAX_ registros)."
        }
    } );
});