<section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BERANDA</li>
        <li class="menu-sidebar {{ (Request::path() == 'admin') ? 'active' : '' }}"><a href="{{ url('/') }}"><i
                    class="fa fa-fw fa-home"></i> Home</span></a></li>
        <li class="menu-sidebar {{ (Request::path() == 'admin/profile') ? 'active' : '' }}"><a
                href="{{ url('/admin/profile') }}"><i class="fa fa-fw fa-user"></i> Manage Profile</span></a></li>

        <li class="header">MASTER DATA</li>

        <li class="treeview {{ (Request::segment(1) == 'master') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-fw fa-bullhorn"></i> <span>Master Data</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ (Request::path() == 'master/kategori') ? 'active' : '' }}
            menu-sidebar"><a href="{{ url('master/kategori') }}"><i class="fa fa-fw fa-newspaper-o"></i> Kategori</a>
                </li>

                <li class="{{ (Request::path() == 'master/buku') ? 'active' : '' }} menu-sidebar"><a
                        href="{{ url('master/buku') }}"><i class="fa fa-fw fa-newspaper-o"></i> Buku</a></li>

            </ul>
        </li>

        <li class="menu-sidebar {{ (Request::path() == 'pinjam-buku') ? 'active' : '' }}"><a
                href="{{ url('/pinjam-buku') }}"><i class="fa fa-fw fa-user"></i> Peminjaman All</span></a></li>

        <li class="menu-sidebar {{ (Request::path() == 'pengembalian-buku') ? 'active' : '' }}"><a
                href="{{ url('/pengembalian-buku') }}"><i class="fa fa-fw fa-user"></i> Pengembalian Buku</span></a>
        </li>

        @if(\Auth::user()->status == 1)
        <li class="menu-sidebar {{ (Request::path() == 'manage-anggota') ? 'active' : '' }}"><a
                href="{{ url('/manage-anggota') }}"><i class="fa fa-fw fa-user"></i> Manage Anggota</span></a></li>

        <li class="menu-sidebar {{ (Request::path() == 'laporan') ? 'active' : '' }}"><a href="{{ url('/laporan') }}"><i
                    class="fa fa-fw fa-user"></i> Laporan</span></a></li>
        @endif

        <li class="header">OTHER</li>

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span>
                Logout</span></a></li>


    </ul>
</section>
