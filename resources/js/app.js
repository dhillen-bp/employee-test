import "./bootstrap";
import "flowbite";

import jQuery from "jquery";
window.$ = jQuery;

import "jquery-validation";

// SELECT2
import select2 from 'select2';
select2($);

// FILEPOND
import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';

import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
FilePond.registerPlugin(FilePondPluginImagePreview);

window.FilePond = FilePond;

const inputElement = document.querySelector('input[type="file"].filepond');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

FilePond.create(inputElement).setOptions({
    server: {
        process: '/employee/upload',
        revert: '/employee/revert',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        }
    },
    allowMultiple: false,
});

// DATABLES
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


    // FILEPOND
});

