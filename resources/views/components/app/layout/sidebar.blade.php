<aside {{ $attributes->class(['app-sidebar shadow']) }} data-bs-theme="dark">

    <x-app.layout.sidebar.brand/>


    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper" data-overlayscrollbars="host">
        <div class="os-size-observer os-size-observer-appear">
            <div class="os-size-observer-listener ltr"></div>
        </div>

        <div data-overlayscrollbars-viewport="scrollbarHidden"
             style="
             margin: -16px -16px -16px -8px;
             top: -8px;
             right: auto;
             left: -8px;
             width: calc(100% + 16px);
             padding-bottom: 10rem;
             overflow-y: scroll;">

            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                    data-accordion="false">

                    <div class="sidebar-back mb-4">

                    </div>




                    <x-app.layout.sidebar.item
                        text="Dashboard"
                        icon="bi bi-speedometer"
                        route="dashboard"
                        class="no-border"
                    />




                    <x-app.layout.sidebar.header
                        text="Verwaltung"
                        icon="fas fa-gavel"

                    />

                    <x-app.layout.sidebar.item
                        text="Gesetze"
                        icon="fas fa-scale-balanced"
                        route="laws"

                    />

                    <x-app.layout.sidebar.item
                        text="Tatbestände"
                        icon="fas fa-section"
                        route="allegations"
                    />

                    <x-app.layout.sidebar.header
                        text="Export"
                        icon="fas fa-download"
                    />

                    <x-app.layout.sidebar.item
                        text="Bußgeldkatalog"
                        icon="fas fa-file-pdf"
                        route="catalogue"
                    />

                    <x-app.layout.sidebar.item
                        text="OWI21 Datei"
                        icon="fas fa-file-csv"
                        route="export"
                    />


                    {{--                    <x-app.layout.sidebar.item--}}
                    {{--                        text="Tests"--}}
                    {{--                        icon="bi bi-speedometer"--}}
                    {{--                        route="adminTest"--}}
                    {{--                        class="no-border"--}}
                    {{--                    />--}}




                    <x-app.layout.sidebar.header text="ADMINISTRATION" can="admin" class="admin mt-4"/>
                    <x-app.layout.sidebar.item
                        class="admin"
                        text="Konfiguration"
                        icon="fas fa-wrench"
                        route="configurations"
{{--                        can="admin.system.convention"--}}
                    />



                </ul>

            </nav>
        </div>
        <div
            class="os-scrollbar os-scrollbar-horizontal os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-cornerless os-scrollbar-unusable os-scrollbar-auto-hide-hidden os-theme-light">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%;"></div>
            </div>
        </div>
        <div
            class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-visible os-scrollbar-cornerless os-scrollbar-auto-hide-hidden os-theme-light">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 86.949%; transform: translateY(0%);"></div>
            </div>
        </div>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->
