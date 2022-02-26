<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="/dashboard">Dashboard</a></li>
            <li class="active">Page</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <?php component('alert.php') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10  margin-bottom-15">
                <label for="site_description" class="control-label">Site Description</label>
                <input type="text" class="form-control no-margin" id="site_description" value="<?php echo $moduleParameter['site_description']['value']; ?>">
            </div>
        </div>
        <div class="row templatemo-form-buttons">
            <div class="col-md-12 margin-bottom-15">
                <button type="button" class="btn btn-primary" onclick="page.saveDescription()">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin-bottom-15">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <label class="control-label">Social Media Links</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1 margin-bottom-15">
                <label class="checkbox-inline">
                    <input type="checkbox" id="social_links_facebook_status" <?php echo $moduleParameter['facebook_url']['status'] == "1" ? 'checked="true"' : ''; ?> />
                    Facebook
                </label>
            </div>
            <div class="col-md-3 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['facebook_url']['value']; ?>" id="social_links_facebook_url" placeholder="https://www.facebook.com/somepage">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 margin-bottom-15">
                <label class="checkbox-inline">
                    <input type="checkbox" id="social_links_twitter_status" <?php echo $moduleParameter['twitter_url']['status'] == "1" ? 'checked="true"' : ''; ?> />
                    Twitter
                </label>
            </div>
            <div class="col-md-3 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['twitter_url']['value']; ?>" id="social_links_twitter_url" placeholder="https://twitter.com/somepage">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 margin-bottom-15">
                <label class="checkbox-inline">
                    <input type="checkbox" id="social_links_instagram_status" <?php echo $moduleParameter['instagram_url']['status'] == "1" ? 'checked="true"' : ''; ?> />
                    Instagram
                </label>
            </div>
            <div class="col-md-3 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['instagram_url']['value']; ?>" id="social_links_instagram_url" placeholder="https://www.instagram.com/somepage">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 margin-bottom-15">
                <label class="checkbox-inline">
                    <input type="checkbox" id="social_links_other_status" <?php echo $moduleParameter['other_url']['status'] == "1" ? 'checked="true"' : ''; ?> />
                    Other
                </label>
            </div>
            <div class="col-md-3 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['other_url']['value']; ?>" id="social_links_other_url" placeholder="https://somesite.com">
            </div>
        </div>
        <div class="row templatemo-form-buttons">
            <div class="col-md-12 margin-bottom-15">
                <button type="button" class="btn btn-primary" onclick="page.saveSocialMediaLinks()">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin-bottom-15">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <label class="control-label">Custom Page Header Links</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 margin-bottom-15">
                <label class="checkbox-inline">
                    <input type="checkbox" id="custom_link_1_status" <?php echo $moduleParameter['custom_link_1_url']['status'] == "1" ? 'checked="true"' : ''; ?> />
                    Link 1
                </label>
            </div>
            <div class="col-md-2 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['custom_link_1_label']['value']; ?>" id="custom_link_1_label" placeholder="Label">
            </div>
            <div class="col-md-3 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['custom_link_1_url']['value']; ?>" id="custom_link_1_url" placeholder="https://somesite.com">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 margin-bottom-15">
                <label class="checkbox-inline">
                    <input type="checkbox" id="custom_link_2_status" <?php echo $moduleParameter['custom_link_2_url']['status'] == "1" ? 'checked="true"' : ''; ?> />
                    Link 2
                </label>
            </div>
            <div class="col-md-2 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['custom_link_2_label']['value']; ?>" id="custom_link_2_label" placeholder="Label">
            </div>
            <div class="col-md-3 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['custom_link_2_url']['value']; ?>" id="custom_link_2_url" placeholder="https://somesite.com">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 margin-bottom-15">
                <label class="checkbox-inline">
                    <input type="checkbox" id="custom_link_3_status" <?php echo $moduleParameter['custom_link_3_url']['status'] == "1" ? 'checked="true"' : ''; ?> />
                    Link 3
                </label>
            </div>
            <div class="col-md-2 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['custom_link_3_label']['value']; ?>" id="custom_link_3_label" placeholder="Label">
            </div>
            <div class="col-md-3 margin-bottom-15">
                <input type="text" class="form-control no-margin" value="<?php echo $moduleParameter['custom_link_3_url']['value']; ?>" id="custom_link_3_url" placeholder="https://somesite.com">
            </div>
        </div>
        <div class="row templatemo-form-buttons">
            <div class="col-md-12 margin-bottom-15">
                <button type="button" class="btn btn-primary" onclick="page.saveCustomLinks()">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Save
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin-bottom-15">
                <hr>
            </div>
        </div>
    </div>
</div>

<script src="/js/modules/page.js<?php noCache(); ?>"></script>