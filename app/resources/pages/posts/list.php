<div class="templatemo-content-wrapper">
    <div class="templatemo-content">
        <ol class="breadcrumb">
            <li><a href="/dashboard">Dashboard</a></li>
            <li class="active">Posts</li>
            <li><a href="/posts/create">New</a></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <?php component('alert.php') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 margin-bottom-15">
            </div>
            <div class="col-md-3 margin-bottom-15">
                <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword">
            </div>
            <div class="col-md-1 margin-bottom-15 inline-to-control">
                <button type="button" class="form-control btn btn-default" onclick="list.find()">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin-bottom-15">
                <?php component('dataTable.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 margin-bottom-15">
                <button type="button" class="btn btn-default" onclick="list.create()">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    New Post
                </button>
            </div>
        </div>
    </div>
</div>

<script src="/js/modules/posts/list.js<?php noCache(); ?>"></script>