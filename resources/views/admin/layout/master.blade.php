<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">

    <style>
        .submenu {
            display: flex;
            align-items: center;
            padding: 0.4rem 0;
            font-size: 0.85rem;
            color: #d1d5db;
        }

        .submenu:hover {
            color: #818cf8;
        }
    </style>
    @yield('css')
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="flex min-h-screen" x-data="{ collapsed: false }">

        <!-- Sidebar -->
        <aside id="sidebar" :class="collapsed ? 'w-20' : 'w-72'"
            class="bg-[rgb(26,32,53)] flex-shrink-0 transition-all duration-300">
            <div class="p-6 flex items-center justify-between border-b border-gray-700">
                <img src="{{ asset('assets/images/aviation/logo1.png') }}" alt="Logo"
                    class="h-14 w-auto transition-all duration-300" x-show="!collapsed">
                <img src="{{ asset('assets/images/aviation/logo1.png') }}" alt="Logo" class="h-10 w-10 rounded"
                    x-show="collapsed">
            </div>

            <!-- Sidebar Nav -->
            <nav class="mt-6 space-y-1 text-white">

                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center py-2.5 px-6 rounded text-md space-x-3 group">
                    <i class="fa-solid fa-gauge group-hover:text-indigo-400"></i>
                    <span x-show="!collapsed">Dashboard</span>
                </a>

                {{-- Dropdown Component Helper --}}
                @php
                    function menuItem($title, $icon, $routes)
                    {
                        return '
            <div x-data="{ open: false }">
                <button @click="open=!open"
                        class="w-full flex items-center justify-between py-2.5 px-2 rounded group">
                    <div class="flex items-center space-x-3">
                        <i class="' .
                            $icon .
                            ' group-hover:text-indigo-400"></i>
                        <span x-show="!collapsed">' .
                            $title .
                            '</span>
                    </div>
                    <svg :class="{\'rotate-180\': open}" x-show="!collapsed"
                         class="w-4 h-4 transform transition-transform duration-300"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open && !collapsed" x-cloak
                     class="ml-5 mt-1  pl-2 space-y-1">
                     ' .
                            $routes .
                            '
                </div>
            </div>';
                    }
                @endphp

                {{-- Employees --}}
                {!! menuItem(
                    'Employees',
                    'fa-solid fa-users',
                    '
                                                        <a href="' .
                        route('employees.index') .
                        '" class="submenu">All Employees</a>
                                                        <a href="' .
                        route('employees.create') .
                        '" class="submenu">Add Employee</a>
                                                    ',
                ) !!}

                {{-- Roles --}}
                {!! menuItem(
                    'Roles',
                    'fa-solid fa-user-shield',
                    '
                                                        <a href="' .
                        route('roles.index') .
                        '" class="submenu">View Roles</a>
                                                        <a href="' .
                        route('roles.create') .
                        '" class="submenu">Add Role</a>
                                                    ',
                ) !!}

                {{-- Permissions --}}
                {!! menuItem(
                    'Permissions',
                    'fa-solid fa-key',
                    '
                                                        <a href="' .
                        route('permissions.index') .
                        '" class="submenu">View Permissions</a>
                                                        <a href="' .
                        route('permissions.create') .
                        '" class="submenu">Add Permission</a>
                                                    ',
                ) !!}

                {{-- Role-Permissions --}}
                <a href="{{ route('role-permissions.index') }}"
                    class="flex items-center py-2.5 px-6 rounded text-md space-x-3 group">
                    <i class="fa-solid fa-lock group-hover:text-indigo-400"></i>
                    <span x-show="!collapsed">Role Permissions</span>
                </a>

                {{-- Highlights --}}
                {{-- {!! menuItem(
                    'Highlights',
                    'fa-solid fa-star',
                    '
                                        <a href="' .
                        route('hero.index') .
                        '" class="submenu">View Highlights</a>
                                        <a href="' .
                        route('highlights.create') .
                        '" class="submenu">Add Highlight</a>
                                    ',
                ) !!} --}}


                {{-- Highlights --}}
                {{-- {!! menuItem(
                    'Highlights',
                    'fa-solid fa-star',
                    '
                                        <a href="' .
                        route('highlights.index') .
                        '" class="submenu">View Highlights</a>
                                        <a href="' .
                        route('highlights.create') .
                        '" class="submenu">Add Highlight</a>
                                    ',
                ) !!} --}}

                {{-- Course Phases --}}
                {{-- {!! menuItem(
                    'Course Phases',
                    'fa-solid fa-layer-group',
                    '
                                                        <a href="' .
                        route('course_phases.index') .
                        '" class="submenu">View Phases</a>
                                                        <a href="' .
                        route('course_phases.create') .
                        '" class="submenu">Add Phase</a>
                                                    ',
                ) !!} --}}

                {{-- Course Eligibilities --}}
                {{-- {!! menuItem(
                    'Course Eligibility',
                    'fa-solid fa-check-circle',
                    '
                                                        <a href="' .
                        route('course_eligibilities.index') .
                        '" class="submenu">View Eligibilities</a>
                                                        <a href="' .
                        route('course_eligibilities.create') .
                        '" class="submenu">Add Eligibility</a>
                                                    ',
                ) !!} --}}

                {{-- Selection Processes --}}
                {{-- {!! menuItem(
                    'Selection Process',
                    'fa-solid fa-clipboard-list',
                    '
                                                        <a href="' .
                        route('selection_processes.index') .
                        '" class="submenu">View Processes</a>
                                                        <a href="' .
                        route('selection_processes.create') .
                        '" class="submenu">Add Process</a>
                                                    ',
                ) !!} --}}

                {{--  States --}}
                {!! menuItem(
                    'States',
                    'fa-solid fa-briefcase',
                    '
                                                        <a href="' .
                        route('states.index') .
                        '" class="submenu">View  States</a>
                                                        <a href="' .
                        route('states.create') .
                        '" class="submenu">Add States</a>
                                                    ',
                ) !!}

                {{--  Cities --}}
                {!! menuItem(
                    'Cities',
                    'fa-solid fa-briefcase',
                    '
                                                        <a href="' .
                        route('cities.index') .
                        '" class="submenu">View Cities</a>
                                                        <a href="' .
                        route('cities.create') .
                        '" class="submenu">Add City</a>
                                                    ',
                ) !!}

                {{-- Contact Form Data --}}
                {!! menuItem(
                    'Form Data',
                    'fa-solid fa-house-laptop',
                    '
                                                        <a href="' .
                        route('contact_forms.index') .
                        '" class="submenu">View Contact Form Data</a>
                                                    ',
                ) !!}

                {{-- Enquiry Data --}}
                {!! menuItem(
                    'Enquiry Data',
                    'fa-solid fa-house-laptop',
                    '
                                                        <a href="' .
                        route('enquiries.index') .
                        '" class="submenu">View Enquiry Data</a>
                                                    ',
                ) !!}

                {{-- Home Page --}}
                {!! menuItem(
                    'Home Page',
                    'fa-solid fa-layer-group',
                    '

                        ' . menuItem(
                            'Hero Banner',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('hero.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Hero Banner</a>
                            '
                        ) . '

                        ' . menuItem(
                            'About Us',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('about.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View About</a>
                            '
                        ) . '

                        {{-- Why Vaa Menu --}}
                        ' . menuItem(
                            'Why Vaa',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('whyvaa.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Why Vaa</a>
                                <a href="' . route('whyvaa.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Why Vaa</a>
                            '
                        ) . '
                        
                        ' . menuItem(
                            'Courses',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('courses.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Courses</a>
                                <a href="' . route('courses.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Course</a>
                            '
                        ) . '

                        ' . menuItem(
                            'Cta',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('cta.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Cta</a>
                                <a href="' . route('cta.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Cta</a>
                            '
                        ) . '

                        ' . menuItem(
                            'Facilities',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('facilities.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Facilities</a>
                                <a href="' . route('facilities.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Facility</a>
                            '
                        ) . '

                        ' . menuItem(
                            'Career Pilot',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('career_pilot.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Career Pilot</a>
                                <a href="' . route('career_pilot.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Career Pilot</a>
                            '
                        ) . '

                    '
                ) !!}

                {{-- About Page --}}
                {!! menuItem(
                    'About Page',
                    'fa-solid fa-layer-group',
                    '

                        ' . menuItem(
                            'Hero Section',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('about_page.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View About Hero Page
                                </a>
                            '
                        ) . '

                        ' . menuItem(
                            'Vision & Mission',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('vision_mission.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Vision & Mission
                                </a>
                                <a href="' . route('vision_mission.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Vision & Mission
                                </a>
                            '
                        ) . '

                        ' . menuItem(
                            'Why Choose',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('why_choose.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Why Choose</a>
                                <a href="' . route('why_choose.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Why Choose</a>
                            '
                        ) . '

                        ' . menuItem(
                            'Testimonial',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('testimonial.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Testimonial</a>
                                <a href="' . route('testimonial.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Testimonial</a>
                            '
                        ) . '

                    '
                ) !!}

                {{-- Advantage Page --}}
                {!! menuItem(
                    'Advantages Page',
                    'fa-solid fa-layer-group',
                    '
                        ' . menuItem(
                            
                            'Advantage',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('advantage.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Advantage
                                </a>
                                <a href="' . route('advantage.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Advantage
                                </a>
                            '
                        ) . '

                        ' . menuItem(
                            'Strength',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('strength.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Strength
                                </a>
                                <a href="' . route('strength.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Strength
                                </a>
                            '
                        ) . '

                        ' . menuItem(
                            'Infrastructure',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('infrastructure.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Infrastructure
                                </a>
                                <a href="' . route('infrastructure.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Infrastructure
                                </a>
                            '
                        ) . '

                        ' . menuItem(
                            'Record',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('record.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Record
                                </a>
                                <a href="' . route('record.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Record
                                </a>
                            '
                        ) . '

                        ' . menuItem(
                            'Excellence',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('excellence.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Excellence
                                </a>
                                <a href="' . route('excellence.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Excellence
                                </a>
                            '
                        ) . '

                        ' . menuItem(
                            'Academic Feature',
                            'fa-solid fa-asterisk',
                            '
                                <a href="' . route('academic_feature.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Academic Feature
                                </a>
                                <a href="' . route('academic_feature.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Academic Feature
                                </a>
                            '
                        ) . '
                    '
                ) !!}

                {{-- Other Pages --}}
                {!! menuItem(
                    'Other Pages',
                    'fa-solid fa-layer-group',
                    '

                        ' . menuItem(
                            'Gallery',
                            'fa-solid fa-images',
                            '
                                <a href="' . route('gallery.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View Gallery</a>
                                <a href="' . route('gallery.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add Image</a>
                            '
                        ) . '

                        ' . menuItem(
                            'FAQs',
                            'fa-solid fa-question',
                            '
                                <a href="' . route('faq.index') . '" class="submenu">
                                    <i class="fa-solid fa-eye" style="margin: 10px"></i> View FAQs</a>
                                <a href="' . route('faq.create') . '" class="submenu">
                                    <i class="fa-solid fa-plus" style="margin: 10px"></i> Add FAQ</a>
                            '
                        ) . '

                    '
                ) !!}

            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar -->
            <header class="flex items-center justify-between bg-[rgb(26,32,53)] text-white p-4 shadow">
                <div class="flex items-center space-x-4">
                    <!-- Toggle Button -->
                    <button @click="collapsed = !collapsed" class="p-2 rounded focus:outline-none">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <input type="text" placeholder="Search..."
                        class="px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-indigo-500 text-black">
                </div>

                <div class="flex items-center space-x-4">
                    <!-- ✅ Logout Button -->
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded flex items-center space-x-2">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </button>
                    </form>

                    <!-- Profile -->
                    <div class="relative">
                        <button class="p-2 rounded">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/300" alt="Profile">
                        </button>
                    </div>
                </div>
            </header>

            <div class="max-w-5xl mx-auto mt-4">
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-6 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-100">
                <div class="bg-white rounded-lg shadow p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-96 text-center">
            <h2 class="text-xl font-bold mb-4">Are you sure?</h2>
            <p class="mb-6">Do you really want to delete this record? This action cannot be undone.</p>
            <div class="flex justify-center gap-4">
                <button onclick="closeDeleteModal()" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(resourceType, id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `/${resourceType}/${id}`; // set form action dynamically
            modal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>

    <!-- Alpine.js for dropdowns -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @yield('script')

</body>

</html>
