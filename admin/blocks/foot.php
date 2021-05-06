<!-- jQuery -->
<script src="public/templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/templates/dist/js/adminlte.min.js"></script>
<!-- Plugin jQuery & Boostrap multiselect -->
<script src="public/templates/plugins/jQuery-Multiple-Select-Plugin/dist/js/bootstrap-multiselect.js"></script>
<script src="public/templates/plugins/jQuery-Multiple-Select-Plugin/dist/js/bootstrap-multiselect.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="public/templates/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="public/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="public/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="public/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="public/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="public/templates/plugins/jszip/jszip.min.js"></script>
<script src="public/templates/plugins/pdfmake/pdfmake.min.js"></script>
<script src="public/templates/plugins/pdfmake/vfs_fonts.js"></script>
<script src="public/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="public/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="public/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="public/templates/plugins/moment/moment.min.js"></script>
<script src="public/templates/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Page specific script -->

<script type="text/javascript">
$('#cateGroup').multiselect({
    enableFiltering: true,
    enableCollapsibleOptGroups: true,
    nonSelectedText: 'Chọn thể loại',
    delimiterText: '- ',
    filterPlaceholder: 'Tìm kiếm',
    maxHeight: 300,
    numberDisplayed: 3
});
$('#author, #shelf, #category').multiselect({
    enableFiltering: true
})

$(document).ready(function() {
    $('#dataTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
    });
});
$(document).ready(function() {
    $('#dataTableBook').DataTable({
        "scrollX": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
    });
});
$('#datemask').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
})
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', {
    'placeholder': 'mm/dd/yyyy'
})
//Money Euro
$('[data-mask]').inputmask()

function acceptDelete($msg) {
    if (window.confirm($msg)) {
        return true;
    }
    return false;
}

$("#btnAddInput").click(function(e){ //on add input button click
    e.preventDefault();
    $(".input-isbn").append('<div><input style="padding: .375rem .75rem; width: 90%; height: calc(2.25rem + 2px); border-radius: .25rem; margin-top: 10px; border: 1px solid #ced4da" type="text" name="isbn[]"/><a href="#" class="remove_field">&times;</a></div>'); //add input box
});
	
$(".input-isbn").on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove();
})
$("input[name=chkStatus]").click(function(){
    var id = $(this).data("id")
    var checked = $(this).is(':checked') ? 1 : 0
    $.ajax({
        type: 'POST',
        url: "index.php?p=issuedbook-list",
        data: {
            id: id,
            'status': checked
        }
    })
    return true;
})
$("input[name=chkStatus]").click(function(){
    var id = $(this).data("id")
    var checked = $(this).is(':checked') ? 1 : 0
    $.ajax({
        type: 'POST',
        url: "index.php?p=issuedbook_detail-list",
        data: {
            id: id,
            'status': checked
        }
    })
    return true;
})
</script>