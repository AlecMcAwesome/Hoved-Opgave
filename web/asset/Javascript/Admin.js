$(document).ready(function () {
    $('#usrTable').dataTable({
        statesave: true,
        dom: 'lfrtip',
        bFilter: true
    });

    $('#testTable').dataTable({
        statesave: true,
        dom: 'lfrtip',
        bFilter: true
    });
});