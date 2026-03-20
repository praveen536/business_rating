// =========================
// 8. assets/js/app.js (FINAL CLEAN - SINGLE BLOCK)
// =========================
$(document).ready(function () {

    function showToast(msg, type = "success") {
        const bg = type === "error" ? "bg-danger" : "bg-success";
        const toast = `<div class="toast text-white ${bg} show position-fixed bottom-0 end-0 m-3">
            <div class="d-flex"><div class="toast-body">${msg}</div></div>
        </div>`;
        $('body').append(toast);
        setTimeout(() => $('.toast').remove(), 3000);
    }

    function toggleLoader(show) {
        if (show) {
            $('body').append('<div id="loader" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.3);z-index:9999;display:flex;align-items:center;justify-content:center;color:#fff;">Loading...</div>');
        } else { $('#loader').remove(); }
    }

    function loadBusinesses() {
        $.post("../ajax/business.php", { action: "fetch" }, function (data) {
            data = JSON.parse(data || '[]');
            let html = "";

            data.forEach(b => {
                html += `
                <tr>
                    <td>${b.id}</td>
                    <td>${b.name}</td>
                    <td>${b.address}</td>
                    <td>${b.phone}</td>
                    <td>${b.email}</td>
                    <td>
                        <button onclick="openEdit(${b.id},'${b.name}','${b.address}','${b.phone}','${b.email}')" class="btn btn-warning btn-sm">Edit</button>
                        <button onclick="deleteBusiness(${b.id})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                    <td>
                        <div class="raty" data-id="${b.id}" data-score="${b.avg_rating}"></div>
                    </td>
                </tr>`;
            });

            $('#tableBody').html(html);

            $('.raty').raty({
                readOnly: true,
                half: true,
                score: function () { return $(this).attr('data-score'); },
                click: function (score) {
                    $('#business_id').val($(this).data('id'));
                    $('#ratingInput').raty('score', score);
                    $('#ratingModal').modal('show');
                }
            });
        });
    }

    // ADD
    $('#addBusinessForm').on('submit', function (e) {
        e.preventDefault();
        if (!$('#name').val()) return showToast('Name required', 'error');

        toggleLoader(true);
        $.post("../ajax/business.php", {
            action: 'add',
            name: $('#name').val(),
            address: $('#address').val(),
            phone: $('#phone').val(),
            email: $('#email').val()
        }).done(function () {
            $('#addModal').modal('hide');
            $('#addBusinessForm')[0].reset();
            showToast('Added successfully');
            loadBusinesses();
        }).always(() => toggleLoader(false));
    });

    // UPDATE
    $('#editBusinessForm').on('submit', function (e) {
        e.preventDefault();
        toggleLoader(true);

        $.post("../ajax/business.php", {
            action: 'update',
            id: $('#edit_id').val(),
            name: $('#edit_name').val(),
            address: $('#edit_address').val(),
            phone: $('#edit_phone').val(),
            email: $('#edit_email').val()
        }).done(function () {
            $('#editModal').modal('hide');
            showToast('Updated successfully');
            loadBusinesses();
        }).always(() => toggleLoader(false));
    });

    // RATING
    $('#ratingForm').on('submit', function (e) {
        e.preventDefault();
        if (!$('#r_name').val() || !$('#r_email').val()) return showToast('Name & Email required', 'error');

        toggleLoader(true);
        $.post("../ajax/rating.php", {
            action: 'rate',
            business_id: $('#business_id').val(),
            name: $('#r_name').val(),
            email: $('#r_email').val(),
            phone: $('#r_phone').val(),
            rating: $('input[name=rating]').val()
        }).done(function () {
            $('#ratingModal').modal('hide');
            $('#ratingForm')[0].reset();
            showToast('Rating submitted');
            loadBusinesses();
        }).always(() => toggleLoader(false));
    });

    // helpers
    window.openEdit = function (id, name, address, phone, email) {
        $('#edit_id').val(id);
        $('#edit_name').val(name);
        $('#edit_address').val(address);
        $('#edit_phone').val(phone);
        $('#edit_email').val(email);
        $('#editModal').modal('show');
    };

    window.deleteBusiness = function (id) {
        if (!confirm('Delete?')) return;
        toggleLoader(true);
        $.post("../ajax/business.php", { action: 'delete', id: id })
            .done(function () { showToast('Deleted'); loadBusinesses(); })
            .always(() => toggleLoader(false));
    };

    // initial load (ONLY ONCE)
    loadBusinesses();   
    // init rating input once
    $('#ratingInput').raty({ half: true, scoreName: 'rating' });


});
