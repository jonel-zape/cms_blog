let http = {

    method: '',
    url: '',
    data: {},
    doneCallBack: {},
    failCallBack: {},
    options: { dataType: 'json' },

    get(url, data) {
        this.method = 'GET';
        this.url = url;
        this.data = data;

        return this;
    },

    post(url, data, options = null) {
        this.method = 'POST';
        this.url = url;
        this.data = data;

        if (options != null) {
            this.options = options
        } else {
            this.options = { dataType: 'json' }
        }

        return this;
    },

    done(callback) {
        this.doneCallBack = callback;

        return this;
    },

    catch(callback) {
        this.failCallBack = callback;
        this.request(this.method, this.url, this.data, this.doneCallBack, this.failCallBack);
    },

    request(method, url, data, doneCallBack, failCallBack) {
        $.ajax({
            method: method,
            url: url,
            headers: { 'X-USER-TOKEN': window.token },
            data: data,
            ...this.options
        }).done(function(response) {
            doneCallBack(response);
        }).fail(function(response) {
            let failResponse = {errors: ['Invalid request.']};
            if (typeof response.responseJSON != 'undefined' && response.responseJSON.hasOwnProperty('errors')) {
                failResponse = response.responseJSON;
            }

            if (response.status == 401) {
                window.alert('Unauthorized. Please login.');
                window.location = '/auth/logout';
            }

            failCallBack(failResponse);
        });
    }
};
