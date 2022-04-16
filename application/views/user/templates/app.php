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


</html>