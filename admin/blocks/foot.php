<!-- jQuery -->
<script src="public/templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/templates/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/templates/dist/js/demo.js"></script>
<!-- Plugin jQuery & Boostrap multiselect -->
<script src="public/templates/plugins/jQuery-Multiple-Select-Plugin/dist/js/bootstrap-multiselect.js"></script>
<script src="public/templates/plugins/jQuery-Multiple-Select-Plugin/dist/js/bootstrap-multiselect.min.js"></script>
<link rel="stylesheet" href="public/templates/plugins/jQuery-Multiple-Select-Plugin/dist/css/bootstrap-multiselect.min.css" />
<link rel="stylesheet" href="public/templates/plugins/jQuery-Multiple-Select-Plugin/dist/css/bootstrap-multiselect.css" type="text/css">


<!-- JS & CSS library of MultiSelect plugin -->
<script src="multiselect/jquery.multiselect.js"></script>
<link rel="stylesheet" href="multiselect/jquery.multiselect.css">
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
        selectAllText: true,
        selectAllValue:'multiselect-all',
    });
    $('#author, #shelf, #category').multiselect({
        enableFiltering: true
    })
   
    $(document).ready(function() {
        $('#dataTable').DataTable( {
            "scrollX": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "width": auto
        });
    });
    $(document).ready(function() {
        $('#dataTableBook').DataTable( {
            "scrollX": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
        });
    });
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    function acceptDelete($msg) {
        if (window.confirm($msg)) {
            return true;
        }
        return false;
    }
</script>