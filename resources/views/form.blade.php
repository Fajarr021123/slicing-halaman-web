<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add New Admin</title>
</head>

<body class="bg-gray-100" id="body">
    <div class="flex flex-col h-screen">

        <header class="bg-white shadow-md p-5 flex justify-between items-center border-b-2 border-black">
            <div class="bg-black rounded-br-[15px] w-[247px] h-[74px] absolute left-1 top-1">
                <div class="bg-gray-200 rounded-tl-[14px] rounded-br-[14px] w-[247px] h-[74px] absolute left-0 top-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex items-center space-x-4 ml-auto">
                <button onclick="toggleTheme()" class="border px-4 py-2 rounded flex items-center space-x-2">
                    <span>Change Theme/Skin</span>
                </button>
                <button class="bg-red-500 text-white px-4 py-3 rounded flex items-center">
                    <img src="{{ asset('images/icons4.png') }}" alt="User" class="w-5 h-5 ml-2">
                    <span>User ABC</span>
                </button>
            </div>
        </header>

        <header class="bg-white shadow-md p-5 flex justify-between">
            <div class="flex flex-1 overflow-hidden">
                <!-- Sidebar -->
                <nav class="bg-white w-64 p-5 shadow-md border-r border-black-800 h-[350px] hidden lg:block p-5 border border-black rounded-lg ml-5 mt-5">
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

                <!-- Main Content Area -->
                <div class="flex-1 p-5 lg:p-10 mt-5 lg:mt-0">
                    <div class="bg-gray-200 text-sm text-red-500 rounded-[15px] mb-4 px-6 py-[15px] w-full">
                        Home > Admin > Add
                    </div>

                    <form class="bg-white p-6 rounded shadow-md max-w-lg mx-auto" action="{{ route('admin.store') }}" method="POST">
                        <h1 class="text-2xl font-bold mb-4">Add New Admin</h1>
                        @csrf

                        <label for="username" class="block mb-2">Username:</label>
                        <input type="text" id="username" name="username" class="w-full p-2 border rounded mb-4" required>

                        <label for="phone" class="block mb-2">Mobile Number:</label>
                        <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded mb-4" required>

                        <label for="email" class="block mb-2">Email Address:</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border rounded mb-4" required>

                        <label for="password" class="block mb-2">Password:</label>
                        <input type="password" id="password" name="password" class="w-full p-2 border rounded mb-4" required>

                        <label class="block mb-2">Status:</label>
                        <div class="flex items-center space-x-4 mb-4">
                            <input type="radio" name="status" value="active" checked class="text-green-500">
                            <span class="text-green-500">Active</span>

                            <input type="radio" name="status" value="inactive" class="text-red-500">
                            <span class="text-red-500">Inactive</span>
                        </div>

                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded w-full">Add Admin</button>
                    </form>
                </div>
            </div>
        </header>
    </div>

    <script>
        document.getElementById('adminForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            const data = {
                username: formData.get('username'),
                email: formData.get('email'),
                phone: formData.get('phone'),
                password: formData.get('password'),
                status: formData.get('status'),
            };

            fetch('http://127.0.0.1:8000/api/admin', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert('Error: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred.');
                });
        });

        function toggleTheme() {
            const body = document.getElementById('body');
            body.classList.toggle('bg-gray-900');
            body.classList.toggle('bg-gray-100');
        }
    </script>
</body>

</html>