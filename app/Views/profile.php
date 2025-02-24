<?=$this->extend('templates\main');?>
<?=$this->section('head');?>
<?=$this->include('templates\style');?>
<link rel="stylesheet" href="/simple-sidebar.css" />
<link rel="stylesheet" href="/style.css" />
<script src="/hasjwt.js"></script>
<?=$this->endSection();?>
<?=$this->section('body');?>
<div class="d-flex" id="wrapper">
    <?=$this->include('templates\sidebar');?>
    <div id="page-content-wrapper">
        <?=$this->include('templates\topbar');?>
        <div class="container-fluid pt-4">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <?=esc($title);?>
                    profile page
                </h1>
            </div>
        </div>
    </div>
</div>
<?=$this->include('templates\script');?>
<script src="/simple-sidebar.js"></script>
<script src="/logout.js"></script>
<script>
</script>
<?=$this->endSection();?>
