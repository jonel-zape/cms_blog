<?php

class Authors
{
    public function index()
    {
        view('authors/list.php');
    }

    public function create()
    {
        $detail = [
            'id' => 0,
            'full_name' => '',
            'photo_url' => '',
            'about' => ''
        ];

        view('authors/detail.php', $detail);
    }

    public function save()
    {
        $request = escapeString([
            'id' => post('id'),
            'full_name' => post('full_name'),
            'photo_url' => post('photo_url'),
            'about' => post('about')
        ]);

        $id = trim($request['id']);
        $fullName = trim($request['full_name']);
        $photoUrl = trim($request['photo_url']);
        $about = trim($request['about']);

        $errors = [];

        if (strlen($fullName) < 1) {
            $errors[] = 'Full Name is required.';
        }

        if (count($errors) > 0) {
            return errorResponse($errors);
        }

        if ($id == 0) {
            executeQuery(
                'INSERT INTO `author` (
                    `full_name`,
                    `about`,
                    '.cancelIfEmpty($photoUrl, '`photo_url`').',
                    `created_by`                    
                ) VALUES (
                    \''.$fullName.'\',
                    \''.$about.'\',
                    '.cancelIfEmpty($photoUrl, '\''.$photoUrl.'\',').'
                    1
                )
            ');

            $newAuthor = getData('SELECT MAX(id) AS id FROM author');
            $id = $newAuthor[0]['id'];
        } else {
            executeQuery(
                'UPDATE `author`
                SET
                    `full_name` = \''.$fullName.'\',
                    `about` = \''.$about.'\',
                    '.cancelIfEmpty($photoUrl, '`photo_url` = \''.$photoUrl.'\',').'
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
                `full_name`,
                `photo_url`,
                `about`
            FROM `author`
            WHERE `id` = '.$id.'
        ');

        if (count($data) < 1) {
            view('404.php');
            return;
        }

        $detail = [
            'id' => $data[0]['id'],
            'full_name' => $data[0]['full_name'],
            'photo_url' => $data[0]['photo_url'],
            'about' => $data[0]['about']
        ];

        view('authors/detail.php', $detail);
    }

    public function find()
    {
        $request = escapeString([
            'keyword' => get('keyword'),
        ]);

        $keyword = $request['keyword'];

        $filter = ' AND (`full_name` LIKE \'%'.$keyword.'%\')';

        $data = getData(
            'SELECT
                `id`,
                `full_name`,
                `photo_url`
            FROM `author`
            WHERE
                `deleted_at` IS NULL'
                .$filter
        );
        if (count($data) > 0) {
            return successfulResponse($data);
        }

        return errorResponse(['No results found.']);
    }

    public function delete()
    {
        $request = escapeString([
            'id' => get('id'),
        ]);

        $id = $request['id'];

        executeQuery(
            'UPDATE `author`
            SET
                `deleted_at` = NOW(),
                `updated_at` = NOW()
            WHERE `id` = '.$id
        );

        return successfulResponse('Deleted');
    }
}
