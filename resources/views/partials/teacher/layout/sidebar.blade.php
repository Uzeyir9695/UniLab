<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">მასწავლებელი</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('teacher.questions.create') }}" class="nav-link">
                        <p>
                            კითხვების დამატება
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.questions.index') }}" class="nav-link">
                        <p>
                            კითხვების ლისტი
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.tests.create') }}" class="nav-link">
                        <p>
                            ტესტის დამატება
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.tests.index') }}" class="nav-link">
                        <p>
                            ტესტების ლისტი
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.subjects.index') }}" class="nav-link">
                        <p>
                            საგნის დამატება
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.groups.index') }}" class="nav-link">
                        <p>
                            ჯგუფის დამატება
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>