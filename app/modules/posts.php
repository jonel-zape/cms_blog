<?php

class Posts
{
    public function index()
    {
        view('posts/list.php');
    }

    public function create()
    {
        $authors = getData(
            'SELECT
                `id`,
                `full_name`
            FROM `author`
            WHERE `deleted_at` IS NULL'
        );

        $detail = [
            'id' => 0,
            'title' => '',
            'summary' => '',
            'cover_photo_url' => '',
            'content' => '',
            'author_id' => '',
            'is_published' => '',
            'date' => '',
            'is_featured' => '',
            'views' => 0,
            'authors' => $authors
        ];

        view('posts/detail.php', $detail);
    }

    public function save()
    {
        $request = escapeString([
            'id' => post('id'),
            'title' => post('title'),
            'summary' => post('summary'),
            'cover_photo_url' => post('cover_photo_url'),
            'content' => post('content'),
            'author_id' => post('author_id'),
            'is_published' => post('is_published'),
            'date' => post('date'),
            'is_featured' => post('is_featured')
        ]);

        $id = trim($request['id']);
        $title = trim($request['title']);
        $summary = trim($request['summary']);
        $coverPhotoUrl = trim($request['cover_photo_url']);
        $content = trim($request['content']);
        $authorId = trim($request['author_id']);
        $isPublished = trim($request['is_published']);
        $date = trim($request['date']);
        $isFeatured = trim($request['is_featured']);

        $errors = [];

        if (strlen($title) < 1) {
            $errors[] = 'Title is required.';
        }

        if (strlen($summary) < 1) {
            $errors[] = 'Summary is required.';
        }

        if (strlen($content) < 1) {
            $errors[] = 'Content is required.';
        }

        if (strlen($authorId) < 1) {
            $errors[] = 'Author is required.';
        }

        if (strlen($date) < 1) {
            $errors[] = 'Date is required.';
        }

        if (count($errors) > 0) {
            return errorResponse($errors);
        }

        if ($id == 0) {
            executeQuery(
                'INSERT INTO `post` (
                    `title`,
                    `summary`,
                    `content`,
                    `author_id`,
                    `is_published`,
                    `date`,
                    `is_featured`,
                    '.cancelIfEmpty($coverPhotoUrl, '`cover_photo_url`,').'
                    `created_by`                    
                ) VALUES (
                    \''.$title.'\',
                    \''.$summary.'\',
                    \''.$content.'\',
                    \''.$authorId.'\',
                    \''.$isPublished.'\',
                    \''.$date.'\',
                    \''.$isFeatured.'\',
                    '.cancelIfEmpty($coverPhotoUrl, '\''.$coverPhotoUrl.'\',').'
                    1
                )
            ');

            $newPost = getData('SELECT MAX(id) AS id FROM post');
            $id = $newPost[0]['id'];
        } else {
            executeQuery(
                'UPDATE `post`
                SET
                    `title` = \''.$title.'\',
                    `summary` = \''.$summary.'\',
                    `content` = \''.$content.'\',
                    `author_id` = \''.$authorId.'\',
                    `is_published` = \''.$isPublished.'\',
                    `date` = \''.$date.'\',
                    `is_featured` = \''.$isFeatured.'\',
                    '.cancelIfEmpty($coverPhotoUrl, '`cover_photo_url` = \''.$coverPhotoUrl.'\',').'
                    `updated_by` = 1,
                    `updated_at` = NOW()
                WHERE `id` = '.$id
            );
        }

        return successfulResponse(['id' => $id]);
    }

    public function edit($id)
    {
        if (!is_numeric($id)) {
            $id = 0;
        }

        $data = getData('
            SELECT
                `id`,
                `title`,
                `summary`,
                `cover_photo_url`,
                `content`,
                `author_id`,
                `is_published`,
                `date`,
                `is_featured`,
                `views`
            FROM `post`
            WHERE `id` = '.$id.'
        ');

        if (count($data) < 1) {
            view('404.php');
            return;
        }

        $authors = getData(
            'SELECT
                `id`,
                `full_name`
            FROM `author`
            WHERE `deleted_at` IS NULL'
        );

        $detail = [
            'id' => $data[0]['id'],
            'title' => $data[0]['title'],
            'summary' => $data[0]['summary'],
            'cover_photo_url' => $data[0]['cover_photo_url'],
            'content' => $data[0]['content'],
            'author_id' => $data[0]['author_id'],
            'is_published' => $data[0]['is_published'],
            'date' => $data[0]['date'],
            'is_featured' => $data[0]['is_featured'],
            'views' => $data[0]['views'],
            'authors' => $authors
        ];

        view('posts/detail.php', $detail);
    }

    public function find()
    {
        $request = escapeString([
            'keyword' => get('keyword'),
        ]);

        $keyword = $request['keyword'];

        $filter = ' AND (`title` LIKE \'%'.$keyword.'%\' OR `summary` LIKE \'%'.$keyword.'%\')';

        $data = getData(
            'SELECT
                P.id, 
                P.title, 
                P.summary, 
                P.cover_photo_url, 
                P.author_id, 
                COALESCE(A.full_name) AS author,
                IF (P.is_published = 1, \'Yes\', \'No\') AS is_published, 
                P.date, 
                IF (P.is_featured = 1, \'Yes\', \'No\') AS is_featured,
                P.views
            FROM post AS P
            LEFT JOIN author AS A ON A.id = P.author_id
            WHERE 
                P.deleted_at IS NULL
                '.$filter.'
            ORDER BY P.id DESC'
        );
        if (count($data) > 0) {
            return successfulResponse($data);
        }

        return errorResponse(['No results found.']);
    }

    public function delete()
    {
        $request = escapeString([
            'id' => get('id')
        ]);

        $id = $request['id'];

        executeQuery(
            'UPDATE `post`
            SET
                `deleted_at` = NOW(),
                `updated_at` = NOW()
            WHERE `id` = '.$id
        );

        return successfulResponse('Deleted');
    }
}
