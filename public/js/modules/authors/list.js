const list = {

    create() {
        window.location = "/authors/create";
    },

    find() {
        loading.show();

        http.get(
            '/authors/find',
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
                title    : "Full Name",
                field    : "full_name",
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
        window.location = "/authors/edit/" + cell.getRow().getData().id;
    },

    delete(e, cell) {
        dataTable.preventRowClick();

        let that = this;

        modalConfirm.show({
            message: "Are you sure do you want to delete <strong>" + cell.getRow().getData().full_name + "</strong>?",
            confirmYes: function() {
                that.deleteConfirmed(cell)
            }
        });
    },

    deleteConfirmed(cell) {
        http.get(
            '/authors/delete',
            {
                id: cell.getRow().getData().id,
            }
        ).done(function(response){
            dataTable.tabulator.deleteRow(cell.getRow().getIndex());
            alert.success("<strong>" + cell.getRow().getData().full_name + "</strong> has been deleted.");
            loading.hide();
        }).catch(function(response){
            alert.error(response.errors);
            loading.hide();
        });
    }
};

list.setDataTableColumns();
list.find();