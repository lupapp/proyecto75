   <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="view/vendor/popper/popper.min.js"></script>
    <script src="view/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="view/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="view/vendor/chart.js/Chart.min.js"></script>
    <script src="view/vendor/datatables/jquery.dataTables.js"></script>
    <script src="view/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="view/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="view/js/sb-admin-datatables.min.js"></script>
    <script src="view/js/sb-admin-charts.min.js"></script>
    <script type="text/javascript" src="view/js/bootstrap-datepicker.min.js"> </script>
    <script type="text/javascript" src="view/js/bootstrap-datepicker.es.min.js"> </script>
    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="view/js/validator.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <script type="text/javascript">
        $('.fj-date').datepicker({
            format: "dd/mm/yyyy",
            clearBtn: true,
            language: "es"
        });
        $('.selectpicker, .selectpicker2').selectpicker();
        $('#framework').change(function(){
            $('#hidden_framework').val($('#framework').val());
        });

        $('#multiple_select_form').on('submit', function(event){
            event.preventDefault();
            if($('#framework').val() != '')
            {
             var form_data = $(this).serialize();
             $.ajax({
              url:"insert.php",
              method:"POST",
              data:form_data,
              success:function(data)
              {
               //console.log(data);
               $('#hidden_framework').val('');
               $('.selectpicker').selectpicker('val', '');
               alert(data);
              }
             })
            }
            else
            {
             alert("Please select framework");
             return false;
            }
         });

    </script>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
            <small>Copyright © www.proyecto75 2017 | desarrollado por <a  href="http://www.lupaweb.com" target="black">Lupa</a></small>
        </div>
      </div>
    </footer>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
