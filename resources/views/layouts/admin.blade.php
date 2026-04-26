<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    @yield("header")
</head>

<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-300">

        <div class="p-4 border-b font-bold text-lg">
            Admin Panel
        </div>

        <nav class="p-4 space-y-2 overflow-y-auto h-full">

            <a href="{{url('admin')}}" class="block px-3 py-2 rounded hover:bg-gray-200">
                Dashboard
            </a>

            @if(Auth::guard('admin')->user()->is_emp == 0)

            <div>
                <p class="text-xs text-gray-500 mt-4">POSTS</p>

                <a href="{{url('admin/fund')}}" class="block px-3 py-2 hover:bg-gray-200 rounded">Fundraising</a>
                <a href="{{url('admin/jobs')}}" class="block px-3 py-2 hover:bg-gray-200 rounded">Jobs</a>
                <a href="{{url('admin/blog')}}" class="block px-3 py-2 hover:bg-gray-200 rounded">Blogs</a>
            </div>

            <div>
                <p class="text-xs text-gray-500 mt-4">ACCOUNTING</p>

                <a href="{{url('admin/transactions')}}" class="block px-3 py-2 hover:bg-gray-200 rounded">Transactions</a>
                <a href="{{url('admin/report')}}" class="block px-3 py-2 hover:bg-gray-200 rounded">Reports</a>
            </div>

            <div>
                <p class="text-xs text-gray-500 mt-4">USERS</p>
                <a href="{{url('admin/emp')}}" class="block px-3 py-2 hover:bg-gray-200 rounded">Employee</a>
            </div>

            @endif

        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col md:ml-64">

        <!-- Navbar -->
        <header class="bg-white shadow px-4 py-3 flex justify-between items-center">

            <!-- Mobile menu button -->
            <button onclick="toggleSidebar()" class="md:hidden">
                ☰
            </button>

            <!-- Search -->
            <input type="text"
                placeholder="Search..."
                class="border rounded px-3 py-1 w-1/3 hidden md:block">

            <!-- User dropdown -->
            <div class="relative">
                <button onclick="toggleDropdown()" class="flex items-center gap-2">
                    <img src="{{asset('ad/assets/img/avatars/1.png')}}" class="w-8 h-8 rounded-full">
                    <span class="hidden md:block text-sm">{{Auth::guard('admin')->user()->email}}</span>
                </button>

                <div id="dropdown"
                     class="hidden absolute right-0 mt-2 w-48 bg-white shadow rounded">

                    <a href="{{url('admin/profile')}}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Change Password</a>
                    <a href="{{route('admin.logout')}}" class="block px-4 py-2 hover:bg-gray-100 text-red-500">Logout</a>

                </div>
            </div>

        </header>

        <!-- Content -->
        <main class="p-4 overflow-y-auto flex-1">
            @yield("content")
        </main>

        <!-- Footer -->
        <footer class="bg-white text-center py-2 text-sm text-gray-500">
            © <script>document.write(new Date().getFullYear())</script>
        </footer>

    </div>

</div>

<!-- JS -->
<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('-translate-x-full');
}

function toggleDropdown() {
    const dropdown = document.getElementById('dropdown');
    dropdown.classList.toggle('hidden');
}
</script>

@yield("footer")

</body>
</html>