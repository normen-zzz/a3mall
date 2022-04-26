<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/logo/atigamalllogo.png') ?>" />

  <!-- Midtrans -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key='SB-Mid-client-BdEPTlj-ggTcbDTr'></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!-- Icon Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

  <!-- Font Google -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet" />

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>css/style.css" />


  <!-- Swipper JS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- CSS Steper -->
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/bs-stepper.min.css" />

  <!-- gauges -->
  <!-- gauges -->

  <link href="<?= base_url('assets/user/') ?>gauges/assets/prettify.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>gauges/assets/fd-slider/fd-slider.css?v=2" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/user/') ?>gauges/assets/fd-slider/fd-slider-tooltip.css" />


  <title><?= $title ?></title>
</head>

<style>
  .click {
    cursor: pointer
  }
</style>

<body>
  <?php $this->load->view('user/templates/navbar') ?>

  <?php $this->load->view($page) ?>

  <?php $this->load->view('user/templates/footer') ?>


</body>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- JS Stepper -->
<script src="<?= base_url('assets/user/') ?>js/bs-stepper.min.js"></script>
<script src="<?= base_url('assets/user/') ?>js/main.js"></script>

<!-- My JS -->
<script src="<?= base_url('assets/user/') ?>js/script.js"></script>
<!-- datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

<!-- gauges  -->
<!-- gauges -->
<script type="text/javascript" src="<?= base_url('assets/user/') ?>gauges/assets/prettify.js"></script>
<script type="text/javascript" src="<?= base_url('assets/user/') ?>gauges/assets/jscolor.js"></script>
<script src="<?= base_url('assets/user/') ?>gauges/dist/gauge.js"></script>


<script>
  $('.click').click(function() {
    window.location = $(this).data('href');
    //use window.open if you want a link to open in a new window
  });
</script>
<script>
  $(document).ready(function() {
    $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
  });
</script>

<script type="text/javascript">
  $(window).on('load', function() {
    <?= $modal; ?>
  });
</script>

<!-- midtrans -->
<script type="text/javascript">
  $('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

    var jumlah = $("#jumlah").val();
    var nama = $("#nama").val();
    var kd_transaction = $("#kd_transaction").val();
    var email = $("#email").val();

    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>user/Checkout/token',
      data: {
        jumlah: jumlah,
        nama: nama,
        kd_transaction: kd_transaction,
        email: email,
        <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'

      },
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = ' + data);

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type, data) {
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          // resultType.innerHTML = type;
          // resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {

          onSuccess: function(result) {
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result) {
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result) {
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });
</script>

<script type="text/javascript">
  $('.midtrans').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
    var id = $(this).attr('data-id');
    var jumlah = $('#jumlah_' + id).val();
    var nama = $("#nama_" + id).val();
    var kd_transaction = $("#kd_transaction_" + id).val();
    var email = $("#email_" + id).val();


    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>user/Checkout/token',
      data: {
        jumlah: jumlah,
        nama: nama,
        kd_transaction: kd_transaction,
        email: email,
        <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'

      },
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = ' + data);

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type, data) {
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          // resultType.innerHTML = type;
          // resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {

          onSuccess: function(result) {
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result) {
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result) {
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });
</script>
<!-- <script>
  function ajaxcsrf() {
    var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
    var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
    var csrf = {};
    csrf[csrfname] = csrfhash;
    $.ajaxSetup({
      "data": csrf
    });
  }
</script> -->
<script>
  $(document).ready(function() {
    $('#table_id').DataTable({
      "aaSorting": [],
      dom: 'Bfrtip',
      exportOptions: {
        columns: ':not(:last-child)',
      }
    });

  });
</script>

<script>
  $(function() {
    $('.pop').on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').modal('show');
    });
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function copy() {
    /* Get the text field */
    var copyText = document.getElementById('links');

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    alert('Copied the text: ' + copyText.value);
  }
</script>


<script>
  $('#showlink').on('click', '.links', function() {
    var id = $(this).attr('id');
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: '<?php echo base_url() ?>user/Referal/generateLinkForm',
      async: false,
      dataType: 'json',
      success: function(data) {
        $('input[name=links]').val("<?= base_url('FormReferral/') ?>" + data.links);
      },
      error: function() {
        alert('Could not displaying data');
      }
    });
  });
</script>

<!-- gauges script -->
<script>
  var opts1 = {
    angle: -0.25,
    lineWidth: 0.2,
    radiusScale: 0.9,
    pointer: {
      length: 0.6,
      strokeWidth: 0.05,
      color: '#000000',
    },
    staticLabels: {
      font: '10px sans-serif',
      labels: [3000000, 10000000, 15000000, 20000000],
      fractionDigits: 0,
    },
    staticZones: [{
        strokeStyle: '#F03E3E',
        min: 0,
        max: 3000000
      },
      {
        strokeStyle: '#FFDD00',
        min: 3000000,
        max: 10000000
      },
      {
        strokeStyle: '#FFDD00',
        min: 10000000,
        max: 15000000
      },
      {
        strokeStyle: '#30B32D',
        min: 15000000,
        max: 25000000
      },
    ],
    limitMax: false,
    limitMin: false,
    highDpiSupport: true,
    renderTicks: {
      divisions: 5,
      divWidth: 1.1,
      divLength: 0.79,
      divColor: '#333333',
      subDivisions: 6,
      subLength: 0.5,
      subWidth: 0.6,
      subColor: '#666666',
    },
  };

  var gauge1 = new Gauge(document.getElementById('canvas-preview1')).setOptions(opts1); // create sexy gauge!
  gauge1.maxValue = 25000000; // set max gauge value
  gauge1.setMinValue(0); // Prefer setter over gauge.minValue = 0
  gauge1.animationSpeed = 32; // set animation speed (32 is default value)
  gauge1.setTextField(document.getElementById('preview-textfield1'));
  gauge1.set(<?php if ($incomemonth->total == FALSE) {
                echo 0;
              } else {
                echo $incomemonth->total;
              } ?>); // set actual value

  var opts2 = {
    angle: -0.25,
    lineWidth: 0.2,
    radiusScale: 0.9,
    pointer: {
      length: 0.6,
      strokeWidth: 0.05,
      color: '#000000',
    },
    staticLabels: {
      font: '10px sans-serif',
      labels: [3000000, 10000000, 15000000, 20000000],
      fractionDigits: 0,
    },
    staticZones: [{
        strokeStyle: '#F03E3E',
        min: 0,
        max: 3000000
      },
      {
        strokeStyle: '#FFDD00',
        min: 3000000,
        max: 10000000
      },
      {
        strokeStyle: '#FFDD00',
        min: 10000000,
        max: 15000000
      },
      {
        strokeStyle: '#30B32D',
        min: 15000000,
        max: 25000000
      },
    ],
    limitMax: false,
    limitMin: false,
    highDpiSupport: true,
    renderTicks: {
      divisions: 5,
      divWidth: 1.1,
      divLength: 0.79,
      divColor: '#333333',
      subDivisions: 6,
      subLength: 0.5,
      subWidth: 0.6,
      subColor: '#666666',
    },
  };

  var gauge2 = new Gauge(document.getElementById('canvas-preview2')).setOptions(opts1); // create sexy gauge!
  gauge2.maxValue = 25000000; // set max gauge value
  gauge2.setMinValue(0); // Prefer setter over gauge.minValue = 0
  gauge2.animationSpeed = 32; // set animation speed (32 is default value)
  gauge2.setTextField(document.getElementById('preview-textfield2'));
  gauge2.set(<?= $incomeordermonth->total ?>); // set actual value

  var opts3 = {
    angle: -0.25,
    lineWidth: 0.2,
    radiusScale: 0.9,
    pointer: {
      length: 0.6,
      strokeWidth: 0.05,
      color: '#000000',
    },
    staticLabels: {
      font: '10px sans-serif',
      labels: [3000000, 10000000, 15000000, 20000000],
      fractionDigits: 0,
    },
    staticZones: [{
        strokeStyle: '#F03E3E',
        min: 0,
        max: 3000000
      },
      {
        strokeStyle: '#FFDD00',
        min: 3000000,
        max: 10000000
      },
      {
        strokeStyle: '#FFDD00',
        min: 10000000,
        max: 15000000
      },
      {
        strokeStyle: '#30B32D',
        min: 15000000,
        max: 25000000
      },
    ],
    limitMax: false,
    limitMin: false,
    highDpiSupport: true,
    renderTicks: {
      divisions: 5,
      divWidth: 1.1,
      divLength: 0.79,
      divColor: '#333333',
      subDivisions: 6,
      subLength: 0.5,
      subWidth: 0.6,
      subColor: '#666666',
    },
  };

  var gauge3 = new Gauge(document.getElementById('canvas-preview3')).setOptions(opts1); // create sexy gauge!
  gauge3.maxValue = 25000000; // set max gauge value
  gauge3.setMinValue(0); // Prefer setter over gauge.minValue = 0
  gauge3.animationSpeed = 32; // set animation speed (32 is default value)
  gauge3.setTextField(document.getElementById('preview-textfield3'));
  gauge3.set(<?php if ($incomeyear->total == FALSE) {
                echo 0;
              } else {
                echo $incomeyear->total;
              } ?>); // set actual value

  var opts4 = {
    angle: -0.25,
    lineWidth: 0.2,
    radiusScale: 0.9,
    pointer: {
      length: 0.6,
      strokeWidth: 0.05,
      color: '#000000',
    },
    staticLabels: {
      font: '10px sans-serif',
      labels: [3000000, 10000000, 15000000, 20000000],
      fractionDigits: 0,
    },
    staticZones: [{
        strokeStyle: '#F03E3E',
        min: 0,
        max: 3000000
      },
      {
        strokeStyle: '#FFDD00',
        min: 3000000,
        max: 10000000
      },
      {
        strokeStyle: '#FFDD00',
        min: 10000000,
        max: 15000000
      },
      {
        strokeStyle: '#30B32D',
        min: 15000000,
        max: 25000000
      },
    ],
    limitMax: false,
    limitMin: false,
    highDpiSupport: true,
    renderTicks: {
      divisions: 5,
      divWidth: 1.1,
      divLength: 0.79,
      divColor: '#333333',
      subDivisions: 6,
      subLength: 0.5,
      subWidth: 0.6,
      subColor: '#666666',
    },
  };

  var gauge4 = new Gauge(document.getElementById('canvas-preview4')).setOptions(opts1); // create sexy gauge!
  gauge4.maxValue = 25000000; // set max gauge value
  gauge4.setMinValue(0); // Prefer setter over gauge.minValue = 0
  gauge4.animationSpeed = 32; // set animation speed (32 is default value)
  gauge4.setTextField(document.getElementById('preview-textfield4'));
  gauge4.set(<?= $incomeorderyear->total ?>); // set actual value
</script>

<script src="//code.tidio.co/rejtbpk5pwgqod8fsct6dz96qpo3jrqg.js" async></script>

</html>