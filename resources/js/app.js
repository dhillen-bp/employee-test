import "./bootstrap";
import "flowbite";

import jQuery from "jquery";
window.$ = jQuery;

import "jquery-validation";

import select2 from 'select2';
select2($);

import { DataTable } from "simple-datatables";

document.addEventListener("DOMContentLoaded", () => {
    const isDataTable = document.getElementById("data-table");
    if (isDataTable) {
        // Inisialisasi tabel dengan DataTable
        const dataTable = new DataTable(isDataTable, {
            searchable: true,
            sortable: true,
            paging: true,
            perPage: 10,
            perPageSelect: [10, 15, 20, 25],
        });
    }
});

