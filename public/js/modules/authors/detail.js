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
            '/authors/save',
            {
                id : el.val("#id"),
                full_name : el.val("#full_name"),
                about : CKEDITOR.instances.about.getData(),
                photo_url: photoUrl
            }
        ).done(function(response){
            loading.hide()
            alert.success('Saved')
            setTimeout(function() {
                window.location = `/authors/edit/${response.values.id}`
            }, 1500)
        }).catch(function(response){
            alert.error(response.errors)
            loading.hide()
        })
    }
}