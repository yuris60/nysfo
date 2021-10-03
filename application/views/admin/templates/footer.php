<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<div class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        Copyright © <?= date('Y') ?> NBC System Information (Nysfo). Made With <i class="fas fa-heart"></i> by <a href="https://instagram.com/yuris60" target="_blank">YAK</a>.
      </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="text-md-right footer-links d-none d-sm-block">
          <a href="javascript: void(0);">About</a>
          <a href="javascript: void(0);">Support</a>
          <a href="javascript: void(0);">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="<?= base_url('assets/') ?>concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/libs/js/main-js.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>


<!-- Datatables -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/vendor/datatables/js/data-table.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script> -->

<!-- SweetAlert2 -->
<script src="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>js/myscript.js"></script>

<!-- Datepicker -->
<script src="<?= base_url('assets/') ?>vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>js/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/') ?>vendor/datatables/datatables.min.js"></script>

<!-- Dropify -->
<script src="<?= base_url('assets/') ?>vendor/dropify/dist/js/dropify.min.js"></script>

<!-- morris js -->
<script src="<?= base_url('assets/') ?>concept/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/vendor/charts/morris-bundle/morris.js"></script>
<script src="<?= base_url('assets/') ?>concept/assets/vendor/charts/morris-bundle/morrisjs.html"></script>

<!-- Chart -->
<script src="<?= base_url('assets/') ?>vendor\chartjs\Chart.js\js\chart.js"></script>
<script src="<?= base_url('assets/') ?>vendor\chartjs\Chart.js\js\chart.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor\chartjs\Chart.js\js\chart.bundle.js"></script>

<!-- Webcam -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
<!-- <script src="<?= base_url('assets/') ?>js/grafik.js"></script> -->

<script>
  //datepicker
  $(function() {
    $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
    });
  });

  $(function() {
    $('#datetimepicker2').datetimepicker({
      format: 'dddd',
      viewMode: 'days',
      icons: {
        time: 'fas fa-clock-o',
        date: 'fas fa-calendar',
        up: 'fas fa-chevron-up',
        down: 'fas fa-chevron-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-check',
        clear: 'fas fa-trash',
        close: 'fas fa-times'
      }
    });
  });

  $(function() {
    $('#datetimepicker3').datetimepicker({
      format: 'HH:mm',
      icons: {
        time: 'fas fa-clock-o',
        date: 'fas fa-calendar',
        up: 'fas fa-chevron-up',
        down: 'fas fa-chevron-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-check',
        clear: 'fas fa-trash',
        close: 'fas fa-times'
      }
    });
  });

  $(function() {
    $('#datetimepicker4').datetimepicker({
      format: 'HH:mm',
      icons: {
        time: 'fas fa-clock-o',
        date: 'fas fa-calendar',
        up: 'fas fa-chevron-up',
        down: 'fas fa-chevron-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-check',
        clear: 'fas fa-trash',
        close: 'fas fa-times'
      }
    });
  });
</script>
<script>
  $(function(e) {
    "use strict";
    $(".date-inputmask").inputmask("dd/mm/yyyy"),
      $(".phone-inputmask").inputmask("(999) 999-9999"),
      $(".international-inputmask").inputmask("+9(999)999-9999"),
      $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
      $(".purchase-inputmask").inputmask("aaaa 9999-****"),
      $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
      $(".ssn-inputmask").inputmask("999-99-9999"),
      $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
      $(".currency-inputmask").inputmask("$9999"),
      $(".percentage-inputmask").inputmask("99%"),
      $(".decimal-inputmask").inputmask({
        alias: "decimal",
        radixPoint: "."
      }),

      $(".email-inputmask").inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
        greedy: !1,
        onBeforePaste: function(n, a) {
          return (e = e.toLowerCase()).replace("mailto:", "")
        },
        definitions: {
          "*": {
            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
            cardinality: 1,
            casing: "lower"
          }
        }
      })
  });

  //datepicker
  $(function() {
    $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
    });
  });

  $(function() { //custom
    $(".datepicker-range").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
    });
  });

  $(function() { //bulanan
    $('.datepicker-bulanan').datepicker({
      format: "yyyy-mm",
      todayHighlight: true,
      minViewMode: 1,
      maxViewMode: 2
    });
  });

  $(function() { //tahunan
    $(".datepicker-tahunan").datepicker({
      format: "yyyy",
      todayHighlight: true,
      minViewMode: 2,
      maxViewMode: 2
    });
  });

  //pilihan laporan
  $(document).ready(function() {
    $("#pilihan").change(function() {
      $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("id");
        if (optionValue) {
          $(".pilihan").not("." + optionValue).hide();
          $("." + optionValue).show();
        } else {
          $(".pilihan").hide();
        }
      });
    }).change();
  });

  //dropify
  $(document).ready(function() {
    $('.dropify').dropify({
      messages: {
        default: 'Drag atau drop untuk memilih gambar',
        replace: 'Ganti',
        remove: 'Hapus',
        error: 'error'
      }
    });
  });
</script>
</body>

</html>