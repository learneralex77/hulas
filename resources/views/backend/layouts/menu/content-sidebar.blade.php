<li class="{{ request()->is('dashboard*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <i class="nav-main-link-icon fa fa-tachometer-alt"></i>
        <span class="nav-main-link-name">Dashboard</span>
    </a>
</li>

<li class="{{ request()->is('menus*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('menus*') ? 'active' : '' }}" href="{{ route('menus.index') }}">
        <i class="nav-main-link-icon fa fa-list"></i>
        <span class="nav-main-link-name">Menu Management</span>
    </a>
</li>

<li class="{{ request()->is('pages*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('pages*') ? 'active' : '' }}" href="{{ route('pages.index') }}">
        <i class="nav-main-link-icon fa fa-file-alt"></i>
        <span class="nav-main-link-name">Pages</span>
    </a>
</li>

<li class="{{ request()->is('galleries*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('galleries*') ? 'active' : '' }}" href="{{ route('galleries.index') }}">
        <i class="nav-main-link-icon fa fa-images"></i>
        <span class="nav-main-link-name">Galleries</span>
    </a>
</li>

<li class="{{ request()->is('sliders*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('sliders*') ? 'active' : '' }}" href="{{ route('sliders.index') }}">
        <i class="nav-main-link-icon fa fa-sliders-h"></i>
        <span class="nav-main-link-name">Sliders</span>
    </a>
</li>

<li class="{{ request()->is('popups*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('popups*') ? 'active' : '' }}" href="{{ route('popups.index') }}">
        <i class="nav-main-link-icon fa fa-window-restore"></i>
        <span class="nav-main-link-name">Popups</span>
    </a>
</li>

<li class="{{ request()->is('partners*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('partners*') ? 'active' : '' }}" href="{{ route('partners.index') }}">
        <i class="nav-main-link-icon fa fa-handshake"></i>
        <span class="nav-main-link-name">Partners</span>
    </a>
</li>

<li class="{{ request()->is('departments*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('departments*') ? 'active' : '' }}" href="{{ route('departments.index') }}">
        <i class="nav-main-link-icon fa fa-building"></i>
        <span class="nav-main-link-name">Departments</span>
    </a>
</li>

<li class="{{ request()->is('designations*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('designations*') ? 'active' : '' }}" href="{{ route('designations.index') }}">
        <i class="nav-main-link-icon fa fa-id-badge"></i>
        <span class="nav-main-link-name">Designations</span>
    </a>
</li>

<li class="{{ request()->is('teams*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('teams*') ? 'active' : '' }}" href="{{ route('teams.index') }}">
        <i class="nav-main-link-icon fa fa-users"></i>
        <span class="nav-main-link-name">Team Management</span>
    </a>
</li>

<li class="{{ request()->is('downloads*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('downloads*') ? 'active' : '' }}" href="{{ route('downloads.index') }}">
        <i class="nav-main-link-icon fa fa-file-download"></i>
        <span class="nav-main-link-name">Downloads</span>
    </a>
</li>

<li class="{{ request()->is('quick-links*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('quick-links*') ? 'active' : '' }}" href="{{ route('quick-links.index') }}">
        <i class="nav-main-link-icon fa fa-link"></i>
        <span class="nav-main-link-name">Quick Links</span>
    </a>
</li>

<li class="{{ request()->is('news-event-categories*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('news-event-categories*') ? 'active' : '' }}" href="{{ route('news-event-categories.index') }}">
        <i class="nav-main-link-icon fa fa-tags"></i>
        <span class="nav-main-link-name">News & Event Categories</span>
    </a>
</li>

<li class="{{ request()->is('publications*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('publications*') ? 'active' : '' }}" href="{{ route('publications.index') }}">
        <i class="nav-main-link-icon fa fa-newspaper"></i>
        <span class="nav-main-link-name">Publications</span>
    </a>
</li>

<li class="{{ request()->is('contact-us*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('contact-us*') ? 'active' : '' }}" href="{{ route('contact-us.index') }}">
        <i class="nav-main-link-icon fa fa-envelope"></i>
        <span class="nav-main-link-name">Contact Inquiries</span>
    </a>
</li>

<li class="{{ request()->is('backend/grievances*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('backend/grievances*') ? 'active' : '' }}" href="{{ route('grievances.index') }}">
        <i class="nav-main-link-icon fa fa-clipboard-list"></i>
        <span class="nav-main-link-name">Grievances</span>
    </a>
</li>

<li class="{{ request()->is('districts*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('districts*') ? 'active' : '' }}" href="{{ route('districts.index') }}">
        <i class="nav-main-link-icon fa fa-map-marker-alt"></i>
        <span class="nav-main-link-name">Districts</span>
    </a>
</li>

<li class="{{ request()->is('zones*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('zones*') ? 'active' : '' }}" href="{{ route('zones.index') }}">
        <i class="nav-main-link-icon fa fa-globe"></i>
        <span class="nav-main-link-name">Zones</span>
    </a>
</li>

<li class="{{ request()->is('agent-forms*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('agent-forms*') ? 'active' : '' }}" href="{{ route('agent-forms.index') }}">
        <i class="nav-main-link-icon fa fa-user-plus"></i>
        <span class="nav-main-link-name">Agent Forms</span>
    </a>
</li>

<li class="{{ request()->is('branches*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('branches*') ? 'active' : '' }}" href="{{ route('branches.index') }}">
        <i class="nav-main-link-icon fa fa-code-branch"></i>
        <span class="nav-main-link-name">Branches</span>
    </a>
</li>

<li class="{{ request()->is('services*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('services*') ? 'active' : '' }}" href="{{ route('services.index') }}">
        <i class="nav-main-link-icon fa fa-cogs"></i>
        <span class="nav-main-link-name">Services</span>
    </a>
</li>

<li class="{{ request()->is('agent-details*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('agent-details*') ? 'active' : '' }}" href="{{ route('agent-details.index') }}">
        <i class="nav-main-link-icon fa fa-address-card"></i>
        <span class="nav-main-link-name">Agent Details</span>
    </a>
</li>

<li class="{{ request()->is('become-an-agent*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('become-an-agent*') ? 'active' : '' }}" href="{{ route('become-an-agent.index') }}">
        <i class="nav-main-link-icon fa fa-user-tie"></i>
        <span class="nav-main-link-name">Become an Agent</span>
    </a>
</li>

<li class="{{ request()->is('about-us*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('about-us*') ? 'active' : '' }}" href="{{ route('about-us.index') }}">
        <i class="nav-main-link-icon fa fa-info-circle"></i>
        <span class="nav-main-link-name">About Us</span>
    </a>
</li>

<li class="{{ request()->is('settings*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->is('settings*') ? 'active' : '' }}" href="{{ route('settings.index') }}">
        <i class="nav-main-link-icon fa fa-cog"></i>
        <span class="nav-main-link-name">Settings</span>
    </a>
</li>

<li class="{{ request()->routeIs('forex-rate.index*') ? 'open' : '' }}">
    <a class="nav-main-link {{ request()->routeIs('forex-rate.index*') ? 'active' : '' }}" href="{{ route('forex-rate.index') }}">
        <i class="nav-main-link-icon fa fa-money-bill"></i>
        <span class="nav-main-link-name">Forex Rates</span>
    </a>
</li>

