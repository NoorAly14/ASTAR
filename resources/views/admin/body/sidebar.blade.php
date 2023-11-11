<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('adminbackend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                </li>
                <li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">partitions</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.partition') }}"><i class="bx bx-right-arrow-alt"></i>All Partitions</a>
                </li>
                <li> <a href="{{ route('add.partition') }}"><i class="bx bx-right-arrow-alt"></i>Add Partitions</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Items</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.item') }}"><i class="bx bx-right-arrow-alt"></i>All Items</a>
                </li>
                <li> <a href="{{ route('add.item') }}"><i class="bx bx-right-arrow-alt"></i>Add Items</a>
                </li>

            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
                <li> <a href="{{route('all.user')}}"><i class="bx bx-right-arrow-alt"></i>All Users</a>
                </li>
                <li> <a href="{{route('all.admin')}}"><i class="bx bx-right-arrow-alt"></i>All admin</a>
                </li>


            </ul>
        </li>



    </ul>
    <!--end navigation-->
</div>
