const page = {
    saveDescription() {
        loading.show()

        http.post(
            '/page/savedescription',
            {
                site_description : el.val("#site_description")
            }
        ).done(function(response){
            alert.success('Site Description Saved')
            loading.hide()
        }).catch(function(response){
            alert.error(response.errors)
            loading.hide()
        })
    },

    saveSocialMediaLinks() {
        loading.show()
        http.post(
            '/page/savesocialmedialinks',
            {
                facebook_status: el.checkbox.isChecked("#social_links_facebook_status") ? 1 : 0,
                twitter_status: el.checkbox.isChecked("#social_links_twitter_status") ? 1 : 0,
                instagram_status: el.checkbox.isChecked("#social_links_instagram_status") ? 1 : 0,
                other_status: el.checkbox.isChecked("#social_links_other_status") ? 1 : 0,
                facebook_url: el.val("#social_links_facebook_url"),
                twitter_url: el.val("#social_links_twitter_url"),
                instagram_url: el.val("#social_links_instagram_url"),
                other_url: el.val("#social_links_other_url")
            }
        ).done(function(response){
            alert.success('Social Media Links Saved')
            loading.hide()
        }).catch(function(response){
            alert.error(response.errors)
            loading.hide()
        })
    },

    saveCustomLinks() {
        loading.show()
        http.post(
            '/page/savecustomlinks',
            {
                custom_link_1_status: el.checkbox.isChecked('#custom_link_1_status') ? 1 : 0,
                custom_link_1_label: el.val('#custom_link_1_label'),
                custom_link_1_url: el.val('#custom_link_1_url'),
                custom_link_2_status: el.checkbox.isChecked('#custom_link_2_status') ? 1 : 0,
                custom_link_2_label: el.val('#custom_link_2_label'),
                custom_link_2_url: el.val('#custom_link_2_url'),
                custom_link_3_status: el.checkbox.isChecked('#custom_link_3_status') ? 1 : 0,
                custom_link_3_label: el.val('#custom_link_3_label'),
                custom_link_3_url: el.val('#custom_link_3_url')
            }
        ).done(function(response){
            alert.success('Custom Links Saved')
            loading.hide()
        }).catch(function(response){
            alert.error(response.errors)
            loading.hide()
        })
    }
}