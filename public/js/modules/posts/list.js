const list = {

    create() {
        window.location = "/posts/create";
    },

    find() {
        loading.show();

        http.get(
            '/posts/find',
            {
                keyword: el.val("#keyword")
            }
        ).done(function(response){
            alert.dismiss();
            dataTable.tabulator.setData(response.values);
            dataTable.show();
            loading.hide();
        }).catch(function(response){
            alert.error(response.errors);
            dataTable.hide();
            loading.hide();
        });
    },

    setDataTableColumns() {
        const that = this;

        const deleteIcon = function(cell, formatterParams){
            return "<i class='fa fa-times color-red'></i>";
        };

        const editIcon = function(cell, formatterParams){
            return "<i class='fa fa-pencil'></i>";
        };

        const columns = [
            {
                title    : "ID",
                field    : "id",
                formatter: "plaintext",
                width    : 50
            },
            {
                title    : "Title",
                field    : "title",
                formatter: "plaintext",
                width    : 200
            },
            {
                title    : "Author",
                field    : "author",
                formatter: "plaintext",
                width    : 150
            },
            {
                title    : "Date",
                field    : "date",
                align    : "center",
                formatter: "plaintext",
                width    : 100
            },
            {
                title    : "Published",
                field    : "is_published",
                align    : "center",
                formatter: "plaintext",
                width    : 110
            },
            {
                title    : "Featured",
                field    : "is_featured",
                align    : "center",
                formatter: "plaintext",
                width    : 110
            },
            {
                title    : "Views",
                field    : "views",
                align    : "center",
                formatter: "plaintext",
                width    : 100
            },
            {
                title    : "Summary",
                field    : "summary",
                formatter: "plaintext",
                width    : 0
            },
            {
                formatter : editIcon,
                width     : 40,
                resizable : false,
                align     : "center",
                headerSort: false,
                cellClick : function(e, cell){ that.edit(e, cell); }
            },
            {
                formatter : deleteIcon,
                width     : 40,
                resizable : false,
                align     : "center",
                headerSort: false,
                cellClick : function(e, cell){ that.delete(e, cell); }
            },
        ];
        dataTable.setColumns(columns);
    },

    edit(e, cell) {
        window.location = "/posts/edit/" + cell.getRow().getData().id;
    },

    delete(e, cell) {
        dataTable.preventRowClick();

        let that = this;

        modalConfirm.show({
            message: "Are you sure do you want to delete <strong>" + cell.getRow().getData().title + "</strong>?",
            confirmYes: function() {
                that.deleteConfirmed(cell)
            }
        });
    },

    deleteConfirmed(cell) {
        http.get(
            '/posts/delete',
            {
                id: cell.getRow().getData().id,
            }
        ).done(function(response){
            dataTable.tabulator.deleteRow(cell.getRow().getIndex());
            alert.success("<strong>" + cell.getRow().getData().title + "</strong> has been deleted.");
            loading.hide();
        }).catch(function(response){
            alert.error(response.errors);
            loading.hide();
        });
    }
};

list.setDataTableColumns();
list.find();