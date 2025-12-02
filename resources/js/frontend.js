import adminlte from 'admin-lte';

import '../../vendor/masmerise/livewire-toaster/resources/js';
import '@fortawesome/fontawesome-free/js/all';
import '../sass/app.scss';  //bootstrap styles
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


import $ from 'jquery';
window.jQuery = window.$ = $;

import DataTable from 'datatables.net-bs5';
window.DataTable = DataTable;

import 'datatables.net-buttons-bs5';
import 'datatables.net-select-bs5';
DataTable.ext.errMode = "throw";

import DOMPurify from 'dompurify';
window.DOMPurify = DOMPurify;
