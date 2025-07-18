<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/model.php';

$db = new database();
$conn = $db->connection();
$user = new user($conn);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $records = $user->get_records_by_id($id);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Student - Student Management System</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="flex items-center mb-8">
                <a href="index.php" class="mr-4 text-gray-600 hover:text-gray-900 transition duration-150">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-gray-800">Edit Student</h1>
            </div>

            <!-- Edit Student Form -->
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-8">
                    <form action="includes/edit.inc.php" method="post">
                        <!-- Student ID (Hidden) -->
                        <input type="hidden" name="id" value="<?php echo $records['id']; ?>">

                        <!-- Name Field -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="<?php echo $records['name'] ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                placeholder="Enter student's full name">
                        </div>

                        <!-- Email Field -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="<?php echo $records['email']; ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                placeholder="Enter student's email address">
                        </div>

                        <!-- Class Field -->
                        <div class="mb-8">
                            <label for="class" class="block text-sm font-medium text-gray-700 mb-2">
                                Class <span class="text-red-500">*</span>
                            </label>
                            <select name="class" id="class"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                <option value="">Select a class</option>
                                <option value="10" <?= $records['class'] == '10' ? 'selected' : '' ?>>Class 10</option>
                                <option value="11" <?= $records['class'] == '11' ? 'selected' : '' ?>>Class 11</option>
                                <option value="12" <?= $records['class'] == '12' ? 'selected' : '' ?>>Class 12</option>
                            </select>

                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit"
                                class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Student
                            </button>
                            <a href="index.php"
                                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-200 text-center flex items-center justify-center">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Additional Information -->
                <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">
                                Edit Information
                            </h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <ul class="list-disc list-inside space-y-1">
                                    <li>All fields marked with <span class="text-red-500">*</span> are required</li>
                                    <li>Email address must be unique for each student</li>
                                    <li>Student ID cannot be modified</li>
                                    <li>Changes will be saved immediately upon submission</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    header('Location: ./index.php?error');
}
?>