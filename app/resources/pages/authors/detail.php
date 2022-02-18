<script src="/js/lib/ckeditor/ckeditor.js"></script>

<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/authors">Authors</a></li>
            <li class="active"><?php echo $moduleParameter['id'] == 0 ? 'New' : 'Edit'; ?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div role="form" id="templatemo-preferences-form">
                    <div class="row">
                        <div class="col-md-12">
                            <?php component('alert.php') ?>
                        </div>
                    </div>
                    <input type="hidden" id="id" value="<?php echo $moduleParameter['id']; ?>">
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <h1>Author</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 margin-bottom-15">
                            <label class="checkbox-inline">
                                <input
                                    <?php echo $moduleParameter['is_main'] == "1" ? 'checked="true"' : ''; ?>
                                    id="is_main"
                                    type="checkbox"
                                > Main Author
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <label for="full_name" class="control-label">Full Name</label>
                            <input
                                type="text"
                                class="form-control no-margin"
                                id="full_name"
                                value="<?php echo $moduleParameter['full_name']; ?>"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <label for="brief_introduction" class="control-label" maxlength="1000">Brief Introduction</label>
                            <textarea class="form-control no-margin" rows="5" id="brief_introduction"><?php echo $moduleParameter['brief_introduction']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <label for="content" class="control-label">About</label>
                            <textarea name="about" id="about" rows="15" cols="80"><?php echo $moduleParameter['about']; ?></textarea>
                            <script>
                                CKEDITOR.config.height = 400
                                CKEDITOR.replace('about')
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <label for="file_select" class="control-label">Photo</label>
                            <input
                                type="file"
                                class="form-control no-margin"
                                id="file_select"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 margin-bottom-15">
                            <img src="<?php echo $moduleParameter['photo_url']; ?>" style="width: 100%" />
                        </div>
                    </div>
                    <div class="row templatemo-form-buttons">
                        <div class="col-md-12 margin-bottom-15">
                            <button type="button" class="btn btn-primary" onclick="detail.save()">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/modules/authors/detail.js<?php noCache(); ?>"></script>