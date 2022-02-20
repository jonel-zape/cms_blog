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
        let tags = []
        $(".checkbox_tag").each(function() {
            if (el.checkbox.isChecked($(this))) {
                tags.push($(this).attr('data_id'))
            }
        });

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
                is_featured: el.checkbox.isChecked("#is_featured") ? 1 : 0,
                tags: tags.join(',')
            }
        ).done(function(response){
            alert.success('Saved')
            setTimeout(function() {
                window.location = `/posts/edit/${response.values.id}`
            }, 1500)
        }).catch(function(response){
            alert.error(response.errors)
            loading.hide()
        })
    },

    addTag() {
        loading.show()
        http.post(
            '/posts/addtag',
            {
                tag : el.val("#new-tag")
            }
        ).done(function(response){
            loading.hide()
            $("#new-tag").val("")
            $("#tags-container").append(
                `<div class="col-md-2 margin-bottom-15">
                    <label class="checkbox-inline">
                        <input class="checkbox_tag" type="checkbox" data_id="${response.values.id}"> ${response.values.name}
                    </label>
                </div>`
            )
        }).catch(function(response){
            $("#add-tag-error").html(response.errors.join('<br>'))
            loading.hide()
        })
    },

    clearAdTagMessage() {
        $("#add-tag-error").html('')
    }
}