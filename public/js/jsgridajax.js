
var clients = [
    { "id": "1", "name": "erick", "details": "erick kurniawan" }
];

$("#jsGrid").jsGrid({
    width: "100%",
    height: "400px",

    inserting: true,
    editing: true,
    sorting: true,
    paging: true,

    controller: {
        loadData: function (filter) {
            return $.ajax({
                type: "GET",
                url: "http://laravel.dev:8000/ajaxproducts",
                data: filter,
                dataType: "json"
            });
        },
        insertItem: function (item) { },
        updateItem: function (item) { },
        deleteItem: function (item) { }
    },
    fields: [
        { name: "id", type: "text", width: 50 },
        { name: "name", type: "text", width: 150 },
        { name: "details", type: "text", width: 200 }
    ]
});
