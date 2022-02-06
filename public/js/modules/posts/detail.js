const detail = {
    save() {
        loading.show()
        const files = $('#file_select')[0].files[0]

        if (files === undefined) {
            this.saveDetails()
            return
        }

        let formData = new FormData()
        formData.append('image', files)

        const that = this

        http.post(
            '/upload/image',
            formData,
            {
                contentType: false,
                processData: false
            }
        ).done(function(response){
            if (response.values.uploaded) {
                that.saveDetails(response.values.uploaded)
            } else {
                alert.error(['Photo Not Uploaded'])
                loading.hide()
            }
        }).catch(function(response){
            alert.error(response.errors)
            loading.hide()
        })
    },

    saveDetails(photoUrl = '') {
        http.post(
            '/posts/save',
            {
                id : el.val("#id"),
                title : el.val("#title"),
                summary: el.val("#summary"),
                cover_photo_url: photoUrl,
                content: CKEDITOR.instances.content.getData(),
                author_id: el.val("#author_id"),
                is_published: el.checkbox.isChecked("#is_published") ? 1 : 0,
                date: el.val("#date"),
                is_featured: el.checkbox.isChecked("#is_featured") ? 1 : 0
            }
        ).done(function(response){
            loading.hide()
            alert.success('Saved')
            setTimeout(function() {
                window.location = `/posts/edit/${response.values.id}`
            }, 1500)
        }).catch(function(response){
            alert.error(response.errors)
            loading.hide()
        })
    }
}