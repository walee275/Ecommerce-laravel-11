@props(['title'])
<!DOCTYPE html>
<html lang="en">

<x-backend.head :page_title="$title"/>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-backend.side-bar />

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-backend.navigation />
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <main class="container">

                    {{-- @yield('main-content') --}}

                    {{ $slot }}

                </main>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <x-backend.footer />

</body>

</html>
