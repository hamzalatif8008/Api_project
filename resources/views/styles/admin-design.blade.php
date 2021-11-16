<style type="text/css">
.col-sm-6 p{
    text-align: center;
}
    #sidebar-menu ul li a.active {
    color: #fff;
    background: {{$gs->colors == null ? '#0165cbc2':$gs->colors.'c2'}};
    }
.sidebar-menu-body {
    background-color: {{$gs->colors == null ? '#0165cbc9':$gs->colors.'c9'}};
}
#sidebar-menu ul.profile ul.profile-submenu li:hover {
    background: {{$gs->colors == null ? '#0165cb66':$gs->colors.'66'}};
}
#sidebar-menu ul li a:hover {
    background: {{$gs->colors == null ? '#0165cb66':$gs->colors.'66'}};
}
#sidebar-menu ul.components ul li a:hover {background-color:{{$gs->colors == null ? '#0165cb66':$gs->colors.'66'}};}
.list-unstyled.submenu li{background-color: {{$gs->colors == null ? '#0165cb66':$gs->colors.'66'}};}
.add-product-box {
    border-top: 3px solid {{$gs->colors == null ? '#0165cbc9':$gs->colors.'c9'}};
}
.dataTables_wrapper .dataTables_filter input.form-control:focus {
    border-bottom: 1px solid {{$gs->colors == null ? '#0165cb':$gs->colors}};
}
table.table.products.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child::before {
    border: 2px solid {{$gs->colors == null ? '#0165cb':$gs->colors}};
    background-color: {{$gs->colors == null ? '#0165cb':$gs->colors}};
}
table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before {
    background-color: {{$gs->colors == null ? '#0165cb':$gs->colors}};
}
.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span,
.pagination > .active > span:focus,
.pagination > .active > span:hover {
    background-color: {{$gs->colors == null ? '#0165cb':$gs->colors}};
    border-color: {{$gs->colors == null ? '#0165cb':$gs->colors}};
}
.dataTables_wrapper .dataTables_length select.form-control:focus, 
.dataTables_wrapper .dataTables_filter input.form-control:focus {
    border-bottom: 1px solid {{$gs->colors == null ? '#0165cb':$gs->colors}};
}
.slider-add{background-color: {{$gs->colors == null ? '#0165cb':$gs->colors}};}
</style>
