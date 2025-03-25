<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add a Product</title>
</head>
<body>
    <x-header>
        <x-nav>
            <div class="bg-[rgb(245,247,250)] w-full min-h-screen">
                <div class="p-[30px]">
                    <h2 class="text-3xl font-semibold p-[0_0_0px]">
                        Add a product
                    </h2>
                    <span class="text-sm text-[rgb(82,91,117)] p-[0_0_15px] block">
                        Orders placed across your store
                    </span>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="py-[50px]">
                            <div class="flex gap-10">
                                <div class="w-[70%]">
                                    <label for="product_name" class="block text-base font-semibold text-gray-800 mb-2">
                                        Product Title
                                    </label>
                                    <input
                                        type="text"
                                        name="product_name"
                                        id="product_name"
                                        placeholder="Write title here..."
                                        class="w-full px-5 py-2 text-[13px] border border-gray-300 rounded-lg bg-white outline-none focus:shadow-[0px_0px_10px_rgb(56,116,255)]"
                                    />

                                    <!-- Product Description -->
                                    <div class="mt-6">
                                        <label class="block text-base font-semibold text-gray-800 mb-2">
                                            Product Description
                                        </label>
                                        <div class="flex items-center gap-2 p-2 bg-gray-100 border border-gray-300 rounded-t-lg">
                                            <button id="undo-btn" class="p-1 text-gray-600 hover:text-gray-800" title="Undo">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h7m0 0l4-4m-4 4l4 4m-11-4h7m7 0h3"></path>
                                                </svg>
                                            </button>
                                            <button id="redo-btn" class="p-1 text-gray-600 hover:text-gray-800" title="Redo">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10h-7m0 0l-4-4m4 4l-4 4m11-4h-7m-7 0h-3"></path>
                                                </svg>
                                            </button>
                                            <button id="align-left-btn" class="p-1 text-gray-600 hover:text-gray-800" title="Align Left">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M3 12h12M3 18h18"></path>
                                                </svg>
                                            </button>
                                            <button id="align-center-btn" class="p-1 text-gray-600 hover:text-gray-800" title="Align Center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M6 12h12M3 18h18"></path>
                                                </svg>
                                            </button>
                                            <button id="align-right-btn" class="p-1 text-gray-600 hover:text-gray-800" title="Align Right">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M9 12h12M3 18h18"></path>
                                                </svg>
                                            </button>
                                            <button id="link-btn" class="p-1 text-gray-600 hover:text-gray-800" title="Link">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <textarea
                                            name="product_description"
                                            id="description"
                                            placeholder="Write a description here..."
                                            class="w-full h-40 p-3 text-sm border border-gray-300 rounded-b-lg bg-white outline-none focus:shadow-[0px_0px_10px_rgb(56,116,255)] resize-y"
                                        ></textarea>
                                    </div>

                                    <div class="flex gap-3 mt-6">
                                        <!-- Main Image -->
                                        <div class="w-full">
                                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                                Display images (Main)
                                            </label>
                                            <div id="image-preview-1" class="flex flex-wrap gap-4 mb-4"></div>
                                            <div class="w-full p-6 border-2 border-dotted border-gray-300 rounded-lg bg-white flex flex-col items-center justify-center">
                                                <div class="text-gray-500 mb-2">
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-sm text-gray-600">
                                                    Drag your photo here or
                                                    <label for="product_image" class="text-blue-600 hover:underline cursor-pointer">
                                                        Browse from device
                                                    </label>
                                                </p>
                                                <input
                                                    type="file"
                                                    name="product_image"
                                                    id="product_image"
                                                    accept="image/*"
                                                    class="hidden"
                                                />
                                            </div>
                                        </div>

                                        <!-- Additional Images -->
                                        <div class="w-full">
                                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                                Display images (Additional)
                                            </label>
                                            <div id="image-preview-2" class="flex flex-wrap gap-4 mb-4"></div>
                                            <div class="w-full p-6 border-2 border-dotted border-gray-300 rounded-lg bg-white flex flex-col items-center justify-center">
                                                <div class="text-gray-500 mb-2">
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-sm text-gray-600">
                                                    Drag your photo here or
                                                    <label for="product_list_image" class="text-blue-600 hover:underline cursor-pointer">
                                                        Browse from device
                                                    </label>
                                                </p>
                                                <input
                                                    type="file"
                                                    name="product_list_image[]"
                                                    id="product_list_image"
                                                    accept="image/*"
                                                    multiple
                                                    class="hidden"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-[30%]">
                                    <!-- Organize -->
                                    <div class="mt-6 p-7 rounded-[5px] bg-[#fff]">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Organize</h3>
                                        <!-- Category -->
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Category
                                                <a href="#" class="text-blue-600 hover:underline text-xs ml-1">Add new category</a>
                                            </label>
                                            <div class="relative">
                                                <div id="selectedOptions1" class="border border-gray-300 rounded-lg p-2 min-h-[40px] flex flex-wrap gap-2 cursor-pointer bg-white focus:shadow-[0px_0px_10px_rgb(56,116,255)]">
                                                    <!-- Selected items will be displayed here dynamically -->
                                                </div>
                                                <div id="dropdown1" class="absolute w-full border border-gray-300 rounded-b-lg bg-white max-h-40 overflow-y-auto z-10 hidden">
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="Men">Men</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="Women">Women</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="Kids">Kids</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="Sport">Sport</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="T-Shirt">T-Shirt</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="Terry">Terry</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="Pant">Pant</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="Basketball-Jersey ">Basketball-Jersey </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sizes -->
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Sizes
                                                <a href="#" class="text-blue-600 hover:underline text-xs ml-1">Add new Sizes</a>
                                            </label>
                                            <div class="relative">
                                                <div id="selectedOptions2" class="border border-gray-300 rounded-lg p-2 min-h-[40px] flex flex-wrap gap-2 cursor-pointer bg-white focus:shadow-[0px_0px_10px_rgb(56,116,255)]">
                                                    <!-- Selected items will be displayed here dynamically -->
                                                </div>
                                                <div id="dropdown2" class="absolute w-full border border-gray-300 rounded-b-lg bg-white max-h-40 overflow-y-auto z-10 hidden">
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="XS">XS</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="S">S</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="M">M</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="L">L</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="XL">XL</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="3XL">3XL</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="6">6</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="6.5">6.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="7">7</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="7.5">7.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="8">8</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="8.5">8.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="9">9</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="9.5">9.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="10">10</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="10.5">10.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="11">11</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="11.5">11.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="12">12</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="12.5">12.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="13">13</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="13.5">13.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="14.5">14.5</div>
                                                    <div class="dropdown-option p-2 hover:bg-gray-100 cursor-pointer" data-value="15">15</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Brand -->
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Brand
                                                <a href="#" class="text-blue-600 hover:underline text-xs ml-1">Add new Brand</a>
                                            </label>
                                            <select
                                                name="product_brand"
                                                class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-white outline-none focus:shadow-[0px_0px_10px_rgb(56,116,255)]"
                                            >
                                                <option value="Nike">Nike</option>
                                                <option value="Newbalance">NewBalance</option>
                                                <option value="Anta">Anta</option>
                                                <option value="Qiaodan">Qiaodan</option>
                                                <option value="Salomon">Salomon</option>
                                            </select>
                                        </div>

                                        <!-- Qty -->
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Qty
                                            </label>
                                            <input
                                                type="number"
                                                name="product_qty"
                                                placeholder="Enter quantity"
                                                class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-white outline-none focus:shadow-[0px_0px_10px_rgb(56,116,255)]"
                                            />
                                        </div>
                                    </div>

                                    <div class="mt-6 p-7 rounded-[5px] bg-[#fff]">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Pricing & Status</h3>
                                        <!-- Prices -->
                                        <div class="flex gap-2">
                                            <div class="mb-4 w-full">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Regular price
                                                </label>
                                                <input
                                                    type="number"
                                                    name="product_regular_price"
                                                    step="0.01"
                                                    placeholder="Regular price"
                                                    class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-white outline-none focus:shadow-[0px_0px_10px_rgb(56,116,255)]"
                                                />
                                            </div>  
                                            <div class="mb-4 w-full">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Sale price
                                                </label>
                                                <input
                                                    type="number"
                                                    name="product_sale_price"
                                                    step="0.01"
                                                    placeholder="Sale price (optional)"
                                                    class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-white outline-none focus:shadow-[0px_0px_10px_rgb(56,116,255)]"
                                                />
                                            </div>  
                                        </div>

                                        <!-- Enable -->
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Enable
                                            </label>
                                            <select name="product_is_enable" class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-white outline-none focus:shadow-[0px_0px_10px_rgb(56,116,255)]">
                                                <option value="1">True</option>
                                                <option value="0">False</option>
                                            </select>
                                        </div>                                                          

                                        <!-- Coming Soon -->
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Coming Soon
                                            </label>
                                            <select name="product_comming_soon"   class="w-full p-2 text-sm border border-gray-300 rounded-lg bg-white outline-none focus:shadow-[0px_0px_10px_rgb(56,116,255)]">
                                                <option value="0">False</option>
                                                <option value="1">True</option>
                                            </select>
                                        </div>  

                                        <div class="mt-4 border-1 border-gray-300 py-2 rounded-[5px] hover:bg-gray-200 bg-gray-100 text-center">
                                            <button class="text-blue-600 text-sm" type="submit">Publish product</button>
                                        </div>                                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </x-nav>
        </x-header>

        <!-- JavaScript for Image Preview -->
        <script>
            function setupImageUpload(fileInputId, imagePreviewId) {
                const fileInput = document.getElementById(fileInputId);
                const imagePreview = document.getElementById(imagePreviewId);

                fileInput.addEventListener("change", (event) => {
                    imagePreview.innerHTML = ''; // Clear previous previews
                    const files = event.target.files;
                    for (const file of files) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const imageContainer = document.createElement("div");
                            imageContainer.className = "relative w-20 h-20";

                            const img = document.createElement("img");
                            img.src = e.target.result;
                            img.className = "w-full h-full object-cover rounded-lg";
                            imageContainer.appendChild(img);

                            const removeButton = document.createElement("button");
                            removeButton.innerHTML = "✕";
                            removeButton.className = "absolute top-0 right-0 bg-gray-200 text-gray-600 rounded-full w-6 h-6 flex items-center justify-center text-sm";
                            removeButton.addEventListener("click", () => {
                                imageContainer.remove();
                            });
                            imageContainer.appendChild(removeButton);

                            imagePreview.appendChild(imageContainer);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            setupImageUpload("product_image", "image-preview-1");
            setupImageUpload("product_list_image", "image-preview-2");
        </script>

        <!-- JavaScript for Text Editor -->
        <script>
            const editor = document.getElementById('description');
            const undoBtn = document.getElementById('undo-btn');
            const redoBtn = document.getElementById('redo-btn');
            const alignLeftBtn = document.getElementById('align-left-btn');
            const alignCenterBtn = document.getElementById('align-center-btn');
            const alignRightBtn = document.getElementById('align-right-btn');
            const linkBtn = document.getElementById('link-btn');

            editor.addEventListener('focus', () => {
                if (editor.value === 'Write a description here...') {
                    editor.value = '';
                }
            });

            editor.addEventListener('blur', () => {
                if (editor.value.trim() === '') {
                    editor.value = 'Write a description here...';
                }
            });

            undoBtn.addEventListener('click', (e) => {
                e.preventDefault();
                document.execCommand('undo', false, null);
            });

            redoBtn.addEventListener('click', (e) => {
                e.preventDefault();
                document.execCommand('redo', false, null);
            });

            alignLeftBtn.addEventListener('click', (e) => {
                e.preventDefault();
                document.execCommand('justifyLeft', false, null);
                editor.style.textAlign = 'left';
            });

            alignCenterBtn.addEventListener('click', (e) => {
                e.preventDefault();
                document.execCommand('justifyCenter', false, null);
                editor.style.textAlign = 'center';
            });

            alignRightBtn.addEventListener('click', (e) => {
                e.preventDefault();
                document.execCommand('justifyRight', false, null);
                editor.style.textAlign = 'right';
            });

            linkBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const url = prompt('Enter the URL:');
                if (url) {
                    document.execCommand('createLink', false, url);
                }
            });
        </script>

        <!-- JavaScript for Multi-Select -->
        <script>
            function initializeMultiSelect(selectedOptionsId, dropdownId, inputName) {
                const selectedOptionsDiv = document.getElementById(selectedOptionsId);
                const dropdown = document.getElementById(dropdownId);
                const dropdownOptions = dropdown.querySelectorAll('.dropdown-option');
                let selectedValues = [];

                selectedOptionsDiv.addEventListener('click', (e) => {
                    if (!e.target.classList.contains('remove-btn')) {
                        dropdown.classList.toggle('hidden');
                    }
                });

                document.addEventListener('click', (e) => {
                    if (!selectedOptionsDiv.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.add('hidden');
                    }
                });

                dropdownOptions.forEach(option => {
                    option.addEventListener('click', () => {
                        const value = option.getAttribute('data-value');
                        if (!selectedValues.includes(value)) {
                            selectedValues.push(value);
                            renderSelectedOptions();
                        }
                        dropdown.classList.add('hidden');
                    });
                });

                function renderSelectedOptions() {
                    selectedOptionsDiv.innerHTML = '';
                    selectedValues.forEach(value => {
                        const optionDiv = document.createElement('div');
                        optionDiv.classList.add('bg-cyan-100', 'border', 'border-gray-300', 'text-gray-800', 'text-xs', 'rounded-full', 'px-2', 'py-1', 'flex', 'items-center', 'gap-1');

                        const textSpan = document.createElement('span');
                        textSpan.textContent = getTextFromValue(value);
                        optionDiv.appendChild(textSpan);

                        const removeSpan = document.createElement('span');
                        removeSpan.classList.add('remove-btn', 'text-gray-600', 'cursor-pointer', 'font-bold');
                        removeSpan.textContent = '×';
                        removeSpan.addEventListener('click', (e) => {
                            e.stopPropagation();
                            selectedValues = selectedValues.filter(val => val !== value);
                            renderSelectedOptions();
                        });
                        optionDiv.appendChild(removeSpan);

                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = inputName;
                        hiddenInput.value = value;
                        optionDiv.appendChild(hiddenInput);

                        selectedOptionsDiv.appendChild(optionDiv);
                    });
                }

                function getTextFromValue(value) {
                    const option = Array.from(dropdownOptions).find(opt => opt.getAttribute('data-value') === value);
                    return option ? option.textContent : '';
                }
            }

            initializeMultiSelect('selectedOptions1', 'dropdown1', 'product_category[]');
            initializeMultiSelect('selectedOptions2', 'dropdown2', 'product_sizes[]');
        </script>
    </body>
</html>