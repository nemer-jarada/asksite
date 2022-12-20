<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-2">{{ __('site.First site') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('site.Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ str_contains(request()->url(), 'categories') ? '' : 'collapsed' }} " href="#"
            data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true"
            aria-controls="collapseCategory">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ __('site.Categories') }}</span>
        </a>
        <div id="collapseCategory" class="collapse {{ str_contains(request()->url(), 'categories') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"
                    href="{{ route('admin.categories.index') }}">{{ __('site.All Categories') }}</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">{{ __('site.Add New') }}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuestion"
            aria-expanded="true" aria-controls="collapseQuestion">
            <i class="fa fa-question-circle"></i>
            <span>{{ __('site.Questions') }}</span>
        </a>
        <div id="collapseQuestion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item"
                    href="{{ route('admin.questions.index') }}">{{ __('site.All Questions') }}</a>
                <a class="collapse-item" href="{{ route('admin.questions.create') }}">{{ __('site.Add New') }}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsearticals"
            aria-expanded="true" aria-controls="collapsearticals">
            <i class="fa fa-book"></i>
            <span>Articals</span>
        </a>
        <div id="collapsearticals" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.articals.index') }}">All Articals</a>
                <a class="collapse-item" href="{{ route('admin.articals.create') }}">{{ __('site.Add New') }}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsequotes"
            aria-expanded="true" aria-controls="collapsequotes">
            <i class="fa fa-quote-left"></i>
            <span>Quotes</span>
        </a>
        <div id="collapsequotes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.quotes.index') }}">All Quotes</a>
                <a class="collapse-item" href="{{ route('admin.quotes.create') }}">{{ __('site.Add New') }}</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseanswers"
            aria-expanded="true" aria-controls="collapseanswers">
            <i class="fa fa-check-circle"></i>
            <span>Answers</span>
        </a>
        <div id="collapseanswers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.answers.index') }}">All Answers</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
