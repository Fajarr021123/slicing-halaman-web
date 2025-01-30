<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin Data</title>
</head>

<body>

    <div class="flex flex-col min-h-screen">

        <header class="bg-white shadow-md p-5 flex justify-between items-center border-b-2 border-black ">

            <div class="bg-gray-200 rounded-tl-[14px] rounded-br-[14px] w-[247px] h-[74px] absolute left-0 top-0 relative shadow-[5px_5px_5px_0px_rgba(0,0,0,1)]">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
            </div>

            <div class="flex items-center space-x-4 ml-auto">
                <button onclick="toggleTheme()" class="border px-4 py-2 rounded flex items-center space-x-2 w-[90px] h-[65px]">
                    <img src="{{ asset('images/image.png') }}" alt="Logo" class="w-full h-full object-cover">
                </button>
                <button class="bg-red-500 text-white px-4 py-3 rounded flex items-center">
                    <img src="{{ asset('images/icons4.png') }}" alt="User" class="w-5 h-5 ml-2">
                    <span>User ABC</span>
                </button>
            </div>
        </header>


        <div class="flex flex-2 overflow-hidden">
            <nav class="bg-white w-64 p-5 shadow-md border-r border-black-800 h-[350px] hidden lg:block p-5 border border-black rounded-lg ml-5 mt-5 ">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg text-red-500 font-bold hover:bg-red-100">
                            <img src="{{ asset('images/icons.png') }}" alt="Dashboard" class="w-5 h-5">
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="home" class="flex items-center p-3 rounded-lg bg-red-500 text-white">
                            <img src="{{ asset('images/icons2.png') }}" alt="Admin" class="w-5 h-5">
                            <span class="ml-2">Admin</span>
                            <span class="ml-auto bg-black text-yellow-400 px-2 py-1 text-xs rounded-full" id="badge-count">0</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg text-red-500 font-bold hover:bg-red-100">
                            <img src="{{ asset('images/icons3.png') }}" alt="Executive" class="w-5 h-5">
                            <span class="ml-2">Executive</span>
                            <span class="ml-auto bg-black text-green-400 px-2 py-1 text-xs rounded-full">0</span>
                        </a>
                    </li>
                </ul>

            </nav>

            <div class="flex-1 p-6 overflow-auto">
                <div class="bg-gray-200 text-sm text-red-500 rounded-[15px] mb-4 px-6 py-[15px] w-full">
                    Home > Admin > Add
                </div>
                <div class="w-full h-[2px] bg-gray-400"></div>

                @if (session('success'))
                <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('success-alert').style.display = 'none';
                    }, 3000);
                </script>
                @endif

                @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
                @endif

                <div class="flex items-center justify-between mb-4 mt-[20px]">
                    <h2 class="text-xl font-semibold text-gray-700">
                        USER
                        <a href="form" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 ml-1.5">+Add New</a>
                    </h2>
                </div>

                <div class="mt-4 text-sm text-gray-500">
                    <span id="data-count">Total Users: 0</span>
                </div>

                <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden mt-6">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Username</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Phone</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Created At</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Updated At</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Modify</th>
                        </tr>
                    </thead>
                    <tbody id="admin-data">
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        function loadAdminData() {
            fetch('http://127.0.0.1:8000/api/admin')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('admin-data');
                    const dataCount = document.getElementById('data-count');
                    const badgeCount = document.getElementById('badge-count');
                    tableBody.innerHTML = '';

                    data.forEach(admin => {
                        const row = document.createElement('tr');
                        row.classList.add('border-b');
                        row.innerHTML = `
                            <td class="px-6 py-3 text-sm text-gray-700">${admin.id}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">${admin.username}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">${admin.email}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">${admin.phone}</td>
            <td class="px-6 py-3">
    <div class="${admin.status === 'active' ? 'text-green-500 border-green-500' : 'text-red-500 border-red-500'} border-2 rounded-[6px] h-8 flex items-center justify-center p-[8px]">
        ${admin.status.charAt(0).toUpperCase() + admin.status.slice(1)}
    </div>
</td>
                            <td class="px-6 py-3 text-sm text-gray-700">${admin.created_at}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">${admin.updated_at}</td>
                            <td class="px-6 py-3 text-sm">
                                <div class="flex justify-between items-center">
                                    <a href="edit/${admin.id}" class="text-blue-500 hover:text-blue-700">
                                        <img src="/images/Edit.png" alt="Edit" class="w-8 h-8">
                                    </a>
                                    <button onclick="confirmDelete(${admin.id})" class="text-red-500 hover:text-red-700">
                                        <img src="/images/Delete.png" alt="Delete" class="w-8 h-8">
                                    </button>
                                    
                                </div>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });

                    dataCount.textContent = `Total Users: ${data.length}`;
                    badgeCount.textContent = data.length;
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",

                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!"
            }).then((result) => {
                if (result.isConfirmed) deleteAdmin(id);
            });
        }

        function deleteAdmin(id) {
            fetch(`http://127.0.0.1:8000/api/admin/${id}`, {
                    method: 'DELETE'
                })
                .then(() => {
                    Swal.fire("Deleted!", "Admin has been deleted.", "success");
                    loadAdminData();
                });
        }
        window.onload = loadAdminData;

        function toggleTheme() {
            const body = document.body;
            body.classList.toggle('bg-gray-900');
            body.classList.toggle('bg-gray-100');
        }
    </script>

</body>

</html>
