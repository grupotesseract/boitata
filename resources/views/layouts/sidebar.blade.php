<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/favicon-96.png" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name}}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        
        <hr style="border-top: 1px solid #222d32;">

        <ul class="sidebar-menu">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
