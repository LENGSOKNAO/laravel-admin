<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .blue-text {
            color: rgb(29, 30, 31);
        }
        .products {
            font-size: 12px;
            font-weight: 500;
            color: rgb(58, 59, 61);
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select:not(:last-child) {
            padding: 6.5px 0;
            border-right: 1px solid  #ccc;
        }
        select:focus {
            outline: none;
            
        }
        option:checked {
            color: rgb(29, 30, 31);
        }
        .add-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: rgb(56, 116, 255); /* Blue color from your previous examples */
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            background-color: rgb(45, 93, 204); /* Slightly darker blue on hover */
            text-decoration: none;
        }

        .add-btn:active {
            background-color: rgb(34, 70, 153); /* Even darker when clicked */
        }
        tr th {
            padding: 10px;
             
        }
        tr td {
            padding: 10px ;
            text-align: center;
        }
    </style>
    <script>
        function setBlue(element) { 
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('blue-text');
            });  
            element.classList.add('blue-text');
        }
    </script>
</head>
<body>
    <x-header>
        <x-nav>
             <div class="bg-[rgb(245,247,250)] w-full  ">
                  <div class="p-[30px]">
                    <h2 class="text-3xl font-semibold p-[0_0_15px]">Products</h2>
                    <div class="text-[12px] py-3 flex gap-3 font-[500] text-[rgb(56,116,255)]">
                        <a href="" class="nav-link blue-text" onclick="setBlue(this); return false;">All (333)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">Nike (222)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">NewBalance (222)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">Anta (222)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">Qiaodan (222)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">Salomon (222)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">Men (222)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">Women (222)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">Kids (222)</a>
                        <a href="" class="nav-link" onclick="setBlue(this); return false;">Another (222)</a>
                    </div>
                   <div class="flex justify-between items-center">
                    <div class=" flex items-center gap-10 ">
                        <div class="flex items-center border-1 border-[rgb(203,208,221)]  rounded-sm ">
                            <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" height="17px" viewBox="0 -960 960 960" width="24px" fill="rgb(117,124,145)"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                            <input class="w-[350px] text-[13px] outline-none py-[5px] " type="text" placeholder="Search..." >
                        </div>
                        <div class="products">
                            <select name="products"  class="text-[12px] w-[150px] font-[500]">  
                                    <option value="All">All </option>
                                    <option value="Nike">Nike </option>
                                    <option value="Newbalance">NewBalance </option>
                                    <option value="Anta">Anta </option>
                                    <option value="Qiaodan">Qiaodan </option>
                                    <option value="Salomon">Salomon </option>
                            </select>
                            <select name="products" class="text-[12px] w-[150px] font-[500]">  
                                    <option value="All">All </option>
                                    <option value="Men">Men </option>
                                    <option value="Women">Women </option>
                                    <option value="Kids">Kids </option>
                                    <option value="Sport">Sport </option>
                                    <option value="T-Shirt">T-Shirt </option>
                                    <option value="Terry">Terry </option>
                                    <option value="Pant">Pant </option>
                                    <option value="Basketball-Jersey">Basketball-Jersey </option>
                            </select>
                            <select name="products" class="text-[12px] w-[150px] font-[500]">  
                                    <option value="All">All</option>
                                    <option value="XS">XS </option>
                                    <option value="S">S </option>
                                    <option value="M">M </option>
                                    <option value="L">L </option>
                                    <option value="XL">XL </option>
                                    <option value="3Xl">3Xl </option>
                                    <option value="6">6 </option>
                                    <option value="6.5">6.5 </option>
                                    <option value="7">7 </option>
                                    <option value="7.5">7.5 </option>
                                    <option value="8">8 </option>
                                    <option value="8.5">8.5 </option>
                                    <option value="9">9 </option>
                                    <option value="9.5">9.5 </option>
                                    <option value="10">10 </option>
                                    <option value="10.5">10.5 </option>
                                    <option value="11">11 </option>
                                    <option value="11.5">11.5 </option>
                                    <option value="12">12 </option>
                                    <option value="12.5">12.5 </option>
                                    <option value="13">13 </option>
                                    <option value="13.5">13.5 </option>
                                    <option value="14.5">14.5 </option>
                                    <option value="15">15 </option>
                            </select>
                        </div>        
                    </div>
                    <div class="">
                         <a class="add-btn" href="{{ route('products.create') }}">+ Add product</a>
                    </div>
                   </div>
                  </div>
                  <div class="bg-[#fff] flex justify-center border-t-1 border-b-1 p-[0_0_15px] border-[rgb(203,208,221)] ">
                      <table class="w-[95%]">
                          <thead>
                              <tr class="text-[11px] border-b-1 border-[rgb(203,208,221)]  ">
                                  <th>PRODUCT NAME</th>
                                  <th>PRODUCT PRICE</th>
                                  <th>PRODUCT BRAND</th>
                                  <th class=" " >PRODUCT CATEGORY</th>
                                  <th>PRODUCT SIZES</th>
                                  <th>PRODUCT ON</th>
                              </tr>
                          </thead>
                          <tbody class=" px-[100px]  text-center ">
                              @foreach ($products as $item)
                                  <tr class="border-b-1 border-[rgb(203,208,221)]  ">
                                      <td class="flex items-center gap-5    " >
                                          <img class="w-[50px] h-[50px] object-contain rounded-[5px] border-1 border-gray-300  " 
                                          src="{{ asset('/storage/' . $item->product_image) }}" alt="">
                                     
                                          <a  href="" class="text-sm text-[rgb(56,116,255)] hover:underline " >{{ $item->product_name }} </a>
                                      </td>
                                      <td>
                                          <h3 class="text-sm font-semibold text-[rgb(46,47,49)] " >${{ $item->product_sale_price }}</h3>
                                      </td>
                                      <td>
                                           <h3 class="text-sm font-semibold text-[rgb(138,139,143)]" > {{ $item->product_brand }} </h3>
                                      </td>
                                      <td>
                                        <div  class="w-[150px] ">
                                             <div class="flex flex-wrap gap-1">
                                                @if (is_array($item->product_category))
                                                @foreach ($item->product_category as $size)
                                                    <span class="px-2 py-1 text-[11px] font-medium text-gray-700 bg-gray-200 rounded-md">
                                                        {{ $size }}
                                                    </span>
                                                @endforeach
                                            @elseif (is_string($item->product_category))
                                                <span class="p-1 text-[5px] font-medium text-gray-700 bg-gray-200 rounded-md">
                                                    {{ $item->product_category }}
                                                </span>
                                            @else
                                                N/A
                                            @endif
                                             </div>
                                        </div>
                                      </td>
                                        <td>
                                            <div  class=" w-[150px] ">
                                                <div class="flex flex-wrap  gap-1">
                                                @if (is_array($item->product_sizes))
                                                    @foreach ($item->product_sizes as $size)
                                                        <span class="px-2 p-1 text-[11px] font-medium text-gray-700 bg-gray-200 rounded-md">
                                                            {{ $size }}
                                                        </span>
                                                    @endforeach
                                                @elseif (is_string($item->product_sizes))
                                                    <span class="p-1 text-[5px] font-medium text-gray-700 bg-gray-200 rounded-md">
                                                        {{ $item->product_sizes }}
                                                    </span>
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                            </div>
                                        </td>          
                                      <td class="text-sm text-[rgb(66,68,70)]">{{ $item->created_at->format('M j, g:i A') }}</td>
                                      <td>
                                        <div class="relative">
                                            <!-- Three Dots Button -->
                                            <button class="dropdown-btn text-gray-500 hover:bg-gray-200 rounded-[5px] px-3 py-1 cursor-pointer text-[15px]">
                                                &#8226;&#8226;&#8226;
                                            </button>
                                            
                                            <!-- Dropdown Menu -->
                                            <div class="dropdown-menu hidden absolute right-[70px] w-40 bg-white border border-gray-300 rounded-lg shadow-lg">
                                                <ul class="py-1 text-gray-700">
                                                    <li><a href="{{ route('products.show', $item->id) }}" class="block px-4 cursor-pointer py-2 hover:bg-gray-100">View</a></li>
                                                    <li><a href="{{ route('products.edit', $item->id) }}" class="block px-4 cursor-pointer py-2 hover:bg-gray-100">Edit</a></li>
                                                    <li> 
                                                        <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="block px-4 w-full cursor-pointer py-2 text-red-500 hover:bg-gray-100">Remove</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>        
                                  </tr>
                              @endforeach           
                          </tbody>
                      </table>
                  </div>
             </div>
        </x-nav>
    </x-header>

    <script>
            document.addEventListener("DOMContentLoaded", function () {
            const dropdownBtns = document.querySelectorAll(".dropdown-btn");  
            const dropdownMenus = document.querySelectorAll(".dropdown-menu");  
            
            dropdownBtns.forEach((dropdownBtn, index) => {
                dropdownBtn.addEventListener("click", function (event) {
                    dropdownMenus.forEach((dropdownMenu, i) => {
                        if (i !== index) {
                            dropdownMenu.classList.add("hidden");
                        }
                    });
                    
                     
                    dropdownMenus[index].classList.toggle("hidden");
                    event.stopPropagation();  
                });
            });
            
            document.addEventListener("click", function () {
                dropdownMenus.forEach((dropdownMenu) => {
                    dropdownMenu.classList.add("hidden");
                });
            });
            
            dropdownMenus.forEach((dropdownMenu) => {
                dropdownMenu.addEventListener("click", function (event) {
                    event.stopPropagation();  
                });
            });
        });
    </script>
</body>
</html>


