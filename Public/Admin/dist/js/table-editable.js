var TableEditable = function () {

    return {

        //main function to initiate the module
        init: function () {


            var oTable = $('.editable').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, 50, 100, -1],
                    [5, 15, 20, 50, 100, "所有"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {

                    "sLengthMenu": "_MENU_ 条记录",
                    "sEmptyTable": "表中没有数据",
                    "sInfo": "显示从 _START_ 到 _END_  从 _TOTAL_ 记录中",
                    "sInfoEmpty": "显示 0 到 0 从 0 记录中",
                    "sInfoFiltered": "( 从 _MAX_ 记录中过滤)",
                    "sLoadingRecords": "加载中...",
                    "sProcessing": "处理中...",
                    "sSearch": "查找:",
                    "sZeroRecords": "没有匹配的结果",
                    "oPaginate": {
                        "sPrevious": "上一页",
                        "sNext": "下一页"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

        }

    };

}();