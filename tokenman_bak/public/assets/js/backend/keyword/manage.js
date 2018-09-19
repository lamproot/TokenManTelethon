define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'keyword/manage/index',
                    add_url: 'auth/admin/add',
                    edit_url: 'keyword/manage/edit',
                    del_url: 'auth/admin/del',
                    multi_url: 'auth/admin/multi',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                columns: [
                    [
                        //{field: 'state', checkbox: true, },
                        {field: 'id', title: 'ID'},
                        {field: 'cmd', title: '回复命令'},
                        {field: 'type', title: '类型', searchList: {1: '普通消息类型', 2:'code邀请类型', 3:'图文回复类型', 4:'文件类型',5:'图文连续类型'}},
                        {field: 'content', title: '回复内容', visible: false},
                        {field: 'created_at', title: __('Createtime'), formatter: Table.api.formatter.datetime},
                        // {field: 'username', title: __('Username')},
                        // {field: 'nickname', title: __('Nickname')},
                        // {field: 'groups_text', title: __('Group'), operate:false, formatter: Table.api.formatter.label},
                        // {field: 'email', title: __('Email')},
                        // {field: 'status', title: __("Status"), formatter: Table.api.formatter.status},
                        // {field: 'logintime', title: __('Login time'), formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: function (value, row, index) {
                            // if(row.id == Config.admin.id){
                            //     return '';
                            // }
                            return Table.api.formatter.operate.call(this, value, row, index);
                        }}
                    ]
                ],
                search: false
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Form.api.bindevent($("form[role=form]"));
        },
        edit: function () {
            Form.api.bindevent($("form[role=form]"));
        }
    };
    return Controller;
});
