<!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Mang Oleh</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/template/plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url();?>assets/template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>assets/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>assets/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url();?>assets/template/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/template/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/template/dist/js/pages/dashboard3.js"></script>
<link href="<?php echo base_url();?>assets/template/plugins/iCheck/square/red.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/template/plugins/iCheck/icheck.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $("#amwal").DataTable({
      "pageLength" : 3,
      "responsive": true,
      "autoWidth": false,
    });
    $("#zakat_fitrah").DataTable({
      "pageLength" : 3,
      "responsive": true,
      "autoWidth": false,
    });
    $("#qurban").DataTable({
      "pageLength" : 3,
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

<script type="text/javascript">
    var table_member;
    $(document).ready(function() {
        //CSRF
        var token_member = "<?php echo $this->security->get_csrf_hash();?>";
        //datatables
        table_member = $('#table_member').DataTable({ 
            "responsive": true,
            "autoWidth": false,
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Members/get_data_member')?>",
                "type": "POST",
                "data": function ( data ) {
                data.rt_member = $('#rt_member').val();
                data.nama_member = $('#nama_member').val();
                data.<?php echo $this->security->get_csrf_token_name();?> = token_member;
            }
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });

        //CSRF
        table_member.on('tbl.dt', function ( e, settings, json, tbl ) {
        token_member = json.<?=$this->security->get_csrf_token_name();?>;
        } );
        //END CSRF

        $('#btn-filter_member').click(function(){ //button filter event click
        table_member.ajax.reload();  //just reload table
        });
        $('#btn-reset_member').click(function(){ //button reset event click
        $('#form-filter_member')[0].reset();
        table_member.ajax.reload();  //just reload table
        });
 
    });
</script>

<script type="text/javascript">
    var table_amwal;
    $(document).ready(function() {
        //CSRF
        var token_amwal = "<?php echo $this->security->get_csrf_hash();?>";
        //datatables
        table_amwal = $('#table_amwal').DataTable({ 
            "responsive": true,
            "autoWidth": false,
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Amwal/get_data_amwal')?>",
                "type": "POST",
                "data": function ( data ) {
                // data.tgl_amwal = $('#tgl_amwal').val();
                // data.nama_amwal = $('#nama_amwal').val();

                // Read values
                var tgl_amwal = $('#tgl_amwal').val();
                var nama_amwal = $('#nama_amwal').val();

                // Append to data
                data.tgl_amwal = tgl_amwal;
                data.nama_amwal = nama_amwal;
                data.<?php echo $this->security->get_csrf_token_name();?> = token_amwal;
            }
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });

        //CSRF
        table_amwal.on('tbl.dt', function ( e, settings, json, tbl ) {
        token_amwal = json.<?=$this->security->get_csrf_token_name();?>;
        } );
        //END CSRF

        $('#tgl_amwal').keyup(function(){
          table_amwal.draw();
        });

        $('#nama_amwal').keyup(function(){
          table_amwal.draw();
        });

        // $('#btn-filter_amwal').click(function(){ //button filter event click
        // table_amwal.ajax.reload();  //just reload table
        // });
        // $('#btn-reset_amwal').click(function(){ //button reset event click
        // $('#form-filter_amwal')[0].reset();
        // table_amwal.ajax.reload();  //just reload table
        // });
 
    });
</script>

<script type="text/javascript">
    var table_zakat_fitrah;
    $(document).ready(function() {
        //CSRF
        var token_zakat_fitrah = "<?php echo $this->security->get_csrf_hash();?>";
        //datatables
        table_zakat_fitrah = $('#table_zakat_fitrah').DataTable({ 
            "responsive": true,
            "autoWidth": false,
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Zakat_fitrah/get_data_zakat_fitrah')?>",
                "type": "POST",
                "data": function ( data ) {
                // data.rt_zakat_fitrah = $('#rt_zakat_fitrah').val();
                // data.nama_zakat_fitrah = $('#nama_zakat_fitrah').val();

                // Read values
                var tgl_zakat_fitrah = $('#tgl_zakat_fitrah').val();
                var nama_zakat_fitrah = $('#nama_zakat_fitrah').val();

                // Append to data
                data.tgl_zakat_fitrah = tgl_zakat_fitrah;
                data.nama_zakat_fitrah = nama_zakat_fitrah;
                data.<?php echo $this->security->get_csrf_token_name();?> = token_zakat_fitrah;
            }
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });

        //CSRF
        table_zakat_fitrah.on('tbl.dt', function ( e, settings, json, tbl ) {
        token_zakat_fitrah = json.<?=$this->security->get_csrf_token_name();?>;
        } );
        //END CSRF

        $('#tgl_zakat_fitrah').keyup(function(){
          table_zakat_fitrah.draw();
        });

        $('#nama_zakat_fitrah').keyup(function(){
          table_zakat_fitrah.draw();
        });

        // $('#btn-filter_zakat_fitrah').click(function(){ //button filter event click
        // table_zakat_fitrah.ajax.reload();  //just reload table
        // });
        // $('#btn-reset_zakat_fitrah').click(function(){ //button reset event click
        // $('#form-filter_zakat_fitrah')[0].reset();
        // table_zakat_fitrah.ajax.reload();  //just reload table
        // });
 
    });
</script>

<script type="text/javascript">
    var table_qurban;
    $.fn.dataTable.Api.register( 'column().data().sum()', function () {
    return this.reduce( function (a, b) {
        var x = parseFloat( a ) || 0;
        var y = parseFloat( b ) || 0;
        return x + y;
    } );
    } );

    $(document).ready(function() {
        //CSRF
        var token_qurban = "<?php echo $this->security->get_csrf_hash();?>";
        //datatables
        table_qurban = $('#table_qurban').DataTable({ 
            "responsive": true,
            "autoWidth": false,
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Qurban/get_data_qurban')?>",
                "type": "POST",
                "data": function ( data ) {
                // Read values
                var tgl_qurban = $('#tgl_qurban').val();
                var nama_qurban = $('#nama_qurban').val();

                // Append to data
                data.tgl_qurban = tgl_qurban;
                data.nama_qurban = nama_qurban;
                data.<?php echo $this->security->get_csrf_token_name();?> = token_qurban;
            }
            },

            // "footerCallback": function( tfoot, data, start, end, display ) {
            //  // var hasil = table_qurban.column( 6 ).data().sum();
            //  var api = this.api(), data;
            //  var intVal = function ( i ) {
            //    return typeof i === 'string' ?
            //    i.replace(/[\$,]/g, '')*1 :
            //    typeof i === 'number' ?
            //    i : 0;
            //  };

            //  var amtTotal = api
            //  .column( 6 )
            //  .data()
            //  .reduce( function (a, b) {
            //    return intVal(a) + intVal(b);
            //  }, 0 );
            //  $(tfoot).find('th').eq(1).html(api.column( 6, {page:'current'} ).data().sum());
            //  },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });

        //CSRF
        table_qurban.on('tbl.dt', function ( e, settings, json, tbl ) {
        token_qurban = json.<?=$this->security->get_csrf_token_name();?>;
        } );
        //END CSRF

        $('#tgl_qurban').keyup(function(){
          table_qurban.draw();
        });

        $('#nama_qurban').keyup(function(){
          table_qurban.draw();
        });

        // $('#btn-filter_qurban').click(function(){ //button filter event click
        // table_qurban.ajax.reload();  //just reload table
        // });
        // $('#btn-reset_qurban').click(function(){ //button reset event click
        // $('#form-filter_qurban')[0].reset();
        // table_qurban.ajax.reload();  //just reload table
        // });
 
    });
</script>

<script type="text/javascript">
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<center><input type="text" class="col-md-6" placeholder="Search" /></center>' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        // "responsive": true,
      	"autoWidth": false,
    } );
} );
</script>

<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script type="text/javascript">
 $(function() {
  $('#datepicker').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    // "minYear": 1990,
    // "maxYear": 2005,
    "autoApply": true,
    "locale": {
        "format": "YYYY-MM-DD",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "Su",
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa"
        ],
        "monthNames": [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
    },
    // "startDate": "1999-01-01",
    // "endDate": "2005-12-31",
    "minDate": "1960-01-01",
    "maxDate": "2025-12-31"
});
});
</script>

<script type="text/javascript">
 $(function() {
  $('#datepicker2').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    // "minYear": 1990,
    // "maxYear": 2005,
    "autoApply": true,
    "locale": {
        "format": "YYYY-MM-DD",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "Su",
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa"
        ],
        "monthNames": [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
    },
    // "startDate": "1999-01-01",
    // "endDate": "2005-12-31",
    "minDate": "1960-01-01",
    "maxDate": "2025-12-31"
});
});
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('input[type="radio"]').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'iradio_square-red',
      increaseArea: '20%' // optional
    });

    $('input[name="status"]').on('ifChanged', function(event){
      // alert(event.value);

      console.log(event);
      var str = event.target.value;

      if (str.toLowerCase() == 'sudah') {
        $("#pasangan").show();
      }
      else {
        $("#pasangan").hide();
      }

    });
  });
</script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
</body>
</html>