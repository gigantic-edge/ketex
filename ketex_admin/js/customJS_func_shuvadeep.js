$(function() {
    var clicked = false;
    $('.tvs-sync').find('a').on("click", function(e) {
        if (clicked === false) {
            clicked = true;
        } else {
            e.preventDefault();
        }
    });
    var rows_selected = [];
    var table = $('#m_celextable_3').DataTable({
        scrollY: "50vh",
        scrollX: !0,
        scrollCollapse: !0,
        'columnDefs': [
            {
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'render': function(data, type, full, meta) {
                    return data;
                }
            }
        ],
        'order': [[1, 'asc']],
        'rowCallback': function(row, data, dataIndex) {
            // Get row ID
            var rowId = data[0];

            // If row ID is in the list of selected row IDs
            if ($.inArray(rowId, rows_selected) !== -1) {
                $(row).find('input[type="checkbox"]').prop('checked', true);
                $(row).addClass('selected');
            }
        }
    });

    // Handle click on checkbox
    $('#m_celextable_3 tbody').on('click', 'input[type="checkbox"]', function(e) {
        var $row = $(this).closest('tr');

        // Get row data
        var data = table.row($row).data();

        // Get row ID
        var rowId = data[0];

        // Determine whether row ID is in the list of selected row IDs
        var index = $.inArray(rowId, rows_selected);

        // If checkbox is checked and row ID is not in list of selected row IDs
        if (this.checked && index === -1) {
            rows_selected.push(rowId);

            // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
        } else if (!this.checked && index !== -1) {
            rows_selected.splice(index, 1);
        }

        if (this.checked) {
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Update state of "Select all" control
        updateDataTableSelectAllCtrl(table);

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    // Handle click on table cells with checkboxes
    $('#m_celextable_3').on('click', 'tbody td, thead th:first-child', function(e) {
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    // Handle click on "Select all" control
    $('thead input[name="select_all"]', table.table().container()).on('click', function(e) {
        if (this.checked) {
            $('#m_celextable_3 tbody input[type="checkbox"]:not(:checked)').trigger('click');
        } else {
            $('#m_celextable_3 tbody input[type="checkbox"]:checked').trigger('click');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    // Handle table draw event
    table.on('draw', function() {
        // Update state of "Select all" control
        updateDataTableSelectAllCtrl(table);
    });

    $("form[name='frmGenerate']").validate({
        rules: {
            'check[]': {required: true},
        },
        messages: {
            'check[]': "Please check at least one to generate"
        }


    });
    $("form[name='frmGenerate']").on('submit', function(e) {

        var form = this;
        // Iterate over all checkboxes in the table
        table.$('input[type="checkbox"]').each(function() {
            // If checkbox doesn't exist in DOM
            if (!$.contains(document, this)) {
                // If checkbox is checked
                if (this.checked) {
                    // Create a hidden element 
                    $(form).append(
                            $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', this.name)
                            .val(this.value)
                            );
                }
            }
        });
        console.log($(form).serialize())
        // Remove added elements
        $('input[name="id\[\]"]', form).remove();


    });
    window.onload = function() {
        updateTime();
    };
});

//
// Updates "Select all" control in a data table
//
function updateDataTableSelectAllCtrl(table) {
    var $table = table.table().node();
    var $chkbox_all = $('tbody input[type="checkbox"]', $table);
    var $chkbox_checked = $('tbody input[type="checkbox"]:checked', $table);
    var chkbox_select_all = $('thead input[name="select_all"]', $table).get(0);

    // If none of the checkboxes are checked
    if ($chkbox_checked.length === 0) {
        chkbox_select_all.checked = false;
        if ('indeterminate' in chkbox_select_all) {
            chkbox_select_all.indeterminate = false;
        }

        // If all of the checkboxes are checked
    } else if ($chkbox_checked.length === $chkbox_all.length) {
        chkbox_select_all.checked = true;
        if ('indeterminate' in chkbox_select_all) {
            chkbox_select_all.indeterminate = false;
        }

        // If some of the checkboxes are checked
    } else {
        chkbox_select_all.checked = true;
        if ('indeterminate' in chkbox_select_all) {
            chkbox_select_all.indeterminate = true;
        }
    }
}

function updateTime() {
    var currentTime = new Date()
    console.log(currentTime);
    var hours = currentTime.getHours() < 10 ? "0" + currentTime.getHours() : currentTime.getHours();
    var minutes = currentTime.getMinutes() < 10 ? "0" + currentTime.getMinutes() : currentTime.getMinutes();
    var seconds = currentTime.getSeconds() < 10 ? "0" + currentTime.getSeconds() : currentTime.getSeconds();
    var time = hours + ":" + minutes + ":" + seconds;
    var date = currentTime.getFullYear() + '-' + (currentTime.getMonth() + 1) + '-' + currentTime.getDate();
    var dateTime = date + ' ' + time;
    document.getElementById('time_span').innerHTML = dateTime;
}

 ;;;;