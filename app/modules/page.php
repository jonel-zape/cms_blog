<?php

class Page
{
    public function index()
    {
        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` IN("custom_link_1_label","custom_link_1_url","custom_link_2_label","custom_link_2_url","custom_link_3_label","custom_link_3_url","facebook_url","instagram_url","other_url","site_description","twitter_url")');

        $metas = [
            "custom_link_1_label" => ["value" => "", "status" => 0],
            "custom_link_1_url" => ["value" => "", "status" => 0],
            "custom_link_2_label" => ["value" => "", "status" => 0],
            "custom_link_2_url" => ["value" => "", "status" => 0],
            "custom_link_3_label" => ["value" => "", "status" => 0],
            "custom_link_3_url" => ["value" => "", "status" => 0],
            "facebook_url" => ["value" => "", "status" => 0],
            "instagram_url" => ["value" => "", "status" => 0],
            "other_url" => ["value" => "", "status" => 0],
            "site_description" => ["value" => "", "status" => 0],
            "twitter_url" => ["value" => "", "status" => 0]
        ];

        for ($i = 0; $i < count($data); $i++) {
            if (isset($metas[$data[$i]['key']])) {
                $metas[$data[$i]['key']]['value'] = $data[$i]['value'];
                $metas[$data[$i]['key']]['status'] = $data[$i]['status'];
            }
        }

        view('page.php', $metas);
    }

    public function savedescription()
    {
        $request = escapeString([
            'site_description' => post('site_description')
        ]);

        $siteDescription = trim($request['site_description']);

        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "site_description"');

        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = 1, `value` = "'.$siteDescription.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "site_description", "'.$siteDescription.'", 1)');
        }

        return successfulResponse([]);
    }

    public function savesocialmedialinks()
    {
        $request = escapeString([
            'facebook_status' => post('facebook_status'),
            'twitter_status' => post('twitter_status'),
            'instagram_status' => post('instagram_status'),
            'other_status' => post('other_status'),
            'facebook_url' => post('facebook_url'),
            'twitter_url' => post('twitter_url'),
            'instagram_url' => post('instagram_url'),
            'other_url' => post('other_url')
        ]);

        $facebookStatus = trim($request['facebook_status']);
        $twitterStatus = trim($request['twitter_status']);
        $instagramStatus = trim($request['instagram_status']);
        $otherStatus = trim($request['other_status']);
        $facebookUrl = trim($request['facebook_url']);
        $twitterUrl = trim($request['twitter_url']);
        $instagramUrl = trim($request['instagram_url']);
        $otherUrl = trim($request['other_url']);

        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "facebook_url"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$facebookStatus.'", `value` = "'.$facebookUrl.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "facebook_url", "'.$facebookUrl.'", "'.$facebookStatus.'")');
        }

        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "twitter_url"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$twitterStatus.'", `value` = "'.$twitterUrl.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "twitter_url", "'.$twitterUrl.'", "'.$twitterStatus.'")');
        }

        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "instagram_url"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$instagramStatus.'", `value` = "'.$instagramUrl.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "instagram_url", "'.$instagramUrl.'", "'.$instagramStatus.'")');
        }

        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "other_url"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$otherStatus.'", `value` = "'.$otherUrl.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "other_url", "'.$otherUrl.'", "'.$otherStatus.'")');
        }

        return successfulResponse([]);
    }

    public function savecustomlinks()
    {
        $request = escapeString([
            'custom_link_1_status' => post('custom_link_1_status'),
            'custom_link_1_label' => post('custom_link_1_label'),
            'custom_link_1_url' => post('custom_link_1_url'),
            'custom_link_2_status' => post('custom_link_2_status'),
            'custom_link_2_label' => post('custom_link_2_label'),
            'custom_link_2_url' => post('custom_link_2_url'),
            'custom_link_3_status' => post('custom_link_3_status'),
            'custom_link_3_label' => post('custom_link_3_label'),
            'custom_link_3_url' => post('custom_link_3_url')
        ]);

        $custom_link_1_status = trim($request['custom_link_1_status']);
        $custom_link_1_label = trim($request['custom_link_1_label']);
        $custom_link_1_url = trim($request['custom_link_1_url']);
        $custom_link_2_status = trim($request['custom_link_2_status']);
        $custom_link_2_label = trim($request['custom_link_2_label']);
        $custom_link_2_url = trim($request['custom_link_2_url']);
        $custom_link_3_status = trim($request['custom_link_3_status']);
        $custom_link_3_label = trim($request['custom_link_3_label']);
        $custom_link_3_url = trim($request['custom_link_3_url']);

        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "custom_link_1_url"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$custom_link_1_status.'", `value` = "'.$custom_link_1_url.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "custom_link_1_url", "'.$custom_link_1_url.'", "'.$custom_link_1_status.'")');
        }
        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "custom_link_1_label"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$custom_link_1_status.'", `value` = "'.$custom_link_1_label.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "custom_link_1_label", "'.$custom_link_1_label.'", "'.$custom_link_1_status.'")');
        }

        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "custom_link_2_url"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$custom_link_2_status.'", `value` = "'.$custom_link_2_url.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "custom_link_2_url", "'.$custom_link_2_url.'", "'.$custom_link_2_status.'")');
        }
        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "custom_link_2_label"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$custom_link_2_status.'", `value` = "'.$custom_link_2_label.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "custom_link_2_label", "'.$custom_link_2_label.'", "'.$custom_link_2_status.'")');
        }

        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "custom_link_3_url"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$custom_link_3_status.'", `value` = "'.$custom_link_3_url.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "custom_link_3_url", "'.$custom_link_3_url.'", "'.$custom_link_3_status.'")');
        }
        $data = getData('SELECT * FROM meta WHERE `module` = "page" AND `key` = "custom_link_3_label"');
        if (count($data) > 0) {
            executeQuery('UPDATE meta SET `status` = "'.$custom_link_3_status.'", `value` = "'.$custom_link_3_label.'" WHERE id = '.$data[0]['id']);
        } else {
            executeQuery('INSERT INTO meta (`module`, `key`, `value`, `status`) VALUES ("page", "custom_link_3_label", "'.$custom_link_3_label.'", "'.$custom_link_3_status.'")');
        }

        return successfulResponse([]);
    }
}