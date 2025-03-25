<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .red-text {
            color:  rgb(56,138,255);
        }
    </style>
        <script>
            function toggleRed(element) {
                // Remove red-text class from all links
                document.querySelectorAll('.sidebar-link').forEach(link => {
                    link.classList.remove('red-text');
                });

                // Find the anchor tag inside the clicked <li> and add the red-text class
                const anchor = element.querySelector('.sidebar-link');
                if (anchor) {
                    anchor.classList.add('red-text');
                }
            }
        </script>

</head>
<body class=" ">
    <div class="flex">
        <!-- Sidebar -->
        <ul class="w-[270px] bg-white border-r-1 border-[rgb(203,208,221)]  h-[92.7vh] text-gray-700 text-sm p-4">
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <a href="" class="sidebar-link flex items-center space-x-2" onclick="toggleRed(this); return false;">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <a href="" class="sidebar-link flex items-center space-x-2" onclick="toggleRed(this); return false;">
                    <i class="fas fa-image"></i>
                    <span>Logo</span>
                </a>
            </li>
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <a href="" class="sidebar-link flex items-center space-x-2" onclick="toggleRed(this); return false;">
                    <i class="fas fa-sliders-h"></i>
                    <span>Slider</span>
                </a>
            </li>
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <a href="" class="sidebar-link flex items-center space-x-2" onclick="toggleRed(this); return false;">
                    <i class="fas fa-ad"></i>
                    <span>Banner</span>
                </a>
            </li>
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <div  class="sidebar-link   items-center space-x-2 flex ">
                    <i class="fas fa-box"></i>
                   <a href="{{ route( 'products.index') }}">Product</a>
                </div>
            </li>
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <a href="" class="sidebar-link flex items-center space-x-2" onclick="toggleRed(this); return false;">
                    <i class="fas fa-users"></i>
                    <span>Customer</span>
                </a>
            </li>
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <a href="" class="sidebar-link flex items-center space-x-2" onclick="toggleRed(this); return false;">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Order</span>
                </a>
            </li>
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <a href="" class="sidebar-link flex items-center space-x-2" onclick="toggleRed(this); return false;">
                    <i class="fas fa-undo"></i>
                    <span>Refund</span>
                </a>
            </li>
            <li class="tb py-2 px-4 rounded-sm hover:bg-gray-200 transition duration-300 cursor-pointer">
                <a href="" class="sidebar-link flex items-center space-x-2" onclick="toggleRed(this); return false;">
                    <i class="fas fa-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
        
        {{ $slot }}
         
    </div>
</body>
</html>