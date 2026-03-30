<div class="mt-8 flex-grow flex flex-col">
    <nav class="flex-1 px-2 space-y-1">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-slate-800 text-white' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <i class="fas fa-home mr-3"></i>
            Home
        </a>
        <a href="{{ route('scholarships.index') }}" class="{{ request()->routeIs('scholarships.*') ? 'bg-slate-800 text-white' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <i class="fas fa-graduation-cap mr-3"></i>
            Scholarships
        </a>
        <a href="{{ route('applications.index') }}" class="{{ request()->routeIs('applications.*') ? 'bg-slate-800 text-white' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <i class="fas fa-file-alt mr-3"></i>
            Applications
        </a>
        <a href="{{ route('compliance.index') }}" class="{{ request()->routeIs('compliance.*') ? 'bg-slate-800 text-white' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <i class="fas fa-clipboard-check mr-3"></i>
            Compliance
        </a>
        <a href="{{ route('notifications.index') }}" class="{{ request()->routeIs('notifications.*') ? 'bg-slate-800 text-white' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <i class="fas fa-bell mr-3"></i>
            Notifications
        </a>
    </nav>
</div>
