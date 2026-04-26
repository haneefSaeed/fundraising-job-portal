<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    @yield("header")
</head>

<body class="bg-black text-white">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="layout-menu"
           class="fixed inset-y-0 left-0 w-64 bg-neutral-900 border-r border-neutral-800 overflow-y-auto transform -translate-x-full md:translate-x-0 transition-transform">

        <!-- Brand -->
        <div class="p-4 border-b border-neutral-800 flex justify-between items-center">
            <span class="font-semibold">Admin</span>

            <button class="md:hidden text-gray-400" onclick="toggleSidebar()">✕</button>
        </div>

        <ul class="p-2 space-y-1 text-sm">

            <!-- Dashboard -->
            <li id="db_item_dashboard">
                <a href="{{url('admin')}}"
                   class="flex items-center gap-2 px-3 py-2 rounded hover:bg-neutral-800">
                    Dashboard
                </a>
            </li>

            <p class="text-xs text-gray-500 mt-4 px-2">POSTS</p>

            <!-- FUNDRAISING -->
            <li id="db_pitem_funds">
                <button onclick="toggleMenu('funds')"
                        class="w-full flex justify-between px-3 py-2 hover:bg-neutral-800 rounded">
                    Fundraising
                    <span>▾</span>
                </button>

                <ul id="menu-funds" class="hidden pl-4 space-y-1 mt-1">

                    <li id="db_item_allfund">
                        <a href="{{url('admin/fund')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            All Fundraising
                        </a>
                    </li>

                    <li id="db_item_unfund">
                        <a href="{{url('admin/unfund')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Unverified Fundraising
                        </a>
                    </li>

                    <li id="db_item_catfund">
                        <a href="{{url('admin/fund_cat')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Categories
                        </a>
                    </li>

                    <li id="db_item_donfund">
                        <a href="{{url('admin/don')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Donations
                        </a>
                    </li>

                </ul>
            </li>

            <!-- JOBS -->
            <li id="db_pitem_jobs">
                <button onclick="toggleMenu('jobs')"
                        class="w-full flex justify-between px-3 py-2 hover:bg-neutral-800 rounded">
                    Jobs
                    <span>▾</span>
                </button>

                <ul id="menu-jobs" class="hidden pl-4 space-y-1 mt-1">

                    <li id="db_item_alljobs">
                        <a href="{{url('admin/jobs')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            All Jobs
                        </a>
                    </li>

                    <li id="db_item_unjobs">
                        <a href="{{url('admin/unjobs')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Unverified Jobs
                        </a>
                    </li>

                    <li id="db_item_catjobs">
                        <a href="{{url('admin/jobs_cat')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Job Category
                        </a>
                    </li>

                </ul>
            </li>

            <!-- BLOGS -->
            <li id="db_pitem_blogs">
                <button onclick="toggleMenu('blogs')"
                        class="w-full flex justify-between px-3 py-2 hover:bg-neutral-800 rounded">
                    Blog Posts
                    <span>▾</span>
                </button>

                <ul id="menu-blogs" class="hidden pl-4 space-y-1 mt-1">

                    <li id="db_item_blog">
                        <a href="{{url('admin/blog')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Blogs
                        </a>
                    </li>

                    <li id="db_item_blog_cat">
                        <a href="{{url('admin/blog_cat')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Blog Category
                        </a>
                    </li>

                </ul>
            </li>

            <p class="text-xs text-gray-500 mt-4 px-2">ACCOUNTING</p>

            <!-- TRANSACTIONS -->
            <li id="db_pitem_trans">
                <button onclick="toggleMenu('trans')"
                        class="w-full flex justify-between px-3 py-2 hover:bg-neutral-800 rounded">
                    Transactions
                    <span>▾</span>
                </button>

                <ul id="menu-trans" class="hidden pl-4 space-y-1 mt-1">

                    <li id="db_item_alltrans">
                        <a href="{{url('admin/transactions')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Journals
                        </a>
                    </li>

                    <li id="db_item_dratrans">
                        <a href="{{url('admin/dtransactions')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Draft Journals
                        </a>
                    </li>

                    <li id="db_item_cattrans">
                        <a href="{{url('admin/trans_cat')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Categories
                        </a>
                    </li>

                </ul>
            </li>

            <!-- REPORT -->
            <li id="db_pitem_report">
                <button onclick="toggleMenu('report')"
                        class="w-full flex justify-between px-3 py-2 hover:bg-neutral-800 rounded">
                    Reports
                    <span>▾</span>
                </button>

                <ul id="menu-report" class="hidden pl-4 space-y-1 mt-1">

                    <li id="db_item_tranreport">
                        <a href="{{url('admin/report')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Transaction Report
                        </a>
                    </li>

                </ul>
            </li>

            <p class="text-xs text-gray-500 mt-4 px-2">USERS</p>

            <li id="db_item_employee">
                <a href="{{url('admin/emp')}}"
                   class="block px-3 py-2 hover:bg-neutral-800 rounded">
                    Employee
                </a>
            </li>

            <p class="text-xs text-gray-500 mt-4 px-2">SETTINGS</p>

            <!-- SETTINGS -->
            <li id="db_pitem_setting">
                <button onclick="toggleMenu('setting')"
                        class="w-full flex justify-between px-3 py-2 hover:bg-neutral-800 rounded">
                    Website Settings
                    <span>▾</span>
                </button>

                <ul id="menu-setting" class="hidden pl-4 space-y-1 mt-1">

                    <li id="db_item_detail">
                        <a href="{{url('admin/web')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Website Detail
                        </a>
                    </li>

                    <li id="db_item_slider">
                        <a href="{{url('admin/slider')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Slider
                        </a>
                    </li>

                    <li id="db_item_service">
                        <a href="{{url('admin/service')}}" class="block px-2 py-1 hover:bg-neutral-800 rounded">
                            Services
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </aside>

    <!-- Main -->
    <div class="flex-1 md:ml-64 flex flex-col">

        <!-- Navbar -->
        <div class="bg-neutral-900 border-b border-neutral-800 p-3 flex justify-between">

            <button class="md:hidden" onclick="toggleSidebar()">☰</button>

            <div></div>

            <div class="text-sm text-gray-300">
                {{Auth::guard('admin')->user()->email}}
            </div>

        </div>

        <main class="p-4 overflow-y-auto flex-1">
            @yield("content")
        </main>

    </div>

</div>

<script>
function toggleSidebar(){
    document.getElementById('layout-menu').classList.toggle('-translate-x-full');
}

function toggleMenu(id){
    document.getElementById('menu-' + id).classList.toggle('hidden');
}
</script>

@yield("footer")

</body>
</html>