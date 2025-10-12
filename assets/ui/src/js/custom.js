// logout alert
const button = document.getElementById('logout_notif');

button.addEventListener('click', e =>{
    e.preventDefault();

    Swal.fire({
        text: "Apakah Anda yakin ingin keluar?",
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Keluar",
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
    });
});





"use strict";
var KTAppStockMobil = function () {
    var t, e;

    // handle delete row
    var initDelete = () => {
        t.querySelectorAll('[data-kt-ecommerce-product-filter="delete_row"]').forEach((el) => {
            el.addEventListener("click", function (ev) {
                ev.preventDefault();
                const row = ev.target.closest("tr"),
                      productName = row.querySelector('[data-kt-ecommerce-product-filter="product_name"]').innerText;

                Swal.fire({
                    text: "Are you sure you want to delete " + productName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            text: "You have deleted " + productName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then(() => {
                            e.row($(row)).remove().draw();
                        });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: productName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        });
                    }
                });
            });
        });
    };

    return {
        init: function () {
            t = document.querySelector("#tabel_stock_mobil");
            if (!t) return;

            // datatable
            e = $(t).DataTable({
                info: false,
                order: [],
                pageLength: 10,
                columnDefs: [
                    { orderable: false, targets: 0 },  // kolom No
                    { orderable: false, targets: -1 }, // kolom Actions
                    
                ]
            });

            // search
            document.querySelector('[data-kt-ecommerce-product-filter="search"]').addEventListener("keyup", function (ev) {
                e.search(ev.target.value).draw();
            });

            // filter status (optional, kalau lo pake dropdown status)
            let filterStatus = document.querySelector('[data-kt-ecommerce-product-filter="status"]');
            if (filterStatus) {
                filterStatus.addEventListener("change", function (ev) {
                    const val = ev.target.value;
                    if (val === "all") {
                        e.column(6).search("").draw();
                    } else {
                        e.column(6).search(val).draw();
                    }
                });
            }

            // init delete
            initDelete();
            e.on("draw", function () {
                initDelete();
            });
        }
    };
}();

// init pas DOM ready
KTUtil.onDOMContentLoaded(function () {
    KTAppStockMobil.init();
});

