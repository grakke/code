<?php include __DIR__.'/../header.php'; ?>

    <body id="page-top">

    <!-- Page Wrapper -->
<div id="wrapper">

<?php include __DIR__.'/../sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php include __DIR__.'/../nav.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">编辑专辑</h6>
                </div>
                <div class="card-body">
                    <form action="/admin/album/edit?id=<?= $album->id ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">标题</label>
                            <input type="text" name="title" class="form-control" id="title"
                                   value="<?= $album->title ?>">
                        </div>
                        <div class="form-group">
                            <label for="summary">简介</label>
                            <textarea class="form-control" id="summary" rows="3"
                                      name="summary"><?= $album->summary ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="feature_image">封面图</label>
                            <input type="file" class="form-control-file" id="feature_image" name="image">
                            <?php if ($album->image) : ?>
                                <img src="<?= $album->image ?>" class="img-thumbnail" style="width: 15em;">
                                <input type="hidden" name="origin_image" value="<?= $album->image ?>">
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include __DIR__.'/../footer.php'; ?>