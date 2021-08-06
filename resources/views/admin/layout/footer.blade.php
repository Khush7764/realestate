<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>My account</h5><hr/>
        <div class="p-2">
            <a href="{{ route('admin.profile') }}">Profile</a>
        </div>
        <div class="p-2">
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io">{{config('app.name')}}</a>.</strong> All rights reserved.
</footer>
