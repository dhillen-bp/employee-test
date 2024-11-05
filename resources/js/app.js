import "./bootstrap";
import "flowbite";

import jQuery from "jquery";
window.$ = jQuery;
import "jquery-validation";
import { DataTable } from "simple-datatables";

document.addEventListener("DOMContentLoaded", () => {
    const departmentTable = document.getElementById("department-table");
    if (departmentTable) {
        // Inisialisasi tabel dengan DataTable
        const dataTable = new DataTable(departmentTable, {
            searchable: true,
            sortable: true,
            paging: true,
            perPage: 10,
            perPageSelect: [10, 15, 20, 25],
        });
    }
});


