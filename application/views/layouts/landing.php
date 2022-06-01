<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from akademik.pkimuin-suka.ac.id/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Apr 2022 00:43:39 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= $this->security->get_csrf_hash() ?>">
    <meta name="base-url" content="<?= site_url() ?>">
    <meta name="user-id" content="<?= UserModel::loginData('id') ?>">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Akademik PKIM</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700|Montserrat:400,700|Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web" type="text/css" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url('assets/code.jquery.com/jquery-1.12.0.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/aos.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/post-slider.js') ?>"></script>
    <script src="<?= base_url('assets/js/topscroll.js') ?>"></script>
    <script src="<?= base_url('assets/js/search.js') ?>"></script>
    <!-- <script type="text/javascript" src="https://akademik.pkimuin-suka.ac.id/assets/DataTables/datatables.js"></script>
  <link rel="stylesheet" type="text/css" href="https://akademik.pkimuin-suka.ac.id/assets/DataTables/datatables.css"> -->
    <script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <link href="<?= base_url('assets/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!DOCTYPE html>
<html lang="en">

<body></body>
<script>
    AOS.init({
        offset: 200,
        duration: 600,
        easing: 'ease-in-sine',
        delay: 100,
    });
</script>
<!-- Page Content -->

<?php $data['identities'] = $this->identity->getAll();?>
<?php $data['lecturers'] = $this->lecturer->getAll();?>
<?php $data['postPopulars'] = $this->reviewCurriculum->getAll([
    'order_method' => 'desc',
    'sort_by' => 'count_view',
    'limit' => 2,
]);
?>
<?php $data['studies'] = $this->study->getAll();
$data['studies'] = array_column($data['studies'], null, 'id');

$data['journals'] = array_column($this->journal->getAll(), null, 'id');
$data['laboratories'] = array_column($this->laboratory->getAll(), null, 'id');
$data['tracerStudies'] = array_column($this->tracerStudy->getAll(), null, 'id');
$data['documents'] = array_column($this->document->getAll(), null, 'id');?>

<?php $this->load->view('layouts/landing/_header', $data) ?>

<?php $this->load->view('partials/_alert') ?>
<div id="single-post">
    <div id="single-post-inner" class="container">
        <?php $this->load->view($page, $data) ?>
        <?php if($page != 'landing/index'): ?>
        <?php $this->load->view('layouts/landing/_sidebar') ?>
        <?php endif; ?>
    </div>
</div>

<?php $this->load->view('layouts/landing/_footer') ?>
<!-- /#page-content-wrapper -->
<!-- /#wrapper -->
</body>

</html>