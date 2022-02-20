<script src="/js/lib/ckeditor/ckeditor.js"></script>

<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/posts">Posts</a></li>
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
                        <div class="col-md-12">
                            <span class="badge" id="views">
                                <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $moduleParameter['views']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <h1>Post</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <label for="title" class="control-label">Title</label>
                            <input
                                value="<?php echo $moduleParameter['title']; ?>"
                                id="title"
                                type="text"
                                class="form-control no-margin"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <label for="summary" class="control-label" >Summary/Description</label>
                            <textarea class="form-control no-margin" maxlength="1000" rows="5" id="summary"><?php echo $moduleParameter['summary']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <label for="content" class="control-label">Content</label>
                            <textarea name="content" id="content" rows="15" cols="80"><?php echo $moduleParameter['content']; ?></textarea>
                            <script>
                                CKEDITOR.config.height = 500
                                CKEDITOR.replace('content')
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <label for="summary" class="control-label">Tags</label>
                            <div class="row" id="tags-container">
                                <?php
                                    for ($i = 0; $i < count($moduleParameter['tags']); $i++) {
                                ?>
                                <div class="col-md-2 margin-bottom-15">
                                    <label class="checkbox-inline">
                                        <input
                                            class="checkbox_tag"
                                            type="checkbox"
                                            data_id="<?php echo $moduleParameter['tags'][$i]['id']; ?>"
                                            <?php echo $moduleParameter['tags'][$i]['is_checked'] == "1" ? 'checked="true"' : ''; ?>
                                        > <?php echo $moduleParameter['tags'][$i]['name']; ?>
                                    </label>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>  
                            <div class="row">
                                <div class="col-md-12 margin-bottom-15">
                                    <span style="color: red; font-size: 11px;" id="add-tag-error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 margin-bottom-15">
                                    <input
                                        oninput="detail.clearAdTagMessage()"
                                        id="new-tag"
                                        placeholder="or Add a New Tag"
                                        type="text"
                                        class="form-control no-margin"
                                    >
                                </div>
                                <div class="col-md-2 margin-bottom-15">
                                    <button type="button" class="btn btn-primary form-control no-margin" onclick="detail.addTag()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Add Tag
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 margin-bottom-15">
                            <label for="author" class="control-label">Author</label>
                            <select class="form-control no-margin" id="author_id">
                                <?php
                                    foreach($moduleParameter['authors'] as $author) {
                                        $selected = '';
                                        if ($moduleParameter['author_id'] == $author['id']) {
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option '.$selected.' value="'.$author['id'].'">'.$author['full_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 margin-bottom-15">
                            <label for="date" class="control-label">Date</label>
                            <input
                                value="<?php echo $moduleParameter['date']; ?>"
                                id="date"
                                type="date"
                                class="form-control no-margin"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 margin-bottom-15">
                            <label for="file_select" class="control-label">Cover Photo</label>
                            <input
                                type="file"
                                class="form-control no-margin"
                                id="file_select"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-bottom-15">
                            <img src="<?php echo $moduleParameter['cover_photo_url']; ?>" style="width: 100%" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 margin-bottom-15">
                            <label class="checkbox-inline">
                                <input
                                    <?php echo $moduleParameter['is_published'] == "1" ? 'checked="true"' : ''; ?>
                                    id="is_published"
                                    type="checkbox"
                                > Publish
                            </label>
                            <label class="checkbox-inline">
                                <input
                                    <?php echo $moduleParameter['is_featured'] == "1" ? 'checked="true"' : ''; ?>
                                    id="is_featured"
                                    type="checkbox"
                                > Set as Featured
                            </label>
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

<script src="/js/modules/posts/detail.js<?php noCache(); ?>"></script>